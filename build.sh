#!/bin/bash -e

DEFAULT_BRANCH=master
USER_EMAIL="nextcloud-command@users.noreply.github.com"
USER_NAME="nextcloud-command"
COMMIT_MESSAGE="Update OCP"
PUSH_REPOSITORY="https://${GITHUB_TOKEN}@github.com/nextcloud-deps/ocp.git"

# Setup the git configuration for creating commits and tags
init_git() {
    echo "Init git"
    git config user.email "$USER_EMAIL"
    git config user.name "$USER_NAME"
    # Only add if needed
    git remote show 2>&1 | grep push-origin || \
        git remote add push-origin "$PUSH_REPOSITORY"
}

# Detect local changes
# Return 0 if changes are detected, 1 otherwise
detect_changes() {
    echo "Detecting changes"
    echo ""
    git diff --cached --name-only
    echo ""

    if git diff --cached --quiet HEAD --; then
        echo -e "\033[1;35m🏳️ No changes detected\033[0m"
        return 1
    fi
    echo -e "\033[1;33m🛠️ Changes detected\033[0m"
    echo ""
}

# Create and push a new commit with updated sources
create_commit() {
    set -x
    git commit -a -m "$COMMIT_MESSAGE"
    git push --set-upstream push-origin
    set +x
}

# create and push a new tag (argument 1)
create_tag() {
    echo "Creating tag v$1"
    if ! [[ "$1" =~ ^[0-9]+\.[0-9]+\.[0-9]+(-.*)?$ ]]; then
        echo "Aborting: Tag $1 looks invalid"
        return 1
    fi
    set -x
    git tag "v$1"
    git push push-origin "v$1"
    set +x
}

# Update sources from the server repository
update_sources() {
    rm -rf OCP
    cp -r server/lib/public OCP
    git add OCP
}

# Check current branch, fallback to default
CURRENT_BRANCH=$(git rev-parse --abbrev-ref HEAD)
if ! [[ "$CURRENT_BRANCH" =~ ^(stable[1-9][0-9]+|master|main)$ ]]; then
    CURRENT_BRANCH="$DEFAULT_BRANCH"
fi

echo "Updating OCP from branch: $CURRENT_BRANCH"
echo ""

# Load server repository
[ -d server ] && rm -rf server
echo "git clone --depth 1 --branch $CURRENT_BRANCH https://github.com/nextcloud/server.git"
git clone --depth 1 --branch "$CURRENT_BRANCH" https://github.com/nextcloud/server.git
echo ""

# Print last commit
pushd server
git log
echo ""
popd

# Init git user and push remote
init_git

# Handle tags if we are on a stable branch
if [[ "$CURRENT_BRANCH" =~ stable([0-9]+) ]]; then
    CURRENT_MAJOR=${BASH_REMATCH[1]}
    OCP_TAGS=$(git ls-remote --tags origin | grep -Po "(?<=refs/tags/v)$CURRENT_MAJOR\.\d\.\d$" || echo "")

    pushd server
    NC_TAGS=$(git ls-remote --tags origin | grep -Po "(?<=refs/tags/v)$CURRENT_MAJOR\.\d\.\d$" || echo "")
    popd

    MISSING_TAGS=$(comm -13 <(echo "$OCP_TAGS" | sort) <(echo "$NC_TAGS" | sort))

    for tag in $MISSING_TAGS; do
        echo -e "\nDetected missing tag: v$tag\n-----------------------"

        pushd server
        git fetch --depth 1 origin "refs/tags/v$tag"
        git checkout -q FETCH_HEAD
        popd

        update_sources
        detect_changes && create_commit
        create_tag "$tag"
        echo -e "-----------------------\n\n"
    done

    # Reset to latest commit
    pushd server
    git checkout -q "$CURRENT_BRANCH"
    popd
fi

# Update OCP
update_sources
detect_changes && create_commit

# cleanup
rm -rf server

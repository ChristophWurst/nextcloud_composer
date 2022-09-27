#!/bin/bash

set -ev

if git diff-index --quiet HEAD --; then
	echo "no changes detected"
	exit 0
fi

echo "changes detected"
git config --global user.email "nextcloud-command@users.noreply.github.com"
git config --global user.name "nextcloud-command"
git add -A
git commit -a -m "Update OCP"
git remote add push-origin https://${GITHUB_TOKEN}@github.com/nextcloud-deps/ocp.git
git push --set-upstream push-origin $TRAVIS_BRANCH


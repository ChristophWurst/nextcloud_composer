#!/bin/bash

set -ev

if git diff-index --quiet HEAD --; then
	echo "no changes detected"
	exit 0
fi

echo "changes detected"
git config --global user.email "travis@travis-ci.org"
git config --global user.name "Travis CI"
git add -A
git commit -a -m "Update OCP"
git remote add origin https://${GITHUB_TOKEN}@github.com/ChristophWurst/nextcloud_composer.git
git push --set-upstream origin $TRAVIS_BRANCH


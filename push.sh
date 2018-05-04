#!/bin/bash

set -ev

if [ ! $(git diff-index --quiet HEAD --) ]; then
	echo "changes detected"

	git config --global user.email "travis@travis-ci.org"
	git config --global user.name "Travis CI"
	git add -A
	git commit -a -m "Update OCP"
	git remote add origin https://${GITHUB_TOKEN}@github.com/ChristophWurst/nextcloud_composer.git > /dev/null 2>&1
	git push --set-upstream origin $TRAVIS_BRANCH
	git push origin:$TRAVIS_BRANCH
else
	echo "no changes detected"
fi


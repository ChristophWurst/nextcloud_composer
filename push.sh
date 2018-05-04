#!/bin/bash

set -ev

if [ ! $(git diff-index --quiet HEAD --) ]; then
	echo "changes detected"

	git config --global user.email "travis@travis-ci.org"
	git config --global user.name "Travis CI"
	git add -A
	git commit -a -m "Update OCP"
	git push
else
	echo "no changes detected"
fi


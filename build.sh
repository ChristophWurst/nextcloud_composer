#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch v19.0.0beta5 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server
git add OCP

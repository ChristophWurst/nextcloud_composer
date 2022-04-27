#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch v24.0.0rc2 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server
git add OCP

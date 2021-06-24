#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch v22.0.0rc1 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server
git add OCP

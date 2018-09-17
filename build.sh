#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch stable14 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server

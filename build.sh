#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch v16.0.9 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server

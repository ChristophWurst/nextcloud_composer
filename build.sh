#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch v14.0.0RC2 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server

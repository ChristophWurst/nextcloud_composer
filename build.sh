#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch 14.0.2RC1 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server

#!/usr/bin/env bash

vendor/zendframework/zendframework1/bin/zf.sh create project app

cd app/library;

ln -s ../../vendor/zendframework/zendframework1/library/
#!/usr/bin/env bash

vendor/zendframework/zendframework1/bin/zf.sh create project app

cd app/library;

ln -s ../../vendor/zendframework/zendframework1/library/
ln -s ../../vendor/zendframework/zendframework1/bin/zf.sh


../vendor/zendframework/zendframework1/bin/zf.sh create action index Section
../vendor/zendframework/zendframework1/bin/zf.sh create db-table Section section
#!/bin/bash

BD_USER="test_user"
BD_PASS="test_1234"
BD_NAME="test_cveloper"
BD_SCRIPT="../resources/testInserts.sql"

mysql -u $BD_USER -p$BD_PASS $BD_NAME < $BD_SCRIPT

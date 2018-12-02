#!/bin/sh
mysql -u $1 -p blueh_db < stable_db.sql

#!/bin/bash
echo "running"
until cd /resources && npm install
do
    echo "Retrying npm install" >> log.txt
done
cd /resources && npm run watch
tail -f /dev/null

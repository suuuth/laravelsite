#!/bin/bash
echo "running"
until cd /var/www/html && npm install
do
    echo "Retrying npm install" >> log.txt
done
cd /var/www/html && npm run watch
tail -f /dev/null

#!/bin/bash

echo "Starting Supervisor"
/usr/bin/supervisord -c /etc/supervisord.conf

echo "Starting Apache2"
apache2-foreground

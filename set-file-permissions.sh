#!/bin/bash

# Default variables
groupname="${1:-www-data}"
username="${2:-$USER}"
folder="${3:-.}"

# Add user to webserver group
usermod -a -G "$groupname" "$username"

# Change storage ownership to normal user/ webserver group
chown -R "$username":"$groupname" "$folder"/storage

chown -R "$username":"$groupname" "$folder"/public/assets/netapp

chmod 775 "$folder"/storage

# Update permissions for all storage files
find "$folder"/storage -type f -exec chmod 664 {} \;

# Update permissions for all storage folders
find "$folder"/storage -type d -exec chmod 775 {} \;

chmod 777 "$folder"/storage/app/public/

# Change owner group to webserver group user for storage and bootstrap cache folder
chgrp -R "$groupname" "$folder"/storage "$folder"/bootstrap/cache

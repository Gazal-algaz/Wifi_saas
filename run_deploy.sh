#!/bin/bash
composer install --no-dev --optimize-autoloader
php setup_db.php
chmod -R 775 .
echo "DEPLOYMENT_COMPLETE"

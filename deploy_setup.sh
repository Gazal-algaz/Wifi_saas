#!/bin/bash
echo "--- بدء تهيئة البيئة للسيرفر ---"

# 1. تثبيت الاعتمادات
composer install --no-dev --optimize-autoloader

# 2. إعداد قاعدة البيانات (إذا لم تكن موجودة)
php create_tables.php

# 3. ضبط التصاريح (لضمان عمل السيرفر بسلامة)
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

echo "--- تم التجهيز بنجاح! النظام جاهز للإطلاق ---"

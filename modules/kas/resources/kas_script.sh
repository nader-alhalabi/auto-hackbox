rm /var/www/html/index.html
ln -s /var/www/html/KASolutionsApp/index.php /var/www/html/index.html

echo -e "\n" >> /etc/php/7.3/fpm/php-fpm.conf
echo "php_flag[display_errors] = on" >> /etc/php/7.3/fpm/php-fpm.conf
echo "php_flag[display_startup_errors] = on" >> /etc/php/7.3/fpm/php-fpm.conf

service php7.3-fpm restart

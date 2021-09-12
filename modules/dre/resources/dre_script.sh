sudo locale-gen "en_US.UTF-8"
echo LC_ALL="en_US.UTF-8" >> /etc/defaults/locale

rm /var/www/html/index.nginx-debian.html
ln -s /var/www/html/index.php /var/www/html/index.html
mysql < /root/dre.sql

apt-get -y install php-gnupg

echo -e "\n" >> /etc/php/7.3/fpm/php-fpm.conf
echo "php_flag[display_errors] = on" >> /etc/php/7.3/fpm/php-fpm.conf
echo "php_flag[display_startup_errors] = on" >> /etc/php/7.3/fpm/php-fpm.conf

service php7.3-fpm restart

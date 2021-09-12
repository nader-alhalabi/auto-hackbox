apt-get install -y --no-install-recommends default-mysql-server nginx php-fpm php-mysql patch
patch -p1 /etc/nginx/sites-available/default < /root/enable_php.txt
rm /root/enable_php.txt
rm /root/lemp_script.sh

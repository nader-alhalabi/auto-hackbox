# before running this script make sure lfi.php is inside /var/www/html
# running as root & apache2, php installed

# install dependencies
apt-get -y install php7.2
apt-get -y install apache2
sleep 5
systemctl restart apache2



rm /var/www/html/index.html
mv /root/index.php /var/www/html/
mv /root/contact.php /var/www/html/
mv /root/footer.php /var/www/html/
mv /root/menu.php /var/www/html/
mv /root/products.php /var/www/html/
mv /root/garden_index.jpg /var/www/html/
mv /root/flower* /var/www/html/
mv /root/stylesheet.css /var/www/html/

echo "[*] restarting apache2"
systemctl restart apache2
echo "[*] sleeping for 5 sec..."
sleep 5
echo "[*] changing priority for /var/log/apache2"
chmod 775 -R /var/log/apache2/
echo "[*] removing netcat and nc"
apt-get purge nc
apt-get purge netcat
apt-get autoremove
rm -rf /usr/bin/nc
rm -rf /usr/bin/netcat
echo "[*] finished"

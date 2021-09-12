vboxmanage startvm "debian" --type headless
echo "Waiting for VM to come up..."
sleep 8

export TMPDIR=modules/ssh/temp/

scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey -r modules/resources/KASolutionsApp/ root@127.0.0.1:/var/www/html/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey modules/resources/kasolutions root@127.0.0.1:/etc/nginx/sites-enabled/

scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey -r modules/resources/kas_script.sh root@127.0.0.1:/root/
ssh -p ${SSH_PORT} -i ${TMPDIR}/rootkey root@127.0.0.1 "bash /root/kas_script.sh"
ssh -p ${SSH_PORT} -i ${TMPDIR}/rootkey root@127.0.0.1 "systemctl restart nginx"
#TODO: nginx webserver auf neue index pointencd

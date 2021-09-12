#!/usr/bin/env bash

# copies ressources and lfi_script.sh to vm over ssh and runs lfi_script.sh
export TMPDIR=modules/ssh/temp/
export RESOURCEDIR=modules/log-poison/resources
export ENVFILE=${TMPDIR}/env.sh
export VMNAME="debian"

vboxmanage modifyvm ${VMNAME} --natpf1 "HTTP,tcp,,${PHP_PORT_FORWARDING},,80"
vboxmanage startvm ${VMNAME} --type headless
echo "[*] waiting for vm to come up"
sleep 8 

scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/lfi_script.sh root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/index.php root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/index.php root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/contact.php root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/footer.php root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/menu.php root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/products.php root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/garden_index.jpg root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/flower1.jpg root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/flower2.jpg root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/flower3.jpg root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/flower4.jpg root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lp_ressources/stylesheet.css root@127.0.0.1:root/

ssh -p ${SSH_PORT} -i ${TMPDIR}/rootkey root@127.0.0.1 "bash /root/lfi_script.sh"

vboxmanage controlvm ${VMNAME} acpipowerbutton

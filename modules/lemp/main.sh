#!/usr/bin/env bash

export TMPDIR=modules/ssh/temp/
export RESOURCEDIR=modules/lemp/resources/
export ENVFILE=${TMPDIR}/env.sh
export VMNAME="debian"
. ${ENVFILE} 2>/dev/null


vboxmanage modifyvm ${VMNAME} --natpf1 "HTTP,tcp,,${PHP_PORT_FORWARDING},,80"
vboxmanage startvm ${VMNAME} --type headless
echo "Waiting for VM to come up..."
sleep 8

scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/lemp_script.sh root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey ${RESOURCEDIR}/enable_php.txt root@127.0.0.1:/root/
ssh -p ${SSH_PORT} -i ${TMPDIR}/rootkey root@127.0.0.1 "bash /root/lemp_script.sh"

vboxmanage controlvm ${VMNAME} acpipowerbutton
sleep 5

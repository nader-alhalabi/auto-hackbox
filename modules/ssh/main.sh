#!/usr/bin/env bash

export TMPDIR=modules/ssh/temp/
export RESOURCEDIR=modules/resources/
export ENVFILE=${TMPDIR}/env.sh
export VMNAME="debian"
export STARTSNAPSHOT="CleanInstall"

. ${ENVFILE} 2>/dev/null

vboxmanage modifyvm ${VMNAME} --natpf1 "SSH,tcp,,${PORT_FORWARDING},,22"
vboxmanage startvm ${VMNAME} --type headless
echo "Waiting for VM to come up..."
sleep 8

rm -f ${TMPDIR}/mariokey*
ssh-keygen -b 2048 -t rsa -f ${TMPDIR}/mariokey -q -N ""
sshpass -p 1234 ssh-copy-id -i ${TMPDIR}/mariokey.pub -p 2200 mario@127.0.0.1
chmod 700 ${TMPDIR}/mariokey*
ssh -p 2200 -i ${TMPDIR}/mariokey mario@127.0.0.1 "ls"

rm -f ${TMPDIR}/rootkey*
ssh-keygen -b 2048 -t rsa -f ${TMPDIR}/rootkey -q -N ""
sshpass -p 1234 ssh-copy-id -i ${TMPDIR}/rootkey.pub -p 2200 root@127.0.0.1
chmod 700 ${TMPDIR}/rootkey*
ssh -p 2200 -i ${TMPDIR}/rootkey root@127.0.0.1 "ls"

vboxmanage controlvm ${VMNAME} acpipowerbutton
sleep 5

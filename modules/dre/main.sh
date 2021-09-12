
export TMPDIR=modules/ssh/temp/
export RESOURCEDIR=modules/dre/resources/
export ENVFILE=${TMPDIR}/env.sh
export VMNAME="debian"
vboxmanage startvm ${VMNAME} --type headless
echo "Waiting for VM to come up..."
sleep 8

scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey -r ${RESOURCEDIR}/DiamondRealEstate/* root@127.0.0.1:/var/www/html/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey -r ${RESOURCEDIR}/dre.sql root@127.0.0.1:/root/
scp -P ${SSH_PORT} -i ${TMPDIR}/rootkey -r ${RESOURCEDIR}/dre_script.sh root@127.0.0.1:/root/
ssh -p ${SSH_PORT} -i ${TMPDIR}/rootkey root@127.0.0.1 "bash /root/dre_script.sh"

vboxmanage controlvm ${VMNAME} acpipowerbutton

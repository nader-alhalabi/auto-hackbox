import yaml
import sys
import shutil
from string import Template


def load_meta(module):
    with open('./modules/{}-ready/meta.yml'.format(module), 'r') as stream:
        try:
            return yaml.safe_load(stream)
        except yaml.YAMLError as exception:
            raise exception


def copy_module(module):
    source = './modules/{}'.format(module)
    target = './modules/{}-ready'.format(module)
    try:
        shutil.copytree(source, target)
    except FileExistsError:
        print("Module directory already exists")


def delete_module(module):
    target = './modules/{}-ready'.format(module)
    try:
        shutil.rmtree(target)
    except FileExistsError:
        print("Module (ready) directory does not exists")


def replace(module, filename, replacements):
    script = open('./modules/{module}-ready/{filename}'.format(module=module, filename=filename), 'r')
    script_content = script.read()
    script.close()

    template = Template(script_content)
    sub = template.safe_substitute(replacements)
    outfile = open('./modules/{module}-ready/{filename}'.format(module=module, filename=filename), 'w')
    outfile.write(sub)
    outfile.close()


def user_pass_parse(module, filename, conf):
    users = conf["value"]
    for user in users:
        username, password = user.split(":")
        script = open('./modules/{module}-ready/resources/{filename}'.format(module=module, filename=filename), 'a')
        script.write('sudo useradd -p $(openssl passwd -1 {password}) {username}\n'.format(username = username, password = password))

    script.write('rm /root/userpass_script.sh')
    script.close()



def check_replace_config(module):
    copy_module(module)
    yml = load_meta(module)

    provides = yml['provides']['tech']
    if provides:
        for provide in provides:
            if provide['entry'].get('config'):
                configs= provide['entry']['config']
                for conf in configs:
                    print(conf["name"], conf["value"][0])
                    filename = conf["file"]
                    if ':' in conf["name"]:
                        user_pass_parse(module, filename, conf)
                    else:
                        replacements = {conf["name"] : conf["value"][0]}
                        replace(module, filename, replacements)


    needs = yml['needs']['tech']
    if needs:
        for need in needs:
            if need['entry'].get('config'):
                configs= need['entry']['config']
                for conf in configs:
                    print(conf["name"], conf["value"][0])
                    filename = conf["file"]
                    if ':' in conf["name"]:
                        user_pass_parse(module, filename, conf)
                    else:
                        replacements = {conf["name"] : conf["value"][0]}
                        replace(module, filename, replacements)


if __name__ == '__main__':
    module = sys.argv[1]
    check_replace_config(module)

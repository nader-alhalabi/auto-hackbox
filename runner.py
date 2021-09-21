import pathlib
import subprocess
import yaml
import parser
import __main__ as main

path = pathlib.Path(__file__).parent.absolute()

def run_modules(modules):
    for module in modules:
        parser.check_replace_config(module)
        parser.replace(module, "main.sh", {"VMNAME" : main.vm_name})
        process = subprocess.Popen(
            'bash {path}/modules/{module}-ready/main.sh'. \
                format(
                path=path,
                module=module
            ),
            shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE
        )

        output = process.stdout.read().decode('UTF-8')
        error = process.stderr.read().decode('UTF-8')
        print(output)
        print("************")
        print(error)
        process.wait()


def restore_snapshot(module_name, snapshot):
    process = subprocess.Popen(
        'vboxmanage snapshot {VMNAME} restore {STARTSNAPSHOT}'. \
            format(
            VMNAME=module_name,
            STARTSNAPSHOT=snapshot
        ),
        shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE
    )

    output = process.stdout.read().decode('UTF-8')
    error = process.stderr.read().decode('UTF-8')
    print(output)
    print("************")
    print(error)
    process.wait()

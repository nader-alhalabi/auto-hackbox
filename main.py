import os
import yaml
import runner, validator
import argparse
import sys
import parser as pars


def load_meta(module):
    with open('./modules/{}/meta.yml'.format(module), 'r') as stream:
        try:
            return yaml.safe_load(stream)
        except yaml.YAMLError as exception:
            raise exception


def read_module(module):
    meta = load_meta(module)
    print(module)

    print("   provides:", end=' ')
    if meta["provides"]["tech"]:
        for i, provide in enumerate(meta["provides"]["tech"]):
            if i:
                print(", ", end='')
            print(provide["entry"]["name"], end='')

    print("\n   needs:", end=' ')
    if meta["needs"]["tech"]:
        for i, need in enumerate(meta["needs"]["tech"]):
            if i:
                print(", ", end='')
            print(need["entry"]["name"], end='')
    print("\n")


def print_modules():
    for module in all_modules:
        print(all_modules.index(module), end="- ")
        read_module(module)


def check_dependencies(selected_module):
    meta = load_meta(selected_module)
    module_provides = meta["provides"]["tech"]
    module_needs = meta["needs"]["tech"]

    if not module_needs:
        for prov in module_provides:
            if prov["entry"]["name"] not in dependencies_list:
                dependencies_list.append(prov["entry"]["name"])
        return True

    for mod in module_needs:

        if mod["entry"]["name"] not in dependencies_list:
            return False

    for prov in module_provides:
        if prov["entry"]["name"] not in dependencies_list:
            dependencies_list.append(prov["entry"]["name"])
    return True


def meta_validation(selected_module):
    if validator.valid_meta(selected_module):
        return True
    else:
        return False


def add_module(selected_module):
    if meta_validation(selected_module):
        print("[*] Metadata validation successful")
    else:
        print("[!] Metadata validation unsuccessful")
        return False

    if check_dependencies(selected_module):
        install_list.append(selected_module)
        return True
    else:
        return False


def multi_module_mode():
    while True:
        selected_module = input(" - Select the module to install (or type \"run\" to start installing):")

        if selected_module == "run":
            vmname = input("enter VM name:")
            snapshot = input("enter Snapshot name:")
            print("[*] installing...")
            global vm_name
            vm_name = vmname
            runner.restore_snapshot(vmname, snapshot)
            runner.run_modules(install_list)
            for mod in install_list:
                pars.delete_module(mod)
            break
        elif selected_module not in all_modules:
            print("[!] This module is not available")
            continue
        elif selected_module in install_list:
            print("[!] This module is already added")
            continue
        elif add_module(selected_module):
            print("[*] Added to install list")
            print(install_list)
        else:
            print("[!] This module can not be installed right now, Please check dependencies")


def one_module_mode():
    parser = argparse.ArgumentParser(description='Choose the module, and its VM and snapshot (CASE SENSITIVE)')
    parser.add_argument("-m", "--module", help="Name of the module")
    parser.add_argument("-v", "--vm", help="Name of virtual machine")
    parser.add_argument("-s", "--snapshot", help="Name of snapshot")
    args = parser.parse_args()
    print(args.module,args.vm, args.snapshot)
    if args.module not in all_modules:
        print("Module", args.module, "is not available")
    else:
        global vm_name
        vm_name = args.vm
        runner.restore_snapshot(args.vm, args.snapshot)
        runner.run_modules([args.module])
        pars.delete_module(args.module)


dependencies_list = []
install_list = []
all_modules = os.listdir('./modules')
vm_name = None

if __name__ == '__main__':
    if len(sys.argv) > 1:
        one_module_mode()
    else:
        print("Available modules: \n")
        print_modules()
        multi_module_mode()

import os
import yaml
import runner, validator


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
            dependencies_list.append(prov["entry"]["name"])
        return True

    for mod in module_needs:

        if mod["entry"]["name"] not in dependencies_list:
            #print("needs", mod["entry"]["name"])
            return False

    for prov in module_provides:
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


def interact():
    while True:
        selected_module = input(" - Select the module to install (or type \"run\" to start installing):")

        if selected_module == "run":
            vmname = input("enter VM name:")
            snapshot = input("enter Snapshot name:")
            vmname = "debian"
            snapshot = "CleanInstall"
            print("[*] installing...")
            runner.restore_snapshot(vmname, snapshot)
            runner.run_modules(install_list)
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


dependencies_list = []
install_list = []

if __name__ == '__main__':
    all_modules = os.listdir('./modules')
    print("Available modules: \n")
    print_modules()
    interact()

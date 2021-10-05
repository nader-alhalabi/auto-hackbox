import os, sys
currentdir = os.path.dirname(os.path.realpath(__file__))
parentdir = os.path.dirname(currentdir)
sys.path.append(parentdir)

import main

def test_meta_validation():
    assert main.meta_validation("ssh") == True
    assert main.meta_validation("dre") == True
    assert main.meta_validation("log-poison") == True


def test_add_module_no_dependencies():

    assert main.add_module("ssh") == True
    assert main.install_list == ["ssh"]
    assert main.dependencies_list == ["ssh"]


def test_add_module_unsatisfied():
    assert main.add_module("dre") == False
    assert main.install_list == ["ssh"]
    assert main.dependencies_list == ["ssh"]


def test_add_module_satisfied():
    assert main.add_module("lemp") == True
    assert main.add_module("dre") == True
    assert main.install_list == ["ssh", "lemp", "dre"]
    assert main.dependencies_list == ["ssh", "php-fpm", "mysql", "nginx", "patch", "php-gnupg"]


def test_add_module_log_poison_satisfied():
    assert main.add_module("log-poison") == True
    assert main.install_list == ["ssh", "lemp", "dre", "log-poison"]
    assert main.dependencies_list == ["ssh", "php-fpm", "mysql", "nginx", "patch", "php-gnupg", "php"]


def test_add_module_ssh_userpass_satisfied():
    assert main.add_module("ssh-userpass") == True
    assert main.install_list == ["ssh", "lemp", "dre", "log-poison", "ssh-userpass"]
    assert main.dependencies_list == ["ssh", "php-fpm", "mysql", "nginx", "patch", "php-gnupg", "php"]

import os, sys
currentdir = os.path.dirname(os.path.realpath(__file__))
parentdir = os.path.dirname(currentdir)
sys.path.append(parentdir)

import main

def test_meta_validation():
    assert main.meta_validation("ssh") == True
    assert main.meta_validation("dre") == True
    assert main.meta_validation("log-poison") == True


def test_add_module_ssh():

    assert main.add_module("ssh") == True
    assert main.install_list == ["ssh"]
    assert main.dependencies_list == ["ssh"]


def test_add_module_dre():
    assert main.add_module("dre") == False
    assert main.install_list == ["ssh"]
    assert main.dependencies_list == ["ssh"]


def test_add_module_log_poison():
    assert main.add_module("log-poison") == True
    assert main.install_list == ["ssh", "log-poison"]
    assert main.dependencies_list == ["ssh", "php"]


def test_add_module_ssh_userpass():
    assert main.add_module("ssh-userpass") == False
    assert main.install_list == ["ssh", "log-poison"]
    assert main.dependencies_list == ["ssh", "php"]


def test_add_module_lemp():
    assert main.add_module("lemp") == True
    assert main.install_list == ["ssh", "log-poison", "lemp"]
    assert main.dependencies_list == ["ssh", "php", "php-fpm", "mysql", "nginx", "patch"]

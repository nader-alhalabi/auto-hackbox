import yaml
import sys
from cerberus import Validator


def load_meta(module):
    with open('./modules/{}/meta.yml'.format(module), 'r') as stream:
        try:
            return yaml.safe_load(stream)
        except yaml.YAMLError as exception:
            raise exception


def valid_meta(module):
    schema = eval(open('./schema.py', 'r').read())
    v = Validator(schema)
    meta = load_meta(module)
    if v.validate(meta, schema):
        return True
    else:
        # uncheck below comment to debug False validation
        # print(v.errors)
        return False


if __name__ == '__main__':
    module = sys.argv[1]
    if valid_meta(module):
        print("True")
    else:
        print("False")

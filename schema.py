{
# name of the module, a simple string
    'name': { 'required': True, 'type': 'string'},

    # provides: a dictionary of provided modules
    'provides': { 'required': True, 'type': 'dict', 'schema':
    {
            # dictionary of technologies that the module provides,
            # dictionary type was chosen because every tech entity can have different options/configs,
            # can be nullabe when no technologies is provided
            'tech': { 'required': True, 'type': 'list', 'schema':
            {
                'type': 'dict', 'schema': {'entry': {'type': 'dict', 'schema':
                {
                    'name': {'type': 'string'},
                    'version': {'type': 'string', 'nullable': True},
                    'config': {'type': 'list', 'nullable': True, 'schema':
                    {
                            'type': 'dict', 'schema':
                            {
                                # value of type list to contain more complex types of values
                                'name': {'type': 'string'},
                                'file': {'type': 'string'},
                                'value': {'type': 'list'}
                            }
                    }
                }}
            }}}
            },
            # dictionary of configurations that the module provides, can be nullabe when no configurations is provided
            'tech-config': { 'required': False, 'type': 'list', 'schema':
            {
                'type': 'dict', 'schema': {'entry': {'type': 'dict', 'schema':
                {
                    'name': {'type': 'string'},
                    'version': {'type': 'string', 'nullable': True},
                    'config': {'type': 'list', 'nullable': True, 'schema':
                    {
                            'type': 'dict', 'schema':
                            {
                                'name': {'type': 'string'},
                                'file': {'type': 'string'},
                                'value': {'type': 'list'}
                            }
                    }}
                }}
            }}}
    }
    },

    # needs: a dictionary of needed modules
    'needs': { 'required': True, 'type': 'dict', 'schema':
    {
            # dictionary of technologies that the module needs,
            # dictionary type was chosen because every tech entity can have different options/configs,
            # can be nullabe when no technologies is needed
            'tech': { 'required': True, 'type': 'list', 'nullable': True, 'schema':
            {
                'type': 'dict', 'schema': {'entry': {'type': 'dict', 'schema':
                {
                    'name': {'type': 'string'},
                    'version': {'type': 'string', 'nullable': True},
                    'config': {'type': 'list', 'nullable': True, 'schema':
                    {
                        'type': 'dict', 'schema':
                        {
                            # value of type list to contain more complex types of values
                            'name': {'type': 'string'},
                            'file': {'type': 'string'},
                            'value': {'type': 'list'}
                        }
                    }
                }}
            }},
            }
    }}
}
}

<?php

/**
 * If the project have is a modules structure, \
 * you need to specify the "scope" key with the value "private"
 */
return [
    'modules' => [
        'front' => [
            'className' => "",
            'path'      => ''
        ],
        'admin' => [
            'className' => "",
            'path'      => '',
            'scope'     => 'private'
        ]

    ]
];
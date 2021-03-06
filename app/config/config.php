<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */

use Sinbadxiii\PhalconPermission\Permissions\PermissionsModel;
use Sinbadxiii\PhalconPermission\Resources\ResourcesActionsModel;
use Sinbadxiii\PhalconPermission\Resources\ResourcesModel;

defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '1993',
        'dbname'      => 'auth-test',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'securityDir'    => BASE_PATH . '/Security/',
        'baseUri'        => '/',
    ],
    'app' => [
        'key' => 'd!fdsfs#f3123433ff33fF#FwfSAef3f@#F@#F23F@#faef'
    ],
    'auth' => [
        'defaults' => [
            'guard' => 'web',
            'passwords' => 'users',
        ],

        'guards' => [
            'web' => [
                'driver' => 'session',
                'provider' => 'users',
            ],
        ],
        'providers' => [
            'users' => [
                'driver' => 'model',
                'model'  => \Users::class,
            ],
        ],
        'hash' => [
            'method' => 'sha1'
        ],
    ],
    'acl' => [
        'published' => true,
        // models | file
        'provider' => 'models',

        //modules or not modules structure
//        'modules' => require_once ("modules.php"),
        'modules' => [],

        'table_user_roles' => 'users_roles',

        'providers' => [
            'file' => [
                'src' => ""
            ],
            'models' => [
                'permissions' => PermissionsModel::class,
                'resources'   => ResourcesModel::class,
                'actions'     => ResourcesActionsModel::class
            ]
        ],

        'access' => [
            //action | type
            'endpoint' => 'action',

            //  access action by default
            // deny | allow
            'default' => 'deny',
        ],

        // access router by ajax  none | always
        'ajax' => "none"
    ],
    'cache' => [
        'default' => 'redis',
        'options' => [
            'options' => [
                'defaultSerializer' => 'Json',
                'scheme' => 'tcp',
                'host'   => '127.0.0.1',
                'port'   => 6379,
                'lifetime' => 3600,
            ],
        ]
    ]
]);

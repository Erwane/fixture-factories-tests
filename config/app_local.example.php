<?php
/**
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
declare(strict_types=1);

use Cake\Database\Connection;
use Cake\Database\Driver\Sqlite;

return [
    'debug' => true,
    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
    ],
    'Datasources' => [
        'default' => [
            'className' => Connection::class,
            'driver' => Sqlite::class,
            'persistent' => false,
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
            'quoteIdentifiers' => false,
            'database' => TMP . 'prod.db',
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'className' => Connection::class,
            'driver' => Sqlite::class,
            'persistent' => false,
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
            'quoteIdentifiers' => false,
            'database' => TMP . 'tests.db',
        ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];

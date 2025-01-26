<?php
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This option controls which of the database connections below will be used
    | by default. You may change the default connection at any time.
    |
    */
   return [
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This option controls which of the database connections below will be used
    | by default. You may change the default connection at any time.
    |
    */
    'default' => getenv('DB_CONNECTION') ?: 'mysql',
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This option controls which of the database connections below will be used
    | by default. You may change the default connection at any time.
    |
    */
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => getenv('DB_HOST') ?: '127.0.0.1',
            'port' => getenv('DB_PORT') ?: '3306',
            'database' => getenv('DB_DATABASE') ?: 'artmir',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This option controls which of the database connections below will be used
    | by default. You may change the default connection at any time.
    |
    */
    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This option controls which of the database connections below will be used
    | by default. You may change the default connection at any time.
    |
    */
    'redis' => [
        'client' => 'phpredis',
        'options' => [
            'cluster' => 'redis',
            'prefix' => 'laravel_database_',
        ],
        'default' => [
            'host' => '127.0.0.1',
            'port' => '6379',
            'database' => '0',
        ],
        'cache' => [
            'host' => '127.0.0.1',
            'port' => '6379',
            'database' => '1',
        ],
    ],
]; 
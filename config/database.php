<?php







return [




    'default' => getenv('DB_CONNECTION') ?: 'mysql',





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

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

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
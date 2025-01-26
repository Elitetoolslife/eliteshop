<?php

// Connect to the database
$dbcon = mysqli_connect(
    getenv('DB_HOST'),
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD'),
    getenv('DB_DATABASE')
) or die('Unable to connect to the database');

// Return the database configuration array
return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Specify which database connection to use as the default.
    |
    */

    'default' => getenv('DB_CONNECTION') ?: 'sqlite',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Database connection configurations.
    |
    */

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'url' => getenv('DB_URL'),
            'database' => getenv('DB_DATABASE') ?: database_path('database.sqlite'),
            'prefix' => '',
            'foreign_key_constraints' => getenv('DB_FOREIGN_KEYS') ?: true,
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => getenv('DB_URL'),
            'host' => getenv('DB_HOST') ?: '127.0.0.1',
            'port' => getenv('DB_PORT') ?: '3306',
            'database' => getenv('DB_DATABASE') ?: 'laravel',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'unix_socket' => getenv('DB_SOCKET') ?: '',
            'charset' => getenv('DB_CHARSET') ?: 'utf8mb4',
            'collation' => getenv('DB_COLLATION') ?: 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => getenv('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => getenv('DB_URL'),
            'host' => getenv('DB_HOST') ?: '127.0.0.1',
            'port' => getenv('DB_PORT') ?: '3306',
            'database' => getenv('DB_DATABASE') ?: 'laravel',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'unix_socket' => getenv('DB_SOCKET') ?: '',
            'charset' => getenv('DB_CHARSET') ?: 'utf8mb4',
            'collation' => getenv('DB_COLLATION') ?: 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => getenv('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => getenv('DB_URL'),
            'host' => getenv('DB_HOST') ?: '127.0.0.1',
            'port' => getenv('DB_PORT') ?: '5432',
            'database' => getenv('DB_DATABASE') ?: 'laravel',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'charset' => getenv('DB_CHARSET') ?: 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => getenv('DB_URL'),
            'host' => getenv('DB_HOST') ?: 'localhost',
            'port' => getenv('DB_PORT') ?: '1433',
            'database' => getenv('DB_DATABASE') ?: 'laravel',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'charset' => getenv('DB_CHARSET') ?: 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | Table to track migrations.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis configurations.
    |
    */

    'redis' => [
        'client' => getenv('REDIS_CLIENT') ?: 'phpredis',
        'options' => [
            'cluster' => getenv('REDIS_CLUSTER') ?: 'redis',
            'prefix' => getenv('REDIS_PREFIX') ?: 'your_project_database_',
        ],
        'default' => [
            'url' => getenv('REDIS_URL'),
            'host' => getenv('REDIS_HOST') ?: '127.0.0.1',
            'port' => getenv('REDIS_PORT') ?: '6379',
            'database' => getenv('REDIS_DB') ?: '0',
        ],
        'cache' => [
            'url' => getenv('REDIS_URL'),
            'host' => getenv('REDIS_HOST') ?: '127.0.0.1',
            'port' => getenv('REDIS_PORT') ?: '6379',
            'database' => getenv('REDIS_CACHE_DB') ?: '1',
        ],
    ],

];
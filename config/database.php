<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */
    'prefix' => 'jb_',
    'table' => [
        'tintuc' => [
            'Ten' => 'tintuc',
            'Slug' => 'tin-tuc',
            'id' => 1
        ],
        'comment' => [
            'Ten' => 'comment',
            'Slug' => 'comment',
            'id' => 2
        ],
        'customfield' => [
            'Ten' => 'customfield',
            'Slug' => 'custom-field',
            'id' => 3
        ],
        'donhang' => [
            'Ten' => 'donhang',
            'Slug' => 'don-hang',
            'id' => 4
        ],
        'loaisanpham' => [
            'Ten' => 'loaisanpham',
            'Slug' => 'loai-san-pham',
            'id' => 5
        ],
        'loaitin' => [
            'Ten' => 'loaitin',
            'Slug' => 'loai-tin',
            'id' => 6
        ],
        'option' => [
            'Ten' => 'option',
            'Slug' => 'option',
            'id' => 7
        ],
        'optiontable' => [
            'Ten' => 'optiontable',
            'Slug' => 'option-table',
            'id' => 8
        ],
        'quyen' => [
            'Ten' => 'quyen',
            'Slug' => 'quyen',
            'id' => 9
        ],
        'sanpham' => [
            'Ten' => 'sanpham',
            'Slug' => 'san-pham',
            'id' => 10
        ],
        'slide' => [
            'Ten' => 'slide',
            'Slug' => 'slide',
            'id' => 11
        ],
        'sub_donhang_sanpham' => [
            'Ten' => 'sub_donhang_sanpham',
            'Slug' => 'sub-don-hang-san-pham',
            'id' => 12
        ],
        'sub_tintuc_tag' => [
            'Ten' => 'sub_tintuc_tag',
            'Slug' => 'sub-tin-tuc-tag',
            'id' => 13
        ],
        'tag' =>  [
            'Ten' => 'tag',
            'Slug' => 'tag',
            'id' => 14
        ],
        'thanhtoan' =>  [
            'Ten' => 'thanhtoan',
            'Slug' => 'thanh-toan',
            'id' => 15
        ],
        'theloai' => [
            'Ten' => 'theloai',
            'Slug' => 'the-loai',
            'id' => 16
        ],
        'migrations' => [
            'Ten' => 'migrations',
            'Slug' => 'migrations',
            'id' => 17
        ],
        'password_resets' => [
            'Ten' => 'password_resets',
            'Slug' => 'password-resets',
            'id' => 18
        ],
        'users' => [
            'Ten' => 'users',
            'Slug' => 'users',
            'id' => 19
        ]
    ],
    'ReloadXML' => 1,
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];

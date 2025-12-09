<?php

return [

    'default' => env('DB_CONNECTION', 'wordpress'),

    'connections' => [

        'wordpress' => [
            'driver'   => 'mysql',
            'host'     => env('DB_HOST', DB_HOST),
            'port'     => env('DB_PORT', 3306),
            'database' => env('DB_NAME', DB_NAME),
            'username' => env('DB_USER', DB_USER),
            'password' => env('DB_PASSWORD', DB_PASSWORD),

            // FIX LỖI COLLATION
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',

            'prefix'    => env('DB_PREFIX', $GLOBALS['table_prefix']),
        ],

    ],

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | URL settings
    |--------------------------------------------------------------------------
    |
    | This value determines the url  settings with 'scheme' ,'host', 'port' and 'path'
    | configurations from  the .env file .
    |
    */

    'url' => [
        'scheme' => env('WOMBAT_SCHEME', 'http'),
        'host' =>   env('WOMBAT_HOST', 'localhost'),
        'port' =>   env('WOMBAT_PORT', '8080'),
        'path' =>   env('WOMBAT_PATH', '/wombat/api/'),
    ],
    'session' => [
        'user' => env('WOMBAT_SESSION_USER', 'wbt_user'),
        'pass' =>   env('WOMBAT_SESSION_PASS', 'wbt_pass'),
    ],
     'chunk_size' => 100,
     'toAddress' => 'abc@example.com',

    /*
    |--------------------------------------------------------------------------
    | Default  Admin Details
    |--------------------------------------------------------------------------
    |
    | This admin array  determines the username and password settings from the .env file.
    | If the user wants to change the default settings , the user can uncomment the default admin
    | values and change the values as needed.
    |
    */

     //  'admin' => [
     //    'user' => env('WOMBAT_USER', 'demoadmin'),
     //    'pass' => env('WOMBAT_PASS', 'demo'),
     // ],

];

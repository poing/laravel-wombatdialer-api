<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default  Admin Details
    |--------------------------------------------------------------------------
    |
    | This admin array  determines the username and password settings from the .env file.
    | 
    */
    
   'admin' => [
        'user' => env('WOMBAT_USER', 'demoadmin'),
        'pass' => env('WOMBAT_PASS', 'demo'),
    ],
];
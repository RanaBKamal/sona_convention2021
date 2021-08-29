<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Esewa config
    |--------------------------------------------------------------------------
    |
    | esewa payment configuration file
    |
    */

    'manual' => [
        'renewal_fee'          => 1000,
        'scd'                  => 'MANUAL_ENTRY',
    ],

    'esewa' => [
        'url'                  => 'https://uat.esewa.com.np/epay/main',
        'renewal_fee'          => 1000,
        'scd'                  => 'EPAYTEST',
        'su'                   => env('APP_URL', 'https://convention2021.sona.org.np').'/user/payment/esewa_payment_success',
        'fu'                   => env('APP_URL', 'https://convention2021.sona.org.np').'/user/payment/esewa_payment_failed',
        'verify_url'           => 'https://uat.esewa.com.np/epay/transrec',
    ],
];

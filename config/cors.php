<?php

return [
    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:3000',
        'http://127.0.0.1:3000',

        // Capacitor WebView: Android віддає https://localhost (або
        // http://localhost, якщо androidScheme перемкнено на http для
        // локальної відладки), iOS — capacitor://localhost. Без них
        // застосунок падає на першому ж запиті до API.
        'https://localhost',
        'http://localhost',
        'capacitor://localhost',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];

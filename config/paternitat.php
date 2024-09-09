<?php

declare(strict_types=1);

/**
 * |--------------------------------------------------------------------------|
 * Paternitat Sobre Rodes config file
 * |--------------------------------------------------------------------------|
 */

return [
    'admin_path' => env('ADMIN_PATH', 'admin'),

    'emails_to' => env('EMAIL_RECEIVER', ''),

    'algolia' => [
        'enabled' => env('ALGOLIA_ENABLED', false),
        'app_id' => env('ALGOLIA_APP_ID', ''),
        'secret' => env('ALGOLIA_SECRET', ''),
    ],
];

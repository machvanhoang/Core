<?php

use App\Enums\Auth;
use App\Enums\Route;
// ROUTER
define('ADMIN_LOGIN_GET', Route::ADMIN_LOGIN_GET->value);
define('ADMIN_INDEX', Route::ADMIN_INDEX->value);
// GUARD
define('ADMIN', Auth::ADMIN->value);
define('USER', Auth::USER->value);
// STATUS
define('PUBLISHED', 'published');
define('PRIVATED', 'privated');
define('BLOCKED', 'blocked');
// ARRAY STATUS
define('STATUS', [
    PRIVATED => PRIVATED,
    PUBLISHED => PUBLISHED,
    BLOCKED => BLOCKED
]);
// ADMIN TYPE DEFAULT
define('PRODUCT_TYPE', 'product');
// UPLOADS
define('UPLOADS', 'uploads');

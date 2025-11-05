<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Hanya aktifkan debug serverless di Vercel
if (getenv('VERCEL')) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Maintenance mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer autoload
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Jika di Vercel (serverless)
if (getenv('VERCEL')) {
    /** @var Kernel $kernel */
    $kernel = $app->make(Kernel::class);

    try {
        $request = Request::capture();
        $response = $kernel->handle($request);
        $response->send();
        $kernel->terminate($request, $response);
    } catch (\Throwable $e) {
        echo "ERROR: " . $e->getMessage() . "\n";
        echo $e->getTraceAsString();
    }
} else {
    // Local development: Laravel normal
    $kernel = $app->make(Kernel::class);
    $kernel->handle(Request::capture())->send();
}

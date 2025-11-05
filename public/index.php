<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Enable error reporting sementara untuk debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Maintenance mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload composer
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

/** @var Kernel $kernel */
$kernel = $app->make(Kernel::class);

try {
    // Tangkap request
    $request = Request::capture();

    // Handle request
    $response = $kernel->handle($request);

    // Kirim response
    $response->send();

    // Terminate kernel
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    // Debug output sementara
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}

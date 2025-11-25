<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| Jika aplikasi dalam mode maintenance (melalui perintah "php artisan down"),
| maka file ini akan dimuat untuk menampilkan tampilan maintenance tanpa
| menjalankan framework Laravel sepenuhnya.
|
*/

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
    exit;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer menyediakan class loader otomatis untuk aplikasi Laravel.
| Kita hanya perlu me-require-nya di sini agar semua class bisa digunakan.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Setelah aplikasi di-bootstrapped, kita akan menangani incoming request
| menggunakan HTTP Kernel, lalu mengirimkan respons kembali ke browser.
|
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

/** @var \Illuminate\Contracts\Http\Kernel $kernel */
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

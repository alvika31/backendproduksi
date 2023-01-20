<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://127.0.0.1:8000/warnabarang/',
        'http://127.0.0.1:8000/warnabarang/*',
        'http://127.0.0.1:8000/jenisbarang/',
        'http://127.0.0.1:8000/jenisbarang/*',
        'http://127.0.0.1:8000/requestbarangjadi/',
        'http://127.0.0.1:8000/requestbarangjadi/*',
        'http://127.0.0.1:8000/barangmentah/',
        'http://127.0.0.1:8000/barangmentah/*',
        'http://127.0.0.1:8000/produksi/',
        'http://127.0.0.1:8000/produksi/*',
        'http://127.0.0.1:8000/pengiriman/',
        'http://127.0.0.1:8000/pengiriman/*',
        'http://127.0.0.1:8000/register/',
    ];
}

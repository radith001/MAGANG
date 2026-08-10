<?php

declare(strict_types=1);

use App\Http\Controllers\Api\ComplaintApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - BRS NET
|--------------------------------------------------------------------------
| Endpoint publik (tidak memerlukan autentikasi) untuk operasi frontend.
*/

Route::post('/complaints', [ComplaintApiController::class, 'store']);

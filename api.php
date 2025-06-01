<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;

// Public routes with adjusted rate limiting
Route::middleware('throttle:60,1')->group(function () {  // 60 requests per minute
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});
Route::get('members', [MemberController::class, 'index']);
Route::post('/members', [MemberController::class, 'store']);
// Update member route
Route::put('/members/{id}', [MemberController::class, 'update']);
Route::delete('members/{id}', [MemberController::class, 'destroy']);
Route::post('/attendance', [AttendanceController::class, 'logAttendance']);
Route::get('/stats', [DashboardController::class, 'getStats']);

Route::get('/members', [MemberController::class, 'index']);
Route::delete('/members/{id}', [MemberController::class, 'destroy']);
Route::put('/members/{id}', [MemberController::class, 'update']);
Route::put('/members/{id}/renew', [MemberController::class, 'renew']);





// Add routes for attendance and reports
Route::get('/reports', [ReportController::class, 'index']);
Route::post('/reports', [ReportController::class, 'store']);
Route::get('/reports/{id}', [ReportController::class, 'show']);
Route::put('/reports/{id}', [ReportController::class, 'update']);
Route::delete('/reports/{id}', [ReportController::class, 'destroy']);
// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user()

            
        ]);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    
});

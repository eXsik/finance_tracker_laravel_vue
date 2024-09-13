<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SavingsGoalController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function (Request $request) {
    return 'API';
});

Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/transactions', TransactionController::class);
Route::apiResource('/budgets', BudgetController::class);
Route::apiResource('/secings-goal', SavingsGoalController::class);
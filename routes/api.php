<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// pegawai route
Route::get('/pegawai', [PegawaiController::class, 'GetAllPegawai']);
Route::get('/pegawaibyuuid/{uuid}', [PegawaiController::class, 'GetPegawaiByUuid']);
Route::post('/addnewpegawai', [PegawaiController::class, 'AddPegawai']);
Route::put('/updatepegawai/{uuid}', [PegawaiController::class, 'UpdatePegawaiByUuid']);
Route::delete('/deletepegawai/{uuid}', [PegawaiController::class, 'DeletePegawaiByUuid']);

// absen route
Route::get('/allabsen', [AbsenController::class, 'GetAllAbsen']);
Route::get('/absenbyuuid/{uuid}', [AbsenController::class, 'GetAbsenByUuid']);
Route::post('/addabsen', [AbsenController::class, 'AddAbsen']);
Route::put('/updateabsen/{uuid}', [AbsenController::class, 'UpdateAbsenByUuid']);
Route::delete('/deleteabsen/{uuid}', [AbsenController::class, 'DeleteAbsenByUuid']);

// users route
Route::get('/users', [UserController::class, 'GetAllUser']);
Route::get('/userbyuuid/{uuid}', [UserController::class, 'GetUserByUuid']);
Route::post('/register', [UserController::class, 'Register']);
Route::put('/updateuser/{uuid}', [UserController::class, 'UpdateUserByUuid']);
Route::delete('/deleteuser/{uuid}', [UserController::class, 'DeleteUserByUuid']);

// login route
Route::post('/login', [UserController::class, 'Login']);

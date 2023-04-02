<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\MahasiswaController;
use App\http\Controllers\BukuController;
use App\http\Controllers\JurusanController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getmahasiswa',[MahasiswaController::class,'getmahasiswa']);
Route::get('/getid/{id}',[MahasiswaController::class,'getid']);
Route::post('/createmahasiswa',[MahasiswaController::class,'createmahasiswa']);
Route::put('/updatemahasiswa/{id}',[MahasiswaController::class,'updatemahasiswa']);
Route::delete('/deletetemahasiswa/{id}',[MahasiswaController::class,'deletemahasiswa']);

Route::get('/getbuku',[BukuController::class,'getbuku']);
Route::get('/getidbuku/{id}',[BukuController::class,'getidbuku']);
Route::post('/createbuku',[BukuController::class,'createbuku']);
Route::put('/updatebuku/{id}',[BukuController::class,'updatebuku']);
Route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);

Route::get('/getjurusan',[JurusanController::class,'getjurusan']);
Route::get('/getidjurusan/{id}',[JurusanController::class,'getidjurusan']);
Route::post('/createjurusan',[JurusanController::class,'createjurusan']);
Route::put('/updatebjurusan/{id}',[JurusanController::class,'updatejurusan']);
Route::delete('/deletejurusan/{id}',[JurusanController::class,'deletejurusan']);
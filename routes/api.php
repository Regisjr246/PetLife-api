<?php

use App\Http\Controllers\Clientecontroller;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('cadastro/cliente', [Clientecontroller::class, 'cliente']);

/*Cadastro de fornecedor */
Route::post('cadastro/fornecedor', [FornecedorController::class, 'fornecedor']);

/* Cadastro de pets*/
Route::post('cadastro/pets', [PetController::class, 'pet']);



Route::get('/find/{id}',  [Clientecontroller::class, 'pesquisarPorCliente']);
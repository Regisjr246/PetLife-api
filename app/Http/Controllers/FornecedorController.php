<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FornecedorController extends Controller
{
    public function fornecedor(FornecedorRequest $request)
    {

       
        $fornecedor = Fornecedor::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'produto' => $request->produto,
            
            'password' => Hash::make($request->password)

        ]);


        return response()->json([
            "success" => true,
            "message" => "Fornecedor Cadastrado com sucesso",
            "data" => $fornecedor
        ], 200);
    }
}

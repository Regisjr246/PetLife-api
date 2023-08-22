<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clienterequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Clientecontroller extends Controller
{
    public function cliente(Clienterequest $request)
    {

       
        $usuario = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'password' => Hash::make($request->password)

        ]);


        return response()->json([
            "success" => true,
            "message" => "Usuário Cadastrado com sucesso",
            "data" => $usuario
        ], 200);
    }
}

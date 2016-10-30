<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AutenticacaoController extends Controller
{
    public function autenticar(Request $request)
    {

        $login = [
            "matricula" => $request->get('matricula'),
            "password" => $request->get('senha')
        ];

        try {
            // verifica a matricula e senha e cria um token para o usuário
            if (! $token = JWTAuth::attempt($login)) {
                return response()->json(['erro' => 'login_invalido'], 401);
            }
        } catch (JWTException $e) {
            // algo deu errado ao tentar criar o token
            return response()->json(['erro' => 'erro_ao_criar_token'], 500);
        }

        // Se tudo der certo retorna o token
        return response()->json(compact('token'));
    }

    public function getUsuarioAutenticado()
    {
        return JWTAuth::parseToken()->authenticate();
    }
}

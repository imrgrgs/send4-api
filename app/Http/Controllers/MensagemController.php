<?php

namespace App\Http\Controllers;

use App\Mensagem;

class MensagemController extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::with('contato')->get();
        return response()->json($mensagens);
    }

    public function show($id)
    {
        $mensagem = Mensagem::with('contato')->find($id);

        if (!$mensagem) {
            return response()->json([
                'message' => 'Mensagem não encontrada',
            ], 404);
        }

        return response()->json($mensagem);
    }

}

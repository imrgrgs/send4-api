<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = Contato::with('user')->get()->where('user_id', '=', Auth::user()->id);
        return response()->json($contatos);
    }

    public function show($id)
    {
        $contato = Contato::with('user')->find($id);

        if (!$contato) {
            return response()->json([
                'message' => 'Contato não encontrado',
            ], 404);
        }

        return response()->json($contato);
    }

    public function store(Request $request)
    {
        return Contato::create($request->all());
    }
}

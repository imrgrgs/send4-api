<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $baseURI = 'http://localhost:8000/api/';
        // $client = new Client(['base_uri' => $baseURI, 'headers' => [
        //     'Content-Type' => 'application/json',
        // ]]);

        // $contatos = $client->get('contatos');

        $contatos = Contato::with('user')->get()->where('user_id', '=', Auth::user()->id);
        return view('home', compact('contatos'));
    }

    public function novoContato()
    {
        // $baseURI = 'http://localhost:8000/api/';
        // $client = new Client(['base_uri' => $baseURI, 'headers' => [
        //     'Content-Type' => 'application/json',
        // ]]);

        // $contatos = $client->get('contatos');

        return view('novoContato');
    }

    public function registerContato(Request $request)
    {
        $all = $request->all();
        $all['user_id']= Auth::user()->id;
        $contato = Contato::create($all);
        return $this->registered($request, $contato)
        ?: redirect('/home');

    }

    protected function registered(Request $request, $contato)
    {
        //
    }

}

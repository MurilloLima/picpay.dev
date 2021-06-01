<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

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
        $data = Conta::orderby('created_at')->paginate(50);
        return view('home', compact('data'));
    }

    public function store(ContaRequest $request, Conta $conta)
    {
        $conta->create([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'saldo' => '0.04'
        ]);
        return redirect()->back()->with('success', 'Conta salva com sucesso!');
    }

    public function delete($id, Conta $conta)
    {
        $conta->destroy($id);
        return redirect()->back()->with('success', 'Conta removida com sucesso!');
    }
}

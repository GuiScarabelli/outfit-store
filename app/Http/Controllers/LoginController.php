<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginPage() {
        return view('login');
    }

    public function dashboardPage() {
        $login = Session::get('login');
        if(!$login) {
            return redirect('/');
        }
        return view('dashboard');
    }

    public function autenticar(Request $request) {
        $login = $request->login;
        $senha = $request->senha;
        
        if($login == 'admin' && $senha == "123") {
            Session::put('login', $login);
            return redirect()->route('dashboardPage');
        }

        $cliente = ClienteModel::where('emailCliente', $login)->first();
        if($cliente && Hash::check($senha, $cliente->senhaCliente)) {
            Session::put('login', $login);
            return redirect()->route('index');
        }


        return redirect()->back()->withErrors("Login ou senha incorretos!");
    }

    public function index() {
        $login = Session::get('login');
        if(!$login) {
            return redirect('/');
        }
        return view('index');

    }

    public function cadastrar(Request $request) {
        $clientes = new ClienteModel();

        $senha = Hash::make($request->senha);

        $clientes->create([
            'nomeCliente' => $request->nome,
            'senhaCliente' => $senha,
            'dtNascCliente' => $request->data,
            'estadoCivilCliente' => $request->civil,
            'cepCliente' => $request->cep,
            'enderecoCliente' => $request->endereco,
            'numeroCliente' => $request->numero,
            'cidadeCliente' => $request->cidade,
            'estadoCliente' => $request->estado,
            'rgCliente' => $request->rg,
            'cpfCliente' => $request->cpf,
            'emailCliente' => $request->email,
            'foneCliente' => $request->telefone,
            'celularCliente' => $request->celular,
        ]);

        return redirect()->back();
    }

    public function logout() {
        Session::flush();
        return redirect('/');
    }

    public function registroPage() {
        return view('registro');
    }
}

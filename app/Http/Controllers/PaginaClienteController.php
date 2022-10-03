<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\ProdutoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaginaClienteController extends Controller
{
    
    public function produtos(Request $request) {
        $login = Session::get('login');
        if(!$login) {
            return redirect('/');
        }

        $produtos = ProdutoModel::all();
        $categorias = CategoriaModel::all();

        $texto = $request->texto;
        $radio = $request->flexRadioDefault;

        if(!empty($texto)) {
            if(isset($radio)) {
                $produtos = ProdutoModel::where('produto','LIKE', '%'.$texto.'%')->where('idCategoria', $radio)->get();
            }
            else {
                $produtos = ProdutoModel::where('produto','LIKE', '%'.$texto.'%')->get();
            }
        }
        else if(isset($radio)) {
            $produtos = ProdutoModel::where('idCategoria', $radio)->get();
        }

        return view('produtos-clientes', compact('produtos', 'categorias'));
    }


    public function resetar() {
        $login = Session::get('login');
        if(!$login) {
            return redirect('/');
        }

        $produtos = ProdutoModel::all();
        $categorias = CategoriaModel::all();

        return view('produtos-clientes', compact('produtos', 'categorias'));

    }

    public function carrinho() {
        $login = Session::get('login');
        if(!$login) {
            return redirect('/');
        }
        return view('carrinho');
    }
}

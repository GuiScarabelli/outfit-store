<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\ProdutoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session as Session;

class ProdutoController extends Controller
{

    private $produtos;

    public function __construct()
    {
        $this->produtos = new ProdutoModel();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login = Session::get('login');
        if($login != 'admin') {
            return redirect('/');
        }

        $produtos = ProdutoModel::all();
        $categorias = CategoriaModel::all();
        return view('produto', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = "";

        if($request->hasFile("foto") && $request->file("foto")->isValid()) {
            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->foto->move(public_path('img/produtos'), $imageName);
        }

        $this->produtos->create([
            'nomeProduto' => $request->produto,
            'valorProduto' => $request->valor,
            'fotoProduto' => $imageName,
            'idCategoria' => $request->categoria
        ]);

        

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->produtos->where('idProduto', $id)->update([
            'produto' => $request->produto,
            'valor' => $request->valor,
            'idCategoria' => $request->categoria
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageName = $this->produtos->where(['idProduto'=>$id])->first()->foto;

        if(File::exists('img/produtos/'.$imageName)) {
            File::delete('img/produtos/'.$imageName);
        }   

        $this->produtos->where('idProduto', $id)->delete();
        return redirect()->back();
    }
}

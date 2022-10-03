<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    private $categorias;

    public function __construct()
    {
        $this->categorias = new CategoriaModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = $this->categorias->all();

        return view('categoria', compact('categorias'));
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
        $request->validate([
            'categoria' => 'required'
        ]);

        $cad = $this->categorias->create([
            'categoria' => $request->categoria
        ]);

        if($cad) {
            return redirect()->back();
        }

        return redirect()->back()->withErrors('Erro ao cadastrar');
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
        $this->categorias->where('idCategoria', $id)->update([
            'categoria' => $request->categoria
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
        $this->categorias->where('idCategoria', $id)->delete();
        return redirect()->back();
    }
}

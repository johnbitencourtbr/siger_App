<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamentos;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = Equipamentos::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipamentos.create');
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
            'descricao'=>'required',
            'etiqueta'=> 'required|unique:equipamentos',
            'numero_serie' => 'required|unique:equipamentos',
            'marca' => 'required',
            'modelo' => 'required'
          ]);
          
          $equipamentos = new Equipamentos([
            'descricao' => $request->get('descricao'),
            'etiqueta'=> $request->get('etiqueta'),
            'numero_serie'=> $request->get('numero_serie'),
            'marca' => $request->get('marca'),
            'modelo' => $request->get('modelo'),
          ]);
          $equipamentos->save();
          return redirect('/equipamentos')->with('success', 'Equipamento adicionado com sucesso!');
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
        $equipamentos = Equipamentos::find($id);

        return view('equipamentos.edit', compact('equipamentos'));
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
        $request->validate([
            'descricao'=>'required',
            'modelo'=> 'required',
            'numero_serie' => 'required',
            'marca' => 'required',
          ]);
    
          $equipamentos = Equipamentos::find($id);
          $equipamentos->descricao = $request->get('descricao');
          $equipamentos->modelo = $request->get('modelo');
          $equipamentos->numero_serie = $request->get('numero_serie');
          $equipamentos->save();
    
          return redirect('/equipamentos')->with('success', 'Informação alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamentos = Equipamentos::find($id);
        $equipamentos->delete();
        return redirect('/equipamentos')->with('success', 'Equipamento excluído com sucesso');
    }
}

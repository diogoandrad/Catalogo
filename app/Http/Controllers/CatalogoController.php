<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogoModel;

class CatalogoController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $contatos = CatalogoModel::paginate(6);
        return view('read', compact('contatos'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('create');
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $contato = new CatalogoModel;
        if ($contato->validarEmail($request->email)){
            return redirect()->route('contato.create')->with('messageValidate', 'Email já cadastrado!');
        }
        $contato->nome = $request->nome;
        $contato->lagradouro = $request->lagradouro;
        $contato->numero = $request->numero;
        $contato->bairro = $request->bairro;
        $contato->cidade = $request->cidade;
        $contato->estado = $request->estado;
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->sexo = $request->sexo;
        $contato->nascimento = $request->nascimento;
        $contato->save();
        return redirect()->route('contato.index')->with('messageSuccess', 'Contato cadastrado com sucesso!');
    }

    //Display the specified resource.
    public function show($id)
    {
        $contato = CatalogoModel::findOrFail($id);
        return view('show', compact('contato'));
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $contato = CatalogoModel::findOrFail($id);
        return view('update', compact('contato'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $contato = CatalogoModel::findOrFail($id);
        $contato->nome = $request->nome;
        $contato->lagradouro = $request->lagradouro;
        $contato->numero = $request->numero;
        $contato->bairro = $request->bairro;
        $contato->cidade = $request->cidade;
        $contato->estado = $request->estado;
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->sexo = $request->sexo;
        $contato->nascimento = $request->nascimento;
        $contato->save();   
        return redirect()->route('contato.index')->with('messageUpdate', 'Contato editado com sucesso!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $contato = CatalogoModel::findOrFail($id);
        $contato->delete();
        return redirect()->route('contato.index')->with('messageDelete', 'Contato deletado com sucesso!');
    }

    //Filter contacts for dates.
    public function searchContato(Request $request, CatalogoModel $CatalogoModel)
    {
        $dataForm = $request->all();
        $contatos = $CatalogoModel->search($dataForm);
        return view('read', compact('contatos'));
    }
}

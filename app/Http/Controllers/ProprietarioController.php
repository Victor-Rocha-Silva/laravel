<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProprietarioModel;

class ProprietarioController extends Controller
{
    function formulario(){
        return view('proprietario-formulario');
    }
    function store(Request $dados){
        if ($dados->id == '') {
            $proprietario = new ProprietarioModel();
            $proprietario->create($dados->all());
        } else {
            $proprietario = ProprietarioModel::find($dados->id);
            $update = $proprietario->update($dados->all());
        }
        
        $proprietario = ProprietarioModel::all();
        
        return view('proprietario-listar', ['proprietario'=>$proprietario]);
    } 

    function list(){
        $proprietario = ProprietarioModel::all();
        return view('proprietario-listar',['proprietario' => $proprietario]);
    }

    function remove($id){
        ProprietarioModel::destroy($id);

        return redirect()->route('proprietario-list');
    }  
    function edit($id){
        $proprietario = ProprietarioModel::find($id);

    return view('proprietario-formulario', ['proprietario' => $proprietario]);
    }
}
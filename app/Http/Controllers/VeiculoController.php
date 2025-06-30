<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VeiculoModel;

class VeiculoController extends Controller
{
    function formulario(){
        return view('veiculo-formulario');
    }

    function store(Request $dados){
        if ($dados->id == '') {
            $veiculo = new VeiculoModel();
            $veiculo->create($dados->all());
        } else {
            $veiculo = VeiculoModel::find($dados->id); 
            $update = $veiculo->update($dados->all());
        }
        
        $veiculo = VeiculoModel::all();
        
        return view('veiculo-listar', ['veiculo'=>$veiculo]);
    }  

    function list(){
        $veiculo = VeiculoModel::all();
        return view('veiculo-listar',['veiculo' => $veiculo]);
    }

    function remove($id){
        VeiculoModel::destroy($id);

        return redirect()->route('veiculo-list');
    }  
    function edit($id){
        $veiculo = VeiculoModel::find($id);

    return view('veiculo-formulario', ['veiculo' => $veiculo]);
    }
}
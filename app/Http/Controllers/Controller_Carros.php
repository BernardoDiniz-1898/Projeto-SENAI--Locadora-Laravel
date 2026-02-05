<?php

namespace App\Http\Controllers;

use App\Models\Model_Carros;
use Illuminate\Http\Request;

class Controller_Carros extends Controller
{


    public function index()
    {
        $carros = Carros::orderBy('id', 'asc')->paginate(10);
        return view('carros.index', compact('carros'));

    }


    public function store(Request $request)
    {
            $validate = $request->validate([
            'Modelo' => 'required|max:100',
            'Marca' => 'required|max:15',
            'Placa' => 'required|max:10|unique:carros,Placa',
            'Valor_Diaria' => 'required|numeric',
            'Descricao' => 'nullable|string',
            'Cor' => 'required|max:100',
            'Ano' => 'required|integer',
        ]);

        Model_Carros::create([

            'Modeo' => $validate['Modelo'],
            'Marca' => $validate['Marca'],
            'Placa' => $validate['Placa'],
            'Valor_Diaria' => $validate['Valor_Diaria'],
            'Descricao' => $validate['Descricao'],
            'Cor' => $validate['Cor'],
            'Ano_Veiculo' => $validate['Ano_Veiculo'], 

        ]);

        return redirect()->route('carros.index')->with('success', 'Carro criado com sucesso!');
    }

 
    
  
    public function update(Request $request, Model_Carros $model_Carros)
    {
        $validate = $request->validate([
            'Modelo' => 'required|max:100',
            'Marca' => 'required|max:15',
            'Placa' => 'required|max:30|unique:carros,Placa,' . $model_Carros->id,
            'Valor_Diaria' => 'required|numeric',
            'Descricao' => 'nullable|string',
            'Cor' => 'required|max:100',
            'Ano' => 'required|integer',
        ]);

        $carros->update([
            'Modelo' => $validate['Modelo'],
            'Marca' => $validate['Marca'],
            'Placa' => $validate['Placa'],
            'Valor_Diaria' => $validate['Valor_Diaria'],
            'Descricao' => $validate['Descricao'],
            'Cor' => $validate['Cor'],
            'Ano_Veiculo' => $validate['Ano_Veiculo'], 
        ]);

        return redirect()->route('carros.index')->with('success', 'Carro atualizado com sucesso!');
    }

    public function destroy(Model_Carros $model_Carros)
    {
        $carro->delete();
        return redirect()->route('carros.index')->with('success', 'Carro deletado com sucesso!');
    }
}

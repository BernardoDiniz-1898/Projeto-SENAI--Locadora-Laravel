<?php

namespace App\Http\Controllers;

use App\Models\Carros;
use Illuminate\Http\Request;

class CarrosController extends Controller
{


    public function index()
    {
        $carros = Carros::orderByDesc('id')->get();
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

        Carros::create([

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

 
    
  
    public function update(Request $request, Carros $carros)
    {
        $validate = $request->validate([
            'Modelo' => 'required|max:100',
            'Marca' => 'required|max:15',
            'Placa' => 'required|max:30|unique:carros,Placa,' . $carros->id,
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

    public function destroy(Carros $carros)
    {
        $carros->delete();
        return redirect()->route('carros.index')->with('success', 'Carro deletado com sucesso!');
    }
}

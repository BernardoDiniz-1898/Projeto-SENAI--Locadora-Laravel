<?php

namespace App\Http\Controllers;

use App\Models\Model_Carros;
use Illuminate\Http\Request;

class Controller_Carros extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carros = Carros::orderBy('id', 'asc')->paginate(10);
        return view('carros.index', compact('carros'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Model_Carros $model_Carros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model_Carros $model_Carros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Model_Carros $model_Carros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model_Carros $model_Carros)
    {
        //
    }
}

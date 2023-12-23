<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Testamento::create($request->all())) {
            return response()->json([
                'message' => 'Testamento adicionado com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'Nao foi possivel adicionar o Testamento'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testamento = Testamento::find($id);
        if ($testamento) {
            $testamento->livros;
            return $testamento;
        }
        return response()->json([
            'message' => 'Testamento nao encontrado'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testamento = Testamento::find($id);
        if ($testamento->update($request->all())) {
            return response()->json([
                'message' => 'Testamento alterado com sucesso'
            ]);
        }
        return response()->json([
            'message' => 'Nao foi possivel alterar esse testamento'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Testamento::destroy($id)) {
            return response()->json([
                'message' => 'Testamento excluido com sucesso'
            ]);
        }
        return response()->json([
            'message' => 'Nao foi possivel excluir este testamento'
        ], 404);
    }
}

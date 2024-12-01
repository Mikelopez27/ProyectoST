<?php

namespace App\Http\Controllers;

use App\Models\categoria as Categorias;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categorias::all(), 200);
    }

    public function show($id)
    {
        $categoria = Categorias::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }
        return response()->json($categoria, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria' => 'required|max:255',
        ]);

        $categoria = Categorias::create($data);

        return response()->json(['message' => 'Categoría creada exitosamente', 'categoria' => $categoria], 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categorias::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $data = $request->validate([
            'categoria' => 'required|max:255',
        ]);

        $categoria->update($data);

        return response()->json(['message' => 'Categoría actualizada exitosamente', 'categoria' => $categoria], 200);
    }

    public function destroy($id)
    {
        //
    }
}

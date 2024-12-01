<?php

namespace App\Http\Controllers;

use App\Models\producto as Productos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Productos::select('productos.id_prod', 'productos.titulo', 'productos.precio', 'productos.descripcion', 'categorias.categoria')
            ->join('categorias', 'productos.categoria', '=', 'categorias.id_cate')
            ->get();

        return response()->json($productos, 200);
    }

    public function show($id)
    {
        $produto = Productos::select('productos.id_prod', 'productos.titulo', 'productos.precio', 'productos.descripcion', 'categorias.categoria')
        ->join('categorias', 'productos.categoria', '=', 'categorias.id_cate')
        ->where('productos.id_prod', $id)
        ->get();
        if (!$produto) {
            return response()->json(['message' => 'Producto no encontrada'], 404);
        }
        return response()->json($produto, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|max:255',
            'categoria' => 'required|exists:categorias,id_cate'
        ]);

        $producto = Productos::create($data);

        $consulta = Productos::select('productos.id_prod', 'productos.titulo', 'productos.precio', 'productos.descripcion', 'categorias.categoria')
        ->join('categorias', 'productos.categoria', '=', 'categorias.id_cate')
        ->where('productos.id_prod', $producto->id_prod)
        ->get();

        return response()->json(['message' => 'Producto creado exitosamente','Producto' => $consulta], 201);
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $data = $request->validate([
            'titulo' => 'required|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|max:255',
            'categoria' => 'required|exists:categorias,id_cate'
        ]);

        $producto->update($data);
        
        $consulta = Productos::select('productos.id_prod', 'productos.titulo', 'productos.precio', 'productos.descripcion', 'categorias.categoria')
        ->join('categorias', 'productos.categoria', '=', 'categorias.id_cate')
        ->where('productos.id_prod', $id)
        ->get();

        return response()->json(['message' => 'Producto actualizado exitosamente', 'Editado' => $consulta], 200);
    }

    public function destroy($id)
    {
        $producto = Productos::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado exitosamente'], 200);
    }
}

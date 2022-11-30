<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
            'quantidade' => 'required',
            'preco' => 'required'
        ]);

        return Product::create($request->all());
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $produto = Product::findOrFail($id);
        $produto -> update($request->all());
        $produto ->save();
        return $produto; 
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return ["message" => 'Produto excluído com sucesso !'];
    }
}

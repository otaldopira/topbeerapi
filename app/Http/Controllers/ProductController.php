<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $produto = $request->all();
        $produto['preco'] = str_replace(',', '.', $request->preco);

        $produtos = Validator::make($produto, [
            'provider_id' => ['required', 'integer'],
            'titulo' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'categoria' => ['required', 'string'],
            'quantidade' => ['required', 'integer'],
            'preco' => ['required', 'numeric']
        ]);

        if ($produtos->fails()) {
            return $produtos->errors();
        }

        return Product::create($produto);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $prod = Product::findOrFail($id);
        $produto = $request->all();
        $produto['preco'] = str_replace(',', '.', $request->preco);

        $produtos = Validator::make($produto, [
            'provider_id' => ['required', 'integer'],
            'titulo' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'categoria' => ['required', 'string'],
            'quantidade' => ['required', 'integer'],
            'preco' => ['required', 'numeric']
        ]);

        if ($produtos->fails()) {
            return $produtos->errors();
        }

        $prod->update($produto);
        $prod->save();
        return $produto;
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return ["message" => 'Produto excluído com sucesso !'];
    }
}

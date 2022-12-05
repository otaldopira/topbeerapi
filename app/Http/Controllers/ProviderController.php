<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Rules\Cnpj;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{

    public function index()
    {
        return Provider::all();
    }

    public function store(Request $request)
    {

        $cnpj = $request->all();
        $cnpj['cnpj'] = str_replace(['.', '-', '/'], '', $request->cnpj);

        $fornecedor = Validator::make($cnpj, [
            'nome' => ['required', 'string', 'min:3'],
            'cnpj' => ['required', 'string', 'unique:providers', new Cnpj],
            'email' => ['required', 'email'],
        ], [
            'nome.required' => 'O nome é obrigatório !'
        ]);

        if ($fornecedor->fails()) {
            return $fornecedor->errors();
        }

        return Provider::create($cnpj);
    }

    public function show($id)
    {
        return Provider::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $empresa = Provider::findOrFail($id);
        $cnpj = $request->all();
        $cnpj['cnpj'] = str_replace(['.', '-', '/'], '', $request->cnpj);

        $fornecedor = Validator::make($cnpj, [
            'nome' => ['required', 'string', 'min:3'],
            'cnpj' => ['required', 'string', new Cnpj],
            'email' => ['required', 'email'],
        ], [
            'nome.required' => 'O nome é obrigatório !'
        ]);

        if ($fornecedor->fails()) {
            return $fornecedor->errors();
        }

        $empresa->update($cnpj);
        $empresa->save();
        return $empresa;
    }

    public function destroy($id)
    {
        Provider::findOrFail($id)->delete();
        return ["message" => 'Fornecedor excluído com sucesso !'];
    }
}

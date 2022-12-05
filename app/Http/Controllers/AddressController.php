<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Address::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endereco = $request->all();
        $endereco['cep'] = str_replace('-', '', $request->cep);

        $endrecoFornecedor = Validator::make($endereco, [
            'provider_id' => ['required', 'integer'],
            'cep' => ['required', 'string', 'min:8', 'max:8',],
            'logradouro' => ['required', 'string'],
            'numero' => ['required', 'integer'],
            'bairro' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'estado' => ['required', 'string', 'min:2', 'max:2']
        ]);

        if($endrecoFornecedor->fails()){
            return $endrecoFornecedor->errors();
        }

        return Address::create($endereco);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Address::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findAddress = Address::findOrFail($id);
        $endereco = $request->all();
        $endereco['cep'] = str_replace('-', '', $request->cep);

        $endrecoFornecedor = Validator::make($endereco, [
            'provider_id' => ['required', 'integer'],
            'cep' => ['required', 'string', 'min:8', 'max:8',],
            'logradouro' => ['required', 'string'],
            'numero' => ['required', 'integer'],
            'bairro' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'estado' => ['required', 'string', 'min:2', 'max:2']
        ]);

        if($endrecoFornecedor->fails()){
            return $endrecoFornecedor->errors();
        }

        $findAddress->update($endereco);
        $findAddress->save();
        return $endereco;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::findOrFail($id)->delete();
        return ["message" => 'Endereço excluído com sucesso !'];
    }
}

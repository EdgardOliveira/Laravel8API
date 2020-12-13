<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Validator;

class EnderecoController extends Controller
{
    private $endereco;

    /**
     * EnderecoController constructor.
     * @param $endereco
     */
    public function __construct(Endereco $endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enderecos = $this->endereco->all();

        return response()->json([
            'enderecos' => $enderecos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'cep' => 'required',
                'logradouro' => 'required',
                'numero' => 'required',
                'complemento' => 'required',
                'bairro' => 'required',
                'estado_id' => 'required',
                'cidade_id' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['sucesso' => false, 'problemas' => $validator->errors()]);
        }

        $data = $request->all();
        $endereco = $this->endereco->create($data);

        if (!is_null($endereco))
            return response()->json(['sucesso' => true, 'mensagem' => 'Cadastrado com sucesso!', 'resultado' => $endereco]);
        else
            return response()->json(['sucesso' => false, 'mensagem' => 'Falhou ao tentar cadastrar!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //endereco específico
        $endereco = $this->endereco->find($id);

        if (!$endereco) {
            return response()->json([
                'successo' => false,
                'mensagem' => 'Recurso com o id ' . $id . ' não foi encontrado no banco de dados'], 400);
        }

        return response()->json($endereco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'cep' => 'required',
                'logradouro' => 'required',
                'numero' => 'required',
                'complemento' => 'required',
                'bairro' => 'required',
                'estado_id' => 'required',
                'cidade_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'problemas' => $validator->errors()]);
        }

        $data = $request->all();
        $endereco = $this->endereco->find($data['id']);
        $endereco->update($data);

        return response()->json([
            'sucesso'=> true,
            'mensagem' => 'Recurso com id: ' . $data['id'] . ' atualizado com sucesso do banco de dados!',
            'endereco' => $endereco
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = $this->endereco->find($id);
        $endereco->delete();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Recurso com id: ' . $id . ' excluído com sucesso do banco de dados!']);
    }
}

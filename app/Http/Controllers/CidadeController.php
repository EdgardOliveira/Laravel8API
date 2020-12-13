<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Validator;

class CidadeController extends Controller
{
    private $cidade;

    /**
     * CidadeController constructor.
     * @param $cidade
     */
    public function __construct(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = $this->cidade->all();

        return response()->json([
            'cidades' => $cidades
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
                'nome' => 'required',
                'estado_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['sucesso' => false, 'problemas' => $validator->errors()]);
        }

        $data = $request->all();
        $cidade = $this->cidade->create($data);

        if (!is_null($cidade))
            return response()->json(['sucesso' => true, 'mensagem' => 'Cadastrado com sucesso!', 'resultado' => $cidade]);
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
        //cidade específica
        $cidade = $this->cidade->find($id);

        if (!$cidade) {
            return response()->json([
                'successo' => false,
                'mensagem' => 'Recurso com o id ' . $id . ' não foi encontrado no banco de dados'], 400);
        }

        return response()->json($cidade);
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
                'nome' => 'required',
                'estado_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'problemas' => $validator->errors()]);
        }

        $data = $request->all();
        $cidade = $this->cidade->find($data['id']);
        $cidade->update($data);

        return response()->json([
            'sucesso'=> true,
            'mensagem' => 'Recurso com id: ' . $data['id'] . ' atualizado com sucesso do banco de dados!',
            'cidade' => $cidade
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
        $cidade = $this->cidade->find($id);
        $cidade->delete();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Recurso com id: ' . $id . ' excluído com sucesso do banco de dados!']);
    }
}

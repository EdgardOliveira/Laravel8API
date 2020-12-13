<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Validator;

class EstadoController extends Controller
{
    private $estado;

    /**
     * EstadoController constructor.
     * @param $estado
     */
    public function __construct(Estado $estado)
    {
        $this->estado = $estado;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = $this->estado->all();

        return response()->json([
           'estados' => $estados
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
                'uf' => 'required',
                'nome' => 'required',
                'cadastrado_por' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['sucesso' => false, 'problemas' => $validator->errors()]);
        }

        $data = $request->all();
        $estado = $this->estado->create($data);

        if (!is_null($estado))
            return response()->json(['sucesso' => true, 'mensagem' => 'Cadastrado com sucesso!', 'resultado' => $estado]);
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
        //estado específico
        $estado = $this->estado->find($id);

        if (!$estado) {
            return response()->json([
                'successo' => false,
                'mensagem' => 'Recurso com o id ' . $id . ' não foi encontrado no banco de dados'], 400);
        }

        return response()->json($estado);
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
                'uf' => 'required',
                'nome' => 'required',
                'cadastrado_por' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'problemas' => $validator->errors()]);
        }

        $data = $request->all();
        $estado = $this->estado->find($data['id']);
        $estado->update($data);

        return response()->json([
            'sucesso'=> true,
            'mensagem' => 'Recurso com id: ' . $data['id'] . ' atualizado com sucesso do banco de dados!',
            'estado' => $estado
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
        $estado = $this->estado->find($id);
        $estado->delete();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Recurso com id: ' . $id . ' excluído com sucesso do banco de dados!']);
    }
}

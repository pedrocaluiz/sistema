<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Questao;
use App\Model\Resposta;
use App\Model\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $cursos = Curso::all();

        return view('questoes.instrutor.create',
            compact('unidades', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $unidade = Unidade::find($request->unidade_id);
        $incorretas = $request->incorretas;

        DB::beginTransaction();

        $questao = new Questao();
        $questao->unidade_id = $unidade->id;
        $questao->questao = $request->input('questao');
            if ($request->imagem == null){
                $questao->imagem = null;
            }else {
                $pathImg = $request->imagem->store('questoes', 'public');
                $questao->imagem = $pathImg;
            }
        $questao->respCorreta = $request->input('correta');
        $questao->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $questao->save();

            foreach ($incorretas as $resp) {
                $resposta = new Resposta();
                $resposta->questao_id = $questao->id;
                $resposta->resposta = $resp;
                $resposta->usuarioAtualizacao = $request->input('usuarioAtualizacao');
                $resposta->save();
            }

        $request->session()->flash('adicionada',
            "Questão  inserida com sucesso.");
        DB::commit();

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

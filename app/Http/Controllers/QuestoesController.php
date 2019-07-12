<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Questao;
use App\Model\Resposta;
use App\Model\Unidade;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {

        $this->authorize('view', Questao::class);

        $questoes = Questao::all();
        $unidades = Unidade::all();
        $cursos = Curso::all();
        $users = User::all();
        $respostas = Resposta::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');



        return view('questoes.instrutor.questoes',
            compact('cursos', 'users', 'adicionada',
                'excluida', 'alterada', 'unidades', 'questoes', 'respostas'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $unidades = Unidade::all();
        $cursos = Curso::all();

        $this->authorize('create', Questao::class);

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

        $this->authorize('create', Questao::class);

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

        return redirect()->route('questoes');

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
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $unidades = Unidade::all();
        $questao = Questao::find($id);
        $user = User::find($questao->usuarioAtualizacao);
        $respostas = $questao->respostas;

        $this->authorize('update', $questao);

        /*if ( Gate::denies('instrutor', $curso)){
            abort(403, 'Sem autorização para acessar essa página');
        }*/

        //dd($respostas);

        return view('questoes.instrutor.edit',
            compact('questao','user', 'unidades', 'respostas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $questao = Questao::find($id);

        $this->authorize('update', $questao);

        $questao->unidade_id = $request->input('unidade_id');;
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

        $incorretas = $request->input('incorretas');
        $incorretas_id = $request->input('incorretas_id');
        $novas_incorretas = $request->input('novas_incorretas');

        for ($i = 0; $i < count($incorretas); $i++) {
            $resposta = Resposta::find($incorretas_id[$i]);
            $resposta->resposta = $incorretas[$i];
            $resposta->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $resposta->save();
        }

        if (isset($novas_incorretas)) {
            foreach ($novas_incorretas as $nova){
                $nova_resposta = new Resposta();
                $nova_resposta->questao_id = $questao->id;
                $nova_resposta->resposta = $nova;
                $nova_resposta->usuarioAtualizacao = $request->input('usuarioAtualizacao');
                $nova_resposta->save();
            }
        }

        $request->session()->flash('alterada',
            "Questão id: $questao->id alterada com sucesso.");
        DB::commit();

        return redirect()->route('questoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id, Request $request)
    {
        $questao = Questao::find($id);
        $id = $questao->id;

        $this->authorize('delete', $questao);

        if (isset($curso)){
            $curso->delete();
            $request->session()->flash('excluida',
                "Questão id:  $id excluída com sucesso.");
            return redirect()->route('questoes');
        }
        return response('Questão não encontrada', 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Prova;
use App\Model\ProvaQuestao;
use App\Model\Questao;
use App\Model\Resposta;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\Model\UsuarioCursoUnidadeMaterialProva;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;

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
        $warning = $request->session()->get('warning');

        return view('questoes.instrutor.questoes',
            compact('cursos', 'users', 'adicionada',
                'excluida', 'alterada', 'unidades', 'questoes', 'respostas', 'warning'
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
        $questao->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            if ($request->imagem == null){
                $questao->imagem = null;
            }else {
                $pathImg = $request->imagem->store('questoes', 'public');
                $questao->imagem = $pathImg;
            }

        $questao->respCorreta_id = null;
        $questao->save();

            $resposta = new Resposta();
            $resposta->questao_id = $questao->id;
            $resposta->resposta = $request->input('correta');
            $resposta->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $resposta->save();

        $questao->respCorreta_id = $resposta->id;
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
        $auth = Auth::user();
        $unidade = Unidade::find($id);
        //verificar se todos os materiais estão concluídos.


        $prova_iniciada = Prova::where([
            ['unidade_id', $unidade->id],
            ['user_id', $auth->id],
            ['dataConclusao', null],
        ])->get();
        //significa que há iniciada.

        $prova_concluida = Prova::where([
            ['unidade_id', $unidade->id],
            ['user_id', $auth->id],
            ['dataConclusao', '<>' ,null],
        ])->orderBy('tentativa', 'desc')->get();
        //significa que há prova concluída.


        //se existir alguma prova iniciada
        if (isset($prova_iniciada[0]) ) {
            $prova = $prova_iniciada[0];
            $quest_resp = ProvaQuestao::where('prova_id', $prova_iniciada[0]->id)->get();
            $questoes = Questao::where('unidade_id', $prova_iniciada[0]->unidade_id)->get();
            $respostas = Resposta::all();
            return view('questoes.aluno.questoes',
                compact('quest_resp', 'unidade', 'questoes', 'respostas', 'prova'));
        }

        //entra aqui se não houver nenhuma prova concluída e nenhuma em andamento
        if (!isset($prova_concluida[0]) && (!isset($prova_iniciada[0])) ){
            $prova = $this->criarProva($unidade, $auth, 1);
            $quest_resp = ProvaQuestao::where('prova_id', $prova->id)->get();
            $questoes = Questao::where('unidade_id', $prova->unidade_id)->get();
            $respostas = Resposta::all();

            return view('questoes.aluno.questoes',
                compact('quest_resp', 'unidade', 'questoes', 'respostas', 'prova'));
        }

        //se existir alguma prova concluída
        if (isset($prova_concluida[0]) ) {
            $tentativa = $prova_concluida[0]->tentativa;
            $prova = $this->criarProva($unidade, $auth, $tentativa);


            $quest_resp = ProvaQuestao::where('prova_id', $prova->id)->get();
            $questoes = Questao::where('unidade_id', $prova->unidade_id)->get();
            $respostas = Resposta::all();
            return view('questoes.aluno.questoes',
                compact('quest_resp', 'unidade', 'questoes', 'respostas', 'prova'));
        }

        return view('questoes.aluno.questoes',
            compact('quest_resp', 'unidade', 'questoes', 'respostas'));
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
        $respCorreta = $respostas->where('id', $questao->respCorreta_id);

        $this->authorize('update', $questao);

        /*if ( Gate::denies('instrutor', $curso)){
            abort(403, 'Sem autorização para acessar essa página');
        }*/

        //dd($respostas);

        return view('questoes.instrutor.edit',
            compact('questao','user', 'unidades', 'respostas', 'respCorreta'));
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
        $questao->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $questao->save();

        //Salvando a Correta
        $resposta = Resposta::find($request->input('correta_id'));
        $resposta->resposta = $request->input('correta');
        $resposta->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $resposta->save();

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
    public function destroy(Request $request)
    {
        $questao = Questao::find($request->questao_id);
        $id = $questao->id;

        $this->authorize('delete', $questao);

        if (isset($questao)){

            $provas = ProvaQuestao::where('questao_id', $questao->id)->get();
            if (!empty($provas->first())){
                $request->session()->flash('warning',
                    "Questão id:  $id não pode ser excluída, há Prova vinculada.");
                return redirect()->route('questoes');
            }else{
                $respostas = Resposta::where('questao_id', $questao->id)->get();
                foreach ($respostas as $resp){
                    $resp->delete();
                }

                $questao->delete();
                $request->session()->flash('excluida',
                    "Questão id:  $id excluída com sucesso.");
                return redirect()->route('questoes');
            }
        }
        return response('Questão não encontrada', 404);
    }

    /**
     * @param $unidade
     * @param $auth
     * @param $tentativa
     * @return Prova
     */
    public function criarProva($unidade, $auth, int $tentativa)
    {
        $prova = new Prova();
        $prova->unidade_id = $unidade->id;
        $prova->user_id = $auth->id;
        $prova->tentativa = intval($tentativa)+1;
        $prova->save();

        $questoes_random = Questao::with('respostas')
            ->where('unidade_id', $unidade->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        foreach ($questoes_random as $questao) {
            $correta = Arr::first($questao->respostas->where('id', $questao->respCorreta_id));
            $incorretas = $questao->respostas()->whereNotIn('id', [$correta->id])->inRandomOrder()->limit(2)->get();
            $respostas_salvas = [
                0 => $incorretas[0],
                1 => $incorretas[1],
                2 => $correta
            ];
            shuffle($respostas_salvas);

            $prova_questao = new ProvaQuestao();
            $prova_questao->prova_id = $prova->id;
            $prova_questao->questao_id = $questao->id;
            if (isset($respostas_salvas[0])) $prova_questao->resposta_id_1 = $respostas_salvas[0]->id;
            if (isset($respostas_salvas[1])) $prova_questao->resposta_id_2 = $respostas_salvas[1]->id;
            if (isset($respostas_salvas[2])) $prova_questao->resposta_id_3 = $respostas_salvas[2]->id;
            if (isset($respostas_salvas[3])) $prova_questao->resposta_id_3 = $respostas_salvas[3]->id;
            if (isset($respostas_salvas[4])) $prova_questao->resposta_id_3 = $respostas_salvas[4]->id;
            $prova_questao->save();
        }
        return ($prova);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function concluirProva(Request $request)
    {
        $auth = Auth::user();
        $data = Carbon::now()->toDateTimeString();

        $quest_resp = ProvaQuestao::where('prova_id', $request->prova_id)->get();

        DB::beginTransaction();
        foreach ($quest_resp as $resp){
            $id = $resp->questao_id;
            $resp->alternativaMarcada = $request->input($id);
            $q = Questao::find($id);
            if ($q->respCorreta_id == $request->input($id)){
                $resp->notaQuestao = 10.00;
            }else {
                $resp->notaQuestao = 0.00;
            }
            $resp->save();
        }

        //soma $quest_resp->sum('notaQuestao');
        //contador $quest_resp->count();
        $notaAval = $quest_resp->avg('notaQuestao');

        $prova = Prova::find($request->prova_id);
        $prova->dataConclusao = $data;
        $prova->notaAval = $notaAval;
        $prova->save();

        $maior_nota = Prova::where([
            ['unidade_id', $prova->unidade_id],
            ['user_id', $auth->id],
        ])->max('notaAval');

        //pegando a matricula nessa unidade
        $matricula = UsuarioCursoUnidadeMaterialProva::where([
            ['unidade_id', $prova->unidade_id],
            ['user_id', $auth->id],
        ])->get();

        $matricula->first()->notaAval = $maior_nota;
        $matricula->first()->save();

        //verificando nota das unidades e concluindo o curso
        $unidade = Unidade::find($prova->unidade_id);
        $curso = Curso::find($unidade->curso_id);

        for($i = 0; $i < count($curso->unidades); $i++){
            $questoes_unid[$i] = $curso->unidades[$i]->questoes;
            $notaAval_unid[$i] = $curso->unidades[$i]->usuario->where('id', $auth->id)[0]->pivot->notaAval;

            if ( (count($questoes_unid[$i]) <= 0 ) or ( $notaAval_unid[$i] > 7) ){
                $aprovado[$i] = 1;
            }else{
                $aprovado[$i] = 0;
            }
        }

        if (count($aprovado) > 0){
            $aprovado_curso = intval(array_sum($aprovado) / count($aprovado));
            if ($aprovado_curso == 1){
                //concluir curso e atribuir nota
                for($i = 0; $i < count($questoes_unid); $i++){
                    if ((count($questoes_unid[$i]) > 0) && ($aprovado[$i] == 1)){
                        $nota_com_questoes[$i] = $notaAval_unid[$i];
                    }
                }
                $notaCurso = intval(array_sum($nota_com_questoes) / count($nota_com_questoes));
                $user_curso = UsuarioCursoUnidadeMaterialProva::where([
                    ['curso_id', $curso->id],
                    ['user_id', $auth->id],
                ])->get();
                $user_curso[0]->notaAval = $notaCurso;
                if ($user_curso[0]->dataConclusao == null){
                    $user_curso[0]->dataConclusao = $data;
                }
                $user_curso[0]->save();
            }
        }

        DB::commit();

        return Redirect::to('provas/' . $prova->unidade_id . '/lista');
    }

    public function listarProvas($id, Request $request)
    {
        $auth = Auth::user();
        $unidade = Unidade::find($id);

        $perguntas = Questao::where('unidade_id', $unidade->id)->get();

        if (empty($perguntas[0])){
            return Redirect::to('unidades/' . $unidade->id);
        }

        $provas = Prova::where('unidade_id', $unidade->id)->get();
        $curso = Curso::where('id', $unidade->curso_id)->get();

        $prova_iniciada = Prova::where([
            ['unidade_id', $unidade->id],
            ['user_id', $auth->id],
            ['dataConclusao', null],
        ])->get();

        $todosMateriais = UnidadeMaterial::where([
            ['unidade_id', $unidade->id],])
            ->get();

        if ($todosMateriais->first()){
            for($i = 0; $i < count($todosMateriais); $i++){
                $array[$i] = $todosMateriais[$i]->id;
            }
            $concluidos = UsuarioCursoUnidadeMaterialProva::
            whereIn('material_id', $array )
                ->where([
                    ['user_id', $auth->id],
                    ['dataConclusao', '<>', NULL],])
                ->get();

            if (count($concluidos) > 0){
                $status = intval(count($concluidos) / count($todosMateriais));
                if ($status >= 1){
                    $nao_concluidos = 0;
                }else{
                    $nao_concluidos = 1;
                }
            }

            return view('questoes.aluno.pre-questoes',
                compact('provas', 'unidade', 'curso', 'prova_iniciada', 'nao_concluidos'));

        }

        $nao_concluidos = 0;

        return view('questoes.aluno.pre-questoes',
            compact('provas', 'unidade', 'curso', 'prova_iniciada', 'nao_concluidos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revisarProvas($id)
    {
        $prova = Prova::find($id);

        if (isset($prova) ) {
            $unidade = Unidade::find($prova->unidade_id);
            $quest_resp = ProvaQuestao::where('prova_id', $prova->id)->get();
            $questoes = Questao::where('unidade_id', $prova->unidade_id)->get();
            $respostas = Resposta::all();
            return view('questoes.aluno.revisao',
                compact('quest_resp', 'unidade', 'questoes', 'respostas', 'prova'));
        }

        return Redirect::to('provas/' . $prova->unidade_id . '/lista');

    }


}

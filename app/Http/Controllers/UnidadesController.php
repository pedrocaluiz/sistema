<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Prova;
use App\Model\ProvaQuestao;
use App\Model\Questao;
use App\Model\Resposta;
use App\Model\TipoMaterial;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\Model\UsuarioCursoUnidadeMaterialProva;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UnidadesController extends Controller
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
        $this->authorize('view', Unidade::class);
        $cursos = Curso::all();
        $unidades = Unidade::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');

        return view('unidades.instrutor.unidades',
            compact('unidades', 'users',
                'adicionada', 'excluida', 'alterada',
                'cursos'
            ));
    }

    public function indexJson($curso)
    {
        $unidade = Unidade::where('curso_id', $curso)
            ->orderBy('ordem', 'asc')
            ->get();
        return json_encode($unidade);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Unidade::class);
        $unidades = Unidade::all();
        $cursos = Curso::all();
        return view('unidades.instrutor.create',
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
        $this->authorize('create', Unidade::class);
        $curso = Curso::find($request->input('curso_id'));
        DB::beginTransaction();

        $unidade = new Unidade();
        $unidade->titulo = $request->input('tituloUnidade');
        $unidade->ordem = $request->input('ordem');
        $unidade->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $unidade->curso_id = $curso->id;
            $curso->ativo = 0;
            $curso->save();
        $unidade->save();

        $request->session()->flash('adicionada',
            "Unidade $unidade->titulo inserida com sucesso.");
        DB::commit();

        return redirect()->route('unidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //para mostrar a unidade, tem que estar logado e inscrito no curso
        //se não estiver, redirecionar para a página do curso correspondente.
        $auth = Auth::user();
        $unidade = Unidade::find($id);
        $tipoMat = TipoMaterial::all();
        $data = Carbon::now()->toDateTimeString();
        $user_curso = UsuarioCursoUnidadeMaterialProva::where([
            ['curso_id', $unidade->curso_id],
            ['user_id', $auth->id],
        ])->get();

        if (isset($unidade)){
            $user = User::find($unidade->usuarioAtualizacao);
            $materiais = UnidadeMaterial::where('unidade_id', $unidade->id)
                ->orderBy('ordem', 'asc')
                ->paginate(1);

            $questoes = Questao::where('unidade_id', $unidade->id)->get();

            $user_unidade = UsuarioCursoUnidadeMaterialProva::where([
                ['unidade_id', $unidade->id],
                ['user_id', $auth->id],
            ])->get();

            //verificando se há materiais e se estão concluidos
            if (count($unidade->materiais) > 0) {
                for ($i = 0; $i < count($unidade->materiais); $i++) {
                    $array[$i] = $unidade->materiais[$i]->id;
                }
                $concluidos = UsuarioCursoUnidadeMaterialProva::
                    whereIn('material_id', $array)
                    ->where([
                        ['user_id', $auth->id],
                        ['dataConclusao', '<>', NULL],])
                    ->get();
            }

            //verificando todas as unidades
            $todasUnidades = Unidade::where([
                ['curso_id', $unidade->curso_id],
            ])->get();
            for($i = 0; $i < count($todasUnidades); $i++){
                $arrayUnidades[$i] = $todasUnidades[$i]->id;
            }


            //se não existir registro para esse UserUnidade, cria um registro
            if (!isset($user_unidade[0])){
                $tableUserUnidade = new UsuarioCursoUnidadeMaterialProva();
                $tableUserUnidade->user_id = $auth->id;
                $tableUserUnidade->unidade_id = $unidade->id;

                if (count($unidade->materiais) <= 0){
                    $tableUserUnidade->dataConclusao = $data;
                }elseif (count($concluidos) > 0){
                    $status = intval(count($concluidos) / count($unidade->materiais));
                    if ($status >= 1){
                        $tableUserUnidade->dataConclusao = $data;
                    }
                }
                $tableUserUnidade->save();

                $unidades_concluidas = UsuarioCursoUnidadeMaterialProva::
                whereIn('unidade_id', $arrayUnidades)
                    ->where([
                        ['user_id', $auth->id],
                        ['dataConclusao', '<>', NULL],])
                    ->get();

                if (count($todasUnidades) <= 0){
                    //se não houver unidades concluir o curso
                    $user_curso[0]->dataConclusao = $data;
                    $user_curso[0]->save();
                }elseif (count($unidades_concluidas) > 0){
                    $status = intval(count($unidades_concluidas) / count($todasUnidades));
                    if ($status >= 1){
                        //se todas as unidades estiverem concluidas concluir o curso
                        $user_curso[0]->dataConclusao = $data;
                        $user_curso[0]->save();
                    }
                }



            }else{ //se existir registro para esse UserUnidade, atualiza com data de conclusão
                if (count($unidade->materiais) <= 0){
                    $user_unidade[0]->dataConclusao = $data;
                }elseif (count($concluidos) > 0){
                    $status = intval(count($concluidos) / count($unidade->materiais));
                    if ($status >= 1){
                        $user_unidade[0]->dataConclusao = $data;
                    }
                }
                $user_unidade[0]->save();

                $unidades_concluidas = UsuarioCursoUnidadeMaterialProva::
                whereIn('unidade_id', $arrayUnidades)
                    ->where([
                        ['user_id', $auth->id],
                        ['dataConclusao', '<>', NULL],])
                    ->get();

                if (count($todasUnidades) <= 0){
                    //se não houver unidades concluir o curso
                    $user_curso[0]->dataConclusao = $data;
                    $user_curso[0]->save();
                }elseif (count($unidades_concluidas) > 0){
                    $status = intval(count($unidades_concluidas) / count($todasUnidades));
                    if ($status >= 1){
                        //se todas as unidades estiverem concluidas concluir o curso
                        $user_curso[0]->dataConclusao = $data;
                        $user_curso[0]->save();
                    }
                }

            }

            return view('unidades.aluno.unidade',
                compact('unidade', 'user', 'auth', 'materiais', 'tipoMat', 'questoes'));
        }else {
            return view('home');
        }
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
        $unidade = Unidade::find($id);
        $this->authorize('update', $unidade);
        $ordem = Unidade::select('ordem')
            ->where('curso_id', $unidade->curso_id)
            ->orderBy('ordem', 'asc')
            ->get();

        $cursos = Curso::all();
        $user = User::find($unidade->usuarioAtualizacao);
        return view('unidades.instrutor.edit',
            compact('unidade','user', 'cursos', 'ordem'));
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
        $curso = Curso::find($request->input('curso_id'));
        DB::beginTransaction();

        $unidade = Unidade::find($id);
        $this->authorize('update', $unidade);
        $unidade->titulo = $request->input('tituloUnidade');
        $unidade->ordem = $request->input('ordem');
        $unidade->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $unidade->curso_id = $curso->id;
            $curso->ativo = 0;
            $curso->save();
        $unidade->save();

        $request->session()->flash('alterada',
            "Unidade $unidade->titulo alterada com sucesso.");
        DB::commit();

        return redirect()->route('unidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request)
    {
        $unidade = Unidade::find($request->unidade_id);
        $titulo = $unidade->titulo;
        $this->authorize('delete', $unidade);

        if (isset($unidade)){

            $ucump = UsuarioCursoUnidadeMaterialProva::where('unidade_id', $unidade->id)->get();
            foreach ($ucump as $u){
                $u->delete();
            }

            $questoes = Questao::where('unidade_id', $unidade->id)->get();
            foreach ($questoes as $q){
                $q->unidade_id = null;
                $q->save();
            }

            $materiais = UnidadeMaterial::where('unidade_id', $unidade->id)->get();
            foreach ($materiais as $m){
                $m->unidade_id = null;
                $m->save();
            }

            $provas = Prova::where('unidade_id', $unidade->id)->get();
            foreach ($provas as $p){
                $p->unidade_id = null;
                $p->save();
            }

            $unidade->delete();
            $request->session()->flash('excluida',
                "Unidade $titulo excluída com sucesso.");
            return redirect('unidades');
        }
        return response('Unidade não encontrado', 404);
    }

    public function download($id)
    {
        $material = UnidadeMaterial::find($id);
        if (isset($material)){
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($material->urlArquivo);
            return response()->download($path);
        }
        return redirect()->back();
    }

}

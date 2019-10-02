<?php

namespace App\Http\Controllers;

use App\Model\Categoria;
use App\Model\Curso;
use App\Model\Prova;
use App\Model\TipoMaterial;
use App\Model\Unidade;
use App\Model\UsuarioCursoUnidadeMaterialProva;
use App\User;
use App\Model\UnidadeMaterial;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

class CursosController extends Controller
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
        $this->authorize('view', Curso::class);


        $categorias = Categoria::all();
        $cursos = Curso::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');

        return view('cursos.instrutor.cursos',
            compact('cursos', 'users', 'adicionada',
                'excluida', 'alterada', 'categorias'
            ));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function indexAdm(Request $request)
    {
        $this->authorize('administrador');
        $categorias = Categoria::all();
        $cursos = Curso::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');

        return view('administrador.cursos',
            compact('cursos', 'users', 'adicionada',
                'excluida', 'alterada', 'categorias'
            ));

    }

    public function enable($id, Request $request)
    {
        $this->authorize('administrador');
        $curso = Curso::find($id);

        if ($curso->ativo == 0){
            $curso->ativo = 1;
            $curso->save();
        }

        $request->session()->flash('adicionada',
            "Curso $curso->titulo publicado com sucesso.");

        return redirect()->route('cursos.index-adm');
    }

    public function disable($id, Request $request)
    {
        $this->authorize('administrador');
        $curso = Curso::find($id);

        if ($curso->ativo == 1){
            $curso->ativo = 0;
            $curso->save();
        }

        $request->session()->flash('excluida',
            "Curso $curso->titulo desativado com sucesso.");

        return redirect()->route('cursos.index-adm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $cats = Categoria::all();
        $tiposMat = TipoMaterial::all();

        $this->authorize('create', Curso::class);

        return view('cursos.instrutor.create',
            compact('cats', 'tiposMat'));

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
        $this->authorize('create', Curso::class);

        DB::beginTransaction();

        $curso = new Curso();
        $curso->categoria_id = $request->input('categoria_id');
        $curso->titulo = $request->input('tituloCurso');
        $curso->descricao = $request->input('descricaoCurso');
        $curso->icone = $request->input('icone');
        $curso->palavrasChave = $request->input('palavrasChave');
        $curso->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $curso->save();

        $unidades = $request->input('tituloUnidades');
        for ($i = 0; $i < count($unidades); ++$i) {
            $unidade = new Unidade();
            $unidade->titulo = $unidades[$i];
            $unidade->ordem = $request->ordem[$i];
            $unidade->usuarioAtualizacao = $curso->usuarioAtualizacao;
            $unidade->curso_id = $curso->id;
            $unidade->save();
        }

        $request->session()->flash('adicionada',
            "Curso $curso->titulo inserida com sucesso.");
        DB::commit();

        return redirect()->route('cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id, Request $request)
    {
        $curso = Curso::find($id);
        $auth = Auth::user();
        $data = Carbon::now()->toDateTimeString();


        if (isset($curso)){
            if ($auth->id == $curso->usuarioAtualizacao or count($auth->perfil->where('administrador', 1)) > 1){
                $matricula = UsuarioCursoUnidadeMaterialProva::where([
                    ['curso_id', $request->curso_id],
                    ['user_id', $auth->id],
                ])->get();
                if (!isset($matricula[0])) {
                    $user_curso = new UsuarioCursoUnidadeMaterialProva();
                    $user_curso->user_id = $auth->id;
                    $user_curso->curso_id = $curso->id;
                    $user_curso->save();
                }//se não existir registro para esse UserMaterial e ele for ADM ou o Instrutor do Curso, cria um registro
            }
            if (($curso->ativo == 1) or ($auth->id == $curso->usuarioAtualizacao)){
                $user = User::find($curso->usuarioAtualizacao);
                $cat = Categoria::find($curso->categoria_id);
                $user_curso = UsuarioCursoUnidadeMaterialProva::where([
                    ['curso_id', $curso->id],
                    ['user_id', $auth->id],
                ])->get();

                $unidades = $curso->unidades->sortBy('ordem');

                //verificando se há unidades e se estão concluidas
                if (count($unidades) > 0) {
                    for ($i = 0; $i < count($unidades); $i++) {
                        $array[$i] = $unidades[$i]->id;
                    }
                    $concluidas = UsuarioCursoUnidadeMaterialProva::
                    whereIn('unidade_id', $array)
                        ->where([
                            ['user_id', $auth->id],
                            ['dataConclusao', '<>', NULL],])
                        ->get();
                }

                if (!empty($user_curso[0])){
                    if (count($unidades) <= 0){
                        $user_curso[0]->dataConclusao = $data;
                    }elseif (count($concluidas) > 0){
                        $status = intval(count($concluidas) / count($unidades));
                        if ($status >= 1){
                            $user_curso[0]->dataConclusao = $data;
                        }
                    }
                    $user_curso[0]->save();
                }

                $adicionada = $request->session()->get('adicionada');
                $alterada = $request->session()->get('alterada');

                return view('cursos.aluno.curso',
                    compact('curso', 'user', 'cat', 'user_curso', 'unidades', 'adicionada', 'alterada'));
            }else{
                return redirect()->route('todos-cursos');
            }
        }else{
            return redirect()->route('todos-cursos');
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

        $cats = Categoria::all();
        $curso = Curso::find($id);
        $user = User::find($curso->usuarioAtualizacao);

        $this->authorize('update', $curso);

        /*if ( Gate::denies('instrutor', $curso)){
            abort(403, 'Sem autorização para acessar essa página');
        }*/

        return view('cursos.instrutor.edit',
            compact('curso','user', 'cats'));
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
        $curso = Curso::find($id);

        $this->authorize('update', $curso);

        $curso->categoria_id = $request->input('categoria_id');
        $curso->titulo = $request->input('tituloCurso');
        $curso->descricao = $request->input('descricaoCurso');
        $curso->icone = $request->input('icone');
        $curso->palavrasChave = $request->input('palavrasChave');
        $curso->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $curso->ativo = 0;
        $curso->save();

        $request->session()->flash('alterada',
            "Curso $curso->titulo alterado com sucesso.");
        DB::commit();

        $perfil = Auth::user()->perfil->where('administrador', 1);

        if (count($perfil) > 0 ){
            return redirect()->route('cursos.index-adm');
        }
        return redirect()->route('cursos');




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
        $curso = Curso::find($request->curso_id);
        $titulo = $curso->titulo;

        $this->authorize('delete', $curso);

        if (isset($curso)){
            $unidades = Unidade::where('curso_id', $curso->id)->get();
            foreach ($unidades as $unid){
                $unid->curso_id = null;
                $unid->save();
            }
            $ucump = UsuarioCursoUnidadeMaterialProva::where('curso_id', $curso->id)->get();
            foreach ($ucump as $u){
                $u->delete();
            }
            $curso->delete();
            $request->session()->flash('excluida',
                "Curso $titulo excluído com sucesso.");
            return redirect()->route('cursos');
        }
        return response('Curso não encontrado', 404);
    }

    public function inscrever(Request $request)
    {
        $auth = Auth::user();
        $matricula = UsuarioCursoUnidadeMaterialProva::where([
            ['curso_id', $request->curso_id],
            ['user_id', $auth->id],
        ])->get();

        //se não existir registro para esse UserMaterial, cria um registro
        if (!isset($matricula[0])){
            $user_curso = new UsuarioCursoUnidadeMaterialProva();
            $user_curso->user_id = $auth->id;
            $user_curso->curso_id = $request->curso_id;
            $user_curso->save();

            return json_encode($user_curso);
        }
        return json_encode($matricula);
    }

    public function meusCursos()
    {
        $auth = Auth::user();

        $cursos = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', '<>', null]
        ])->get();
        if ($cursos->first()){
            for($i = 0; $i < count($cursos); $i++){
                $array[$i] = $cursos[$i]->curso_id;
            }
            $cursos = Curso::whereIn('id', $array )->get();
        }

        $concluidos = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', '<>', null],
            ['dataConclusao', '<>', null],
        ])->get();
        if ($concluidos->first()){
            for($i = 0; $i < count($concluidos); $i++){
                $array_conc[$i] = $concluidos[$i]->curso_id;
            }
            $concluidos = Curso::whereIn('id', $array_conc )->get();
        }

        $andamento = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', '<>', null],
            ['dataConclusao', null],
        ])->get();

        if ($andamento->first()){
            for($i = 0; $i < count($andamento); $i++){
                $array_and[$i] = $andamento[$i]->curso_id;
            }
            $andamento = Curso::whereIn('id', $array_and )->where('ativo', 1)->get();
        }



        return view('cursos.aluno.meus-cursos',
            compact('cursos', 'concluidos', 'andamento'));

    }

    public function todosCursos()
    {
        //$cursos = Curso::where('ativo', 1)->get();
        //dd($cursos);
        $categorias = Categoria::all();
        return view('cursos.aluno.todos-cursos',
            compact( 'categorias'));
    }

    public function andamento()
    {
        $auth = Auth::user();
        $andamento = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', '<>', null],
            ['dataConclusao', null],
        ])->get();
        if ($andamento->first()){
            for($i = 0; $i < count($andamento); $i++){
                $array[$i] = $andamento[$i]->curso_id;
            }
            $andamento = Curso::whereIn('id', $array )->where('ativo', 1)->get();
        }
        return view('cursos.aluno.andamento-cursos',
            compact('andamento'));
    }

    public function concluidos()
    {
        //Cursos concluídos do usuario
        $auth = Auth::user();
        $concluidos = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', '<>', null],
            ['dataConclusao', '<>', null],
        ])->get();
        if ($concluidos->first()){
            for($i = 0; $i < count($concluidos); $i++){
                $array[$i] = $concluidos[$i]->curso_id;
            }
            $concluidos = Curso::whereIn('id', $array )->get();
        }
        return view('cursos.aluno.concluidos-cursos ',
            compact('concluidos'));
    }

    public function certificadoCurso($curso_id, Request $request)
    {
        $auth = Auth::user();
        $curso = Curso::find($curso_id);
        $instrutor = User::find($curso->usuarioAtualizacao);

        $user_curso = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', $curso->id],
            ['dataConclusao', '<>', null],
        ])->get();

        foreach ($curso->unidades as $unidade){
            $questoes = $unidade->questoes;
            if (count($questoes) > 0){
                $ha_questoes = 1;
                break;
            }else{
                $ha_questoes = 0;
            }
        }

        if ( isset($user_curso[0]) && ( ($user_curso[0]->notaAval > 7) or ($ha_questoes == 0) )  ) {
            $nomeArquivo = $auth->primeiroNome . $auth->ultimoNome;
            $data = ['auth' => $auth, 'curso' => $curso, 'instrutor' => $instrutor];
            $pdf = PDF::loadView('certificado', $data)->setPaper('a4', 'landscape');
            return $pdf->stream($nomeArquivo . '.pdf');
        }else{
            $request->session()->flash('alterada',
                "Você ainda não concluiu o Curso: $curso->titulo.");
            return Redirect::to('cursos/' . $curso->id);
        }
    }

    public function rating($curso_id)
    {
        $auth = Auth::user();
        $curso = Curso::find($curso_id);

        $user_curso = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', $curso->id],
        ])->get();

        return view('cursos.aluno.rating', compact('curso', 'user_curso'));
    }

    public function ratingSave(Request $request)
    {
        $auth = Auth::user();
        $curso = Curso::find($request->curso);
        $user_curso = UsuarioCursoUnidadeMaterialProva::where([
            ['user_id', $auth->id],
            ['curso_id', $curso->id],
        ])->get();

        if (isset($user_curso[0])){
            $user_curso[0]->rating = $request->rating;
            $user_curso[0]->comentario = $request->comentario;
            $user_curso[0]->save();
        }
        $request->session()->flash('adicionada',
            "Obrigado por avaliar o Curso $curso->titulo.");

        return Redirect::to('cursos/' . $curso->id);
    }

    public function ratings($curso_id)
    {
        $curso = Curso::find($curso_id);
        $users = User::all();
        $ratings = UsuarioCursoUnidadeMaterialProva::where([
            ['curso_id', $curso->id],
            ['rating', '<>', null],
        ])->get();

        return view('administrador.ratings', compact('curso', 'ratings', 'users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buscar(Request $request)
    {
        $users = User::all();

        if ($request->search != null){
            $cursos = Curso::where('titulo', 'LIKE', '%' . $request->search . '%')
                ->orWhere('palavrasChave', 'LIKE', '%' . $request->search . '%')
                ->get();
        }else{
            $cursos = Curso::all();
        }

        for ($i = 0; $i < count($cursos); $i++){
            $array[$i] = $cursos[$i]->categoria_id;
        }

        $categorias = Categoria::whereIn('id', $array)->get();

        return view('cursos.aluno.busca-cursos',
            compact('cursos', 'users', 'categorias'));

    }

}

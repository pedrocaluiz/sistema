<?php

namespace App\Http\Controllers;

use App\Model\Categoria;
use App\Model\Curso;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\Model\UsuarioCursoUnidadeMaterial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnidadesAlunoController extends Controller
{
    public function __construct()
    {
        $this->usuarioAuth =  Auth::user();
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        if (isset($unidade)){
            $user = User::find($unidade->usuarioAtualizacao);
            $materiais = UnidadeMaterial::where('unidade_id', $unidade->id)
                ->orderBy('ordem', 'asc')
                ->paginate(1);

            $user_unidade = UsuarioCursoUnidadeMaterial::where([
                ['unidade_id', $unidade->id],
                ['user_id', $auth->id],
            ])->get();

            //se não existir registro para esse UserUnidade, cria um registro
            if (!isset($user_unidade[0])){
                $tableUserUnidade = new UsuarioCursoUnidadeMaterial();
                $tableUserUnidade->user_id = $auth->id;
                $tableUserUnidade->unidade_id = $unidade->id;
                $tableUserUnidade->save();
            }
            return view('unidades.aluno.unidade',
                compact('unidade', 'user', 'auth', 'materiais'));
        }else {
            return view('home');
        }
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

<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Questao;
use App\Model\Resposta;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
     */
    public function create()
    {
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
        DB::beginTransaction();

        $unidade = new Unidade();
        $unidade->titulo = $request->input('tituloUnidade');
        $unidade->ordem = $request->input('ordem');
        $unidade->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $unidade->curso_id = $request->input('curso_id');
        $unidade->save();

        $request->session()->flash('adicionada',
            "Unidade $unidade->titulo inserida com sucesso.");
        DB::commit();

        return redirect()->route('unidades.instrutor');
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
        $unidade = Unidade::find($id);
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
        DB::beginTransaction();

        $unidade = Unidade::find($id);
        $unidade->titulo = $request->input('tituloUnidade');
        $unidade->ordem = $request->input('ordem');
        $unidade->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $unidade->curso_id = $request->input('curso_id');
        $unidade->save();

        $request->session()->flash('alterada',
            "Unidade $unidade->titulo alterada com sucesso.");
        DB::commit();

        return redirect()->route('unidades.instrutor');
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

    /*public function carregarOrdens($id){

        $ordem = Unidade::select('ordem')
            ->where('curso_id', $id)
            ->orderBy('ordem', 'asc')
            ->get();

        return json_encode($ordem);
    }*/
}

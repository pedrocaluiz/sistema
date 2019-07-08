<?php

namespace App\Http\Controllers;

use App\Model\Perfil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perfis = Perfil::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('perfis.perfis',
            compact('perfis', 'users', 'adicionada', 'excluida', 'alterada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfil = Perfil::create($request->all());
        $request->session()->flash('adicionada',
            "Perfil $perfil->descricao inserido com sucesso.");
        return redirect('/perfis');
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
        $perfil = Perfil::find($id);
        $user = User::find($perfil->usuarioAtualizacao);
        return view('perfis.edit',
            compact('perfil', 'user'));
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
            $perfil = Perfil::find($id);
            $perfil->descricao = $request->input('descricao');
            $perfil->administrador = $request->input('administrador');
            $perfil->ativo = $request->input('ativo');
            $perfil->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $perfil->save();

            $request->session()->flash('alterada',
                "Perfil $perfil->descricao alterado com sucesso.");
        DB::commit();

        return redirect('perfis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $perfil = Perfil::find($id);
        $descricao = $perfil->descricao;

        if (isset($perfil)){
            $perfil->delete();
            $request->session()->flash('excluida',
                "Perfil $descricao excluído com sucesso.");
            return redirect('perfis');
        }
        return response('Perfil não encontrado', 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Funcao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('administrador');

        $funcoes = Funcao::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('funcoes.funcoes',
            compact('funcoes', 'users', 'adicionada', 'excluida', 'alterada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('administrador');
        return view('funcoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('administrador');
        $funcao = Funcao::create($request->all());
        $request->session()->flash('adicionada',
            "Função $funcao->descricao inserida com sucesso.");
        return redirect('/funcoes');
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
        $this->authorize('administrador');
        $funcao = Funcao::find($id);
        $user = User::find($funcao->usuarioAtualizacao);
        return view('funcoes.edit',
            compact('funcao', 'user'));
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
        $this->authorize('administrador');
        DB::beginTransaction();
            $funcao = Funcao::find($id);
            $funcao->descricao = $request->input('descricao');
            $funcao->valorFuncao = $request->input('valorFuncao');
            $funcao->pisoSalarial = $request->input('pisoSalarial');
            $funcao->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $funcao->save();

            $request->session()->flash('alterada',
                "Função $funcao->descricao alterada com sucesso.");
        DB::commit();

        return redirect('funcoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request)
    {
        $this->authorize('administrador');

        $funcao = Funcao::find($request->funcao_id);
        $descricao = $funcao->descricao;

        if (isset($funcao)){
            $users = User::where('funcao_id', $funcao->id)->get();
            foreach ($users as $user){
                $user->funcao_id = null;
                $user->save();
            }

            $funcao->delete();
            $request->session()->flash('excluida',
                "Função $descricao excluída com sucesso.");
            return redirect('funcoes');
        }
        return response('Função não encontrada', 404);
    }
}

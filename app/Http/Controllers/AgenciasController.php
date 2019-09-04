<?php

namespace App\Http\Controllers;

use App\Model\Agencia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AgenciasController extends Controller
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
        $agencias = Agencia::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('agencias.agencias',
            compact('agencias', 'users', 'adicionada', 'excluida', 'alterada'));
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
        return view('agencias.create');
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

        $agencia = Agencia::create($request->all());
        $request->session()->flash('adicionada',
            "Agência $agencia->descricao inserida com sucesso.");
        return redirect('/agencias');
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
        $agencia = Agencia::find($id);
        $user = User::find($agencia->usuarioAtualizacao);
        return view('agencias.edit',
            compact('agencia','user'));
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

            $agencia = Agencia::find($id);
            $agencia->codigoUnidade = $request->input('codigoUnidade');
            $agencia->descricao = $request->input('descricao');
            $agencia->SR = $request->input('SR');
            $agencia->DIRE = $request->input('DIRE');
            $agencia->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $agencia->save();

        $request->session()->flash('alterada',
            "Agência $agencia->descricao alterada com sucesso.");
        DB::commit();

        return redirect('agencias');
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
        $agencia = Agencia::find($request->agencia_id);
        $descricao = $agencia->descricao;

        if (isset($agencia)){
            $agencia->delete();
            $request->session()->flash('excluida',
                "Agência $descricao excluída com sucesso.");
        }
        return redirect('agencias');
    }
}

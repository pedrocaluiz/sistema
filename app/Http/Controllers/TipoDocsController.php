<?php

namespace App\Http\Controllers;

use App\Model\TipoDocumento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposDoc = TipoDocumento::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('tipodoc.tipodoc',
            compact('tiposDoc', 'users', 'adicionada', 'excluida', 'alterada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipodoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tp = TipoDocumento::create($request->all());
        $request->session()->flash('adicionada',
            "Tipo $tp->descricao inserido com sucesso.");
        return redirect('tipodoc');
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
        $tp = TipoDocumento::find($id);
        $user = User::find($tp->usuarioAtualizacao);
        return view('tipodoc.edit',
            compact('tp', 'user'));
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
            $tp = TipoDocumento::find($id);
            $tp->descricao = $request->input('descricao');
            $tp->siglaDocumento = $request->input('siglaDocumento');
            $tp->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $tp->save();

            $request->session()->flash('alterada',
                "Tipo $tp->descricao alterado com sucesso.");
        DB::commit();

        return redirect('tipodoc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $tp = TipoDocumento::find($id);
        $descricao = $tp->descricao;

        if (isset($tp)){
            $tp->delete();
            $request->session()->flash('excluida',
                "Tipo $descricao excluído com sucesso.");
            return redirect('tipodoc');
        }
        return response('Tipo não encontrado', 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\TipoMaterial;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class TipoMateriaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposMat = TipoMaterial::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('tipomat.tipomat',
            compact('tiposMat', 'users', 'adicionada', 'excluida', 'alterada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipomat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tp = TipoMaterial::create($request->all());
        $request->session()->flash('adicionada',
            "Tipo $tp->descricao inserido com sucesso.");
        return redirect('tipomat');
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
        $tp = TipoMaterial::find($id);
        $user = User::find($tp->usuarioAtualizacao);
        return view('tipomat.edit',
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
            $tp = TipoMaterial::find($id);
            $tp->descricao = $request->input('descricao');
            $tp->icone = $request->input('icone');
            $tp->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $tp->save();

            $request->session()->flash('alterada',
                "Tipo $tp->descricao alterado com sucesso.");
        DB::commit();

        return redirect('tipomat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $tp = TipoMaterial::find($id);
        $descricao = $tp->descricao;

        if (isset($tp)){
            $tp->delete();
            $request->session()->flash('excluida',
                "Tipo $descricao excluído com sucesso.");
            return redirect('tipomat');
        }
        return response('Tipo não encontrado', 404);
    }
}

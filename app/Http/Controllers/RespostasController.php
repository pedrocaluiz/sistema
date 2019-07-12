<?php

namespace App\Http\Controllers;

use App\Model\Resposta;
use Illuminate\Http\Request;

class RespostasController extends Controller
{
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
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id, Request $request)
    {
        $resposta = Resposta::find($id);
        $resp = $resposta->id;

        $this->authorize('delete', $resposta);

        if (isset($resposta)){
            $resposta->delete();
            $request->session()->flash('excluida',
                "Resposta Incorreta $resp excluída com sucesso.");
            return redirect()->route('respostas');
        }
        return response('Resposta não encontrada', 404);
    }

    /**
     * @param $id
     * @return bool|false|string
     */
    public function destroyAjax($id)
    {
        $resposta = Resposta::find($id);
        $resp = $resposta->id;

        //$this->authorize('delete', $curso);

        if (isset($resposta)){
            $resposta->delete();
            return json_encode($resp);
        }

        return error_log('Curso não encontrado');
    }


}

<?php

namespace App\Http\Controllers;

use App\Model\Cargo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargosController extends Controller
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
        $cargos = Cargo::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('cargos.cargos',
            compact('cargos', 'users', 'adicionada', 'excluida', 'alterada'));
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
        return view('cargos.create');
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

        $cargo = Cargo::create($request->all());
        $request->session()->flash('adicionada',
            "Cargo $cargo->descricao inserido com sucesso.");
        return redirect('/cargos');
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
        $cargo = Cargo::find($id);
        $user = User::find($cargo->usuarioAtualizacao);
        return view('cargos.edit',
            compact('cargo', 'user'));
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

            $cargo = Cargo::find($id);
            $cargo->descricao = $request->input('descricao');
            $cargo->salarioBase = $request->input('salarioBase');
            $cargo->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $cargo->save();

            $request->session()->flash('alterada',
                "Cargo $cargo->descricao alterado com sucesso.");
        DB::commit();

        return redirect('cargos');
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
        $cargo = Cargo::find($request->cargo_id);
        $descricao = $cargo->descricao;

        if (isset($cargo)){

            $users = User::where('cargo_id', $cargo->id)->get();
            foreach ($users as $user){
                $user->cargo_id = null;
                $user->save();
            }

            $cargo->delete();
            $request->session()->flash('excluida',
                "Cargo $descricao excluída com sucesso.");
            return redirect('cargos');
        }
        return response('Cargo não encontrado', 404);
    }
}

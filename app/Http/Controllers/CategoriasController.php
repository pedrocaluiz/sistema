<?php

namespace App\Http\Controllers;

use App\Model\Categoria;
use App\Model\Curso;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cats = Categoria::all();
        $users = User::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('categorias.categorias',
          compact('cats', 'users', 'adicionada', 'excluida', 'alterada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cat = Categoria::create($request->all());
      $request->session()->flash('adicionada',
        "Categoria $cat->descricao inserida com sucesso.");
      return redirect('/categorias');
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
      $cat = Categoria::find($id);
      $user = User::find($cat->usuarioAtualizacao);
      return view('categorias.edit',
          compact('cat', 'user'));
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
          $cat = Categoria::find($id);
          $cat->descricao = $request->input('descricao');
          $cat->icone = $request->input('icone');
          $cat->usuarioAtualizacao = $request->input('usuarioAtualizacao');
          $cat->save();

          $request->session()->flash('alterada',
            "Categoria $cat->descricao alterada com sucesso.");
      DB::commit();

      return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $cat = Categoria::find($request->categoria_id);
      $descricao = $cat->descricao;

      //$this->authorize('delete', $cat);

      if (isset($cat)){

        $cursos = Curso::where('categoria_id', $cat->id)->get();
        foreach ($cursos as $curso){
            $curso->categoria_id = null;
            $curso->save();
        }

        $cat->delete();
        $request->session()->flash('excluida',
          "Categoria $descricao excluída com sucesso.");
        return redirect('categorias');
      }
        return response('Categoria não encontrada', 404);

    }



}

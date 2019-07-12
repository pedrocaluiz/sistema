<?php

namespace App\Http\Controllers;

use App\Model\Agencia;
use App\Model\Cargo;
use App\Model\Categoria;
use App\Model\Curso;
use App\Model\Funcao;
use App\Model\Perfil;
use App\Model\Questao;
use App\Model\TipoDocumento;
use App\Model\TipoMaterial;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $agencias = Agencia::all();
        $cargos = Cargo::all();
        $categorias = Categoria::all();
        $funcoes = Funcao::all();
        $perfis = Perfil::all();
        $tipoDoc = TipoDocumento::all();
        $tipoMat = TipoMaterial::all();
        $cursos = Curso::all();
        $materiais = UnidadeMaterial::all();
        $unidades = Unidade::all();
        $questoes = Questao::all();
        return view('home',
            compact('users', 'agencias', 'cargos', 'categorias',
                'funcoes', 'perfis', 'tipoDoc' ,'tipoMat',
                'cursos', 'materiais', 'unidades', 'questoes'
            ));
    }
}

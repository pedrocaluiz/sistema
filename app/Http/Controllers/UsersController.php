<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Funcao;
use App\Model\UsuarioCursoUnidadeMaterialProva;
use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $funcoes = Funcao::all();
        return view('administrador.usuarios', compact('users', 'funcoes'));
    }

    public function relatorioUser($user_id)
    {
        $users = User::find($user_id);
        $cursos = $users->cursos;

            //$users->cursos[3]->unidades[2]->materiais;

        return view('administrador.relatorio-user', compact('users', 'cursos'));
    }

    public function relatorioCurso($user_id, $curso_id)
    {
        $users = User::find($user_id);
        $curso = Curso::find($curso_id);
        return view('administrador.usuarios', compact('users', 'curso'));
    }
}

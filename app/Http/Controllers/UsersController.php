<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\Funcao;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
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
        $user = User::find($user_id);
        $cursos = $user->cursos;


        if (count($cursos) > 0){ // se existe curso para esse usuario
            foreach ($cursos as $curso){
                $progresso = [];
                $notaUnidade = [];
                if (count($curso->unidades) > 0){ // se existe unidade nesse curso
                    foreach ($curso->unidades as $unidade){
                        $todosMateriais = $unidade->materiais;
                        if (count($todosMateriais) > 0){ // se existe materiais para essa unidade
                            for ($j = 0; $j < count($todosMateriais); $j++) {
                                $array[$j] = $todosMateriais[$j]->id;
                                /*
                                 * 0 => id 12
                                 * 1 => id 33
                                 * */
                            }
                            $concluidos = "";
                            $concluidos = UsuarioCursoUnidadeMaterialProva::
                            whereIn('material_id', $array)
                                ->where([
                                    ['user_id', $user_id],
                                    ['dataConclusao', '<>', NULL],])
                                ->get();
                        }
                        if ((count($todosMateriais) > 0) && (isset($concluidos))){
                            $soma = floor(count($concluidos) / count($todosMateriais) * 100);
                            $progresso[$unidade->id] = $soma;
                        }elseif ((count($todosMateriais) > 0) && (empty($concluidos))){
                            $soma = 0;
                            $progresso[$unidade->id] = $soma;
                        }elseif (empty($unidade->usuario->where('id', $user_id)[0])) {
                            $soma = 0;
                            $progresso[$unidade->id] = $soma;
                        }else{
                            $soma = 100;
                            $progresso[$unidade->id] = $soma;
                        }

                        if (!empty($unidade->usuario->where('id', $user_id)[0])){
                            $nota = $unidade->usuario->where('id', $user_id)->first()->pivot->notaAval;
                            if ($nota > 7) { $notaUnidade[$unidade->id] = 1; }else {$notaUnidade[$unidade->id] = 0;}
                        }

                        //dd($cursos[3]->unidades[2]->usuario->where('id', $user_id)->first()->pivot->notaAval);

                    }
                }
                if (count($progresso) > 0){
                    $progressoCurso[$curso->id] =  number_format(array_sum($progresso) / count($progresso), 2, ".", "") ;
                }else {
                    $progressoCurso[$curso->id] = 0.00;
                }
            }

            return view('administrador.relatorio-user',
                compact('user', 'cursos', 'progressoCurso'));
        }

        return view('administrador.relatorio-user',
            compact('user', 'cursos'));
    }

    public function relatorioCurso($user_id, $curso_id)
    {
        $user = User::find($user_id);
        $curso = Curso::find($curso_id);

        if (count($curso->unidades) > 0){
            foreach ($curso->unidades as $unidade){
                $soma = [];
                $todosMateriais = $unidade->materiais;
                if (count($todosMateriais) > 0){
                    for ($j = 0; $j < count($todosMateriais); $j++) {
                        $array[$j] = $todosMateriais[$j]->id;
                    }
                    $concluidos = "";
                    $concluidos = UsuarioCursoUnidadeMaterialProva::
                    whereIn('material_id', $array)
                        ->where([
                            ['user_id', $user_id],
                            ['dataConclusao', '<>', NULL],])
                        ->get();
                }
                    if ((count($todosMateriais) > 0) && (isset($concluidos))){
                        $soma = floor(count($concluidos) / count($todosMateriais) * 100);
                        $progresso[$unidade->id] = $soma;
                    }elseif ((count($todosMateriais) > 0) && (empty($concluidos))){
                        $soma = 0;
                        $progresso[$unidade->id] = $soma;
                    }else{
                        $soma = 100;
                        $progresso[$unidade->id] = $soma;
                    }

            }
            return view('administrador.relatorio-curso',
                compact('user', 'curso', 'progresso'));
        }

        return view('administrador.relatorio-curso',
            compact('user', 'curso'));
    }




}

<?php

namespace App\Http\Controllers;

use App\Model\Agencia;
use App\Model\Cargo;
use App\Model\Curso;
use App\Model\Documento;
use App\Model\Estado;
use App\Model\Funcao;
use App\Model\Municipio;
use App\Model\Perfil;
use App\Model\PerfilUsuario;
use App\Model\TipoDocumento;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\Model\UsuarioCursoUnidadeMaterialProva;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $funcoes = Funcao::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('administrador.usuarios',
            compact('users', 'funcoes', 'adicionada',
            'excluida', 'alterada'));
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

    public function instrutor($id, Request $request)
    {
        $user = User::find($id);
        $perfil = $user->perfil->where('descricao', 'Instrutor')->first();

        if (empty($perfil)){
            $perfil = new PerfilUsuario();
            $perfil->perfil_id = 2;
            $perfil->user_id = $user->id;
            $perfil->save();
        }
        $request->session()->flash('adicionada',
            "Usuário $user->primeiroNome $user->ultimoNome tornou-se um Instrutor.");

        return redirect()->route('usuarios');
    }

    public function aluno($id, Request $request)
    {
        $user = User::find($id);
        $perfil = $user->perfil->where('descricao', 'Instrutor')->first();

        if (isset($perfil)){
            $user->perfil()->detach($perfil->id);
        }
        $request->session()->flash('excluida',
            "Usuário $user->primeiroNome $user->ultimoNome não é mais um Instrutor.");

        return redirect()->route('usuarios');
    }

    public function relatorioUserPdf($user_id)
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
            }

            if ( isset($user) and isset($cursos) and isset($progressoCurso) ) {
                $nomeArquivo = $user->primeiroNome . $user->ultimoNome;
                $data = ['user' => $user, 'cursos' => $cursos, 'progressoCurso' => $progressoCurso];
                $pdf = PDF::loadView('administrador.relatorio-user-pdf', $data)->setPaper('a4', 'landscape');
                return $pdf->stream($nomeArquivo . '.pdf');
            }else{
                return redirect()->back();
            }
            //return view('administrador.relatorio-user-pdf', compact('user', 'cursos', 'progressoCurso'));

    }

    public function destroy(Request $request)
    {
        $user = User::find($request->user_id);
        $nome = $user->primeiroNome . ' ' . $user->ultimoNome;

        if (isset($user)){

            $documentos = Documento::where('user_id', $user->id)->get();
            foreach ($documentos as $doc){
                $doc->delete();
            }

            $ucump = UsuarioCursoUnidadeMaterialProva::where('user_id', $user->id)->get();
            foreach ($ucump as $u){
                $u->delete();
            }

            $user->delete();
            $request->session()->flash('excluida',
                "Usuário $nome excluído com sucesso.");
        }
        return redirect()->back();
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
        $cargos = Cargo::all();
        $agencias = Agencia::all();
        $funcoes = Funcao::all();
        $municipios = Municipio::all();
        $estados = Estado::all();
        $perfis = Perfil::all();
        $tiposDoc = TipoDocumento::all();
        $user = User::find($id);
        $municipio = Municipio::find($user->municipio_id);
        $estado = Estado::find($municipio->estado_id);

        $this->authorize('update', $user);

        return view('aluno.profile-edit', compact(
            'cargos', 'agencias', 'funcoes', 'municipios', 'municipio',
            'estados', 'estado', 'perfis', 'tiposDoc', 'user'));

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
        $usuario = User::find($id);
        
		$usuario->primeiroNome = $request->input('primeiroNome');
		$usuario->ultimoNome = $request->input('ultimoNome');
		if ($request->input('password') != null){
			$usuario->password = Hash::make($request->input('ultimoNome'));
		}
		if ($request->input('foto') != null){
			$path = $request->input('foto')->store('imagens', 'public');
			$usuario->foto = $path;
		}
		$usuario->cargo_id = $request->input('cargo_id');
		$usuario->funcao_id = $request->input('funcao_id');
		$usuario->agencia_id = $request->input('agencia_id');
		$usuario->matricula = $request->input('matricula');
		if ($request->input('dataNascimento') != null){
			$usuario->dataNascimento = $request->input('dataNascimento');
		}
		if ($request->input('dataAdmissao') != null){
			$usuario->dataAdmissao = $request->input('dataAdmissao');
		}
		$usuario->endereco = $request->input('endereco');
		$usuario->numero = $request->input('numero');
		$usuario->complemento = $request->input('complemento');
		$usuario->CEP = $request->input('CEP');
		$usuario->municipio_id = $request->input('municipio_id');
		$usuario->telefone = $request->input('telefone');
		$usuario->celular = $request->input('celular');
		$usuario->save();

        $request->session()->flash('alterada',
            "Dados alterados com sucesso.");
        DB::commit();

        return redirect()->route('meu-perfil');
    }

}

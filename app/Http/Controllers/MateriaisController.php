<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use App\Model\TipoMaterial;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\Model\UsuarioCursoUnidadeMaterialProva;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MateriaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view', UnidadeMaterial::class);
        $materiais = UnidadeMaterial::all();
        $unidades = Unidade::all();
        $users = User::all();
        $tipo_mat = TipoMaterial::all();
        $adicionada = $request->session()->get('adicionada');
        $excluida = $request->session()->get('excluida');
        $alterada = $request->session()->get('alterada');
        return view('materiais.instrutor.materiais',
            compact('materiais', 'users',
                'adicionada', 'excluida', 'alterada',
                'unidades', 'tipo_mat'
            ));
    }

    public function indexJson($unidade)
    {
        $material = UnidadeMaterial::where('unidade_id', $unidade)
            ->orderBy('ordem', 'asc')
            ->get();
        return json_encode($material);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', UnidadeMaterial::class);
        $unidades = Unidade::all();
        $cursos = Curso::all();
        $tiposMat = TipoMaterial::all();

        return view('materiais.instrutor.create',
            compact('unidades', 'cursos', 'tiposMat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $this->authorize('update', UnidadeMaterial::class);
        $unidade = Unidade::find($request->unidade_id);

        DB::beginTransaction();
        //Arrays
        $materiais = $request->input('tipoMat_id');
        $files = $request->pathMaterial;
        $arrayFiles = 0;

        for ($i = 0; $i < count($materiais); ++$i) {
            $material = new UnidadeMaterial();
            $material->unidade_id = $unidade->id;
            $material->material_id = $materiais[$i];
            $material->descricao = $request->descricaoMaterial[$i];
            $material->storage = $request->storage[$i];
            $material->ordem = $request->ordem[$i];

                if ($request->urlMaterial[$i] != null) {
                    $material->urlArquivo = $request->urlMaterial[$i];
                } else if ($request->storage[$i] == 1) {
                    $pathMat = $files[$arrayFiles]->store('material', 'public');
                    $material->urlArquivo = $pathMat;
                    $arrayFiles++;
                }

            $material->usuarioAtualizacao = $request->input('usuarioAtualizacao');
            $material->save();
        }

        /*$ucump = UsuarioCursoUnidadeMaterialProva::where([
            ['unidade_id', $unidade->id],
            ['user_id', $auth->id],
        ])->get();
        $ucump[0]->dataConclusao = null;
        $ucump[0]->save();*/

        $request->session()->flash('adicionada',
            "Material(is) inserido(s) com sucesso.");
        DB::commit();

        return redirect()->route('materiais');
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
        $material = UnidadeMaterial::find($id);
        $this->authorize('update', $material);
        $ordem = UnidadeMaterial::select('ordem')
            ->where('unidade_id', $material->unidade_id)
            ->orderBy('ordem', 'asc')
            ->get();

        $unidades = Unidade::all();
        $tiposMat = TipoMaterial::all();
        $user = User::find($material->usuarioAtualizacao);
        return view('materiais.instrutor.edit',
            compact('material','user', 'unidades', 'ordem', 'tiposMat'));
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
        $material = UnidadeMaterial::find($id);

        $this->authorize('update', $material);

        $material->unidade_id = $request->input('unidade_id');
        $material->descricao = $request->input('descricaoMaterial');
        $material->material_id = $request->input('tipoMat_id');
        $material->storage = $request->input('storage');

        if ($request->urlMaterial != null) {
            $material->urlArquivo = $request->urlMaterial;
        } else if ($request->storage == 1) {
            $pathMat = $request->pathMaterial->store('material', 'public');
            $material->urlArquivo = $pathMat;
        }

        $material->usuarioAtualizacao = $request->input('usuarioAtualizacao');
        $material->save();

        $request->session()->flash('alterada',
            "Material $material->descricao alterado com sucesso.");
        DB::commit();

        return redirect()->route('materiais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request)
    {
        $material = UnidadeMaterial::find($request->material_id);
        $this->authorize('delete', $material);
        $descricao = $material->descricao;

        if (isset($material)){

            $ucump = UsuarioCursoUnidadeMaterialProva::where('material_id', $material->id)->get();
            foreach ($ucump as $u){
                $u->delete();
            }

            $arquivo = $material->urlArquivo;
            Storage::disk('public')->delete($arquivo);
            $material->delete();
            $request->session()->flash('excluida',
                "Material $descricao excluído com sucesso.");
            return redirect()->route('materiais');
        }
        return response('Material não encontrado', 404);
    }

    public function inscrever(Request $request)
    {
        $auth = Auth::user();
        $user_mats = UsuarioCursoUnidadeMaterialProva::where([
            ['material_id', $request->material_id],
            ['user_id', $auth->id],
        ])->get();

        //se não existir registro para esse UserMaterial, cria um registro
        if (!isset($user_mats[0])){
            $user_mat = new UsuarioCursoUnidadeMaterialProva();
            $user_mat->user_id = $auth->id;
            $user_mat->material_id = $request->material_id;
            $user_mat->save();

            return json_encode($user_mat);
        }

        return json_encode($user_mats[0]);
    }

    public function concluir(Request $request)
    {
        $auth = Auth::user();
        $data = Carbon::now()->toDateTimeString();
        $unidade = Unidade::find($request->unidade_id);
        $user_mats = UsuarioCursoUnidadeMaterialProva::where([
            ['material_id', $request->material_id],
            ['user_id', $auth->id],
        ])->get();
        $user_unidade = UsuarioCursoUnidadeMaterialProva::where([
            ['unidade_id', $request->unidade_id],
            ['user_id', $auth->id],
        ])->get();
        $user_curso = UsuarioCursoUnidadeMaterialProva::where([
            ['curso_id', $unidade->curso_id],
            ['user_id', $auth->id],
        ])->get();

        if (isset($user_mats[0])){ // se existir registro para o material, conclui
            $user_mats[0]->dataConclusao = $request->dataConclusao;
            $user_mats[0]->save();
        }else { // se não existir registro para o material, cria a conclui
            $user_mat = new UsuarioCursoUnidadeMaterialProva();
            $user_mat->user_id = $auth->id;
            $user_mat->material_id = $request->material_id;
            $user_mat->dataConclusao = $request->dataConclusao;
            $user_mat->save();
        }

        $todosMateriais = UnidadeMaterial::where([
            ['unidade_id', $request->unidade_id],
            ])->get();
        for($i = 0; $i < count($todosMateriais); $i++){
            $array[$i] = $todosMateriais[$i]->id;
        }
        $concluidos = UsuarioCursoUnidadeMaterialProva::
            whereIn('material_id', $array)
            ->where([
                ['user_id', $auth->id],
                ['dataConclusao', '<>', NULL],])
            ->get();

        $todasUnidades = Unidade::where([
            ['curso_id', $unidade->curso_id],
        ])->get();
        for($i = 0; $i < count($todasUnidades); $i++){
            $arrayUnidades[$i] = $todasUnidades[$i]->id;
        }

        if (count($todosMateriais) <= 0){ // se não existir nenhum material conclui a unidade
            //concluir a unidade
            $user_unidade[0]->dataConclusao = $data;
            $user_unidade[0]->save();

            $unidades_concluidas = UsuarioCursoUnidadeMaterialProva::
            whereIn('unidade_id', $arrayUnidades)
                ->where([
                    ['user_id', $auth->id],
                    ['dataConclusao', '<>', NULL],])
                ->get();

            if (count($todasUnidades) <= 0){
                //se não houver unidades concluir o curso
                $user_curso[0]->dataConclusao = $data;
                $user_curso[0]->save();
            }elseif (count($unidades_concluidas) > 0){
                $status = intval(count($unidades_concluidas) / count($todasUnidades));
                if ($status >= 1){
                    //se todas as unidades estiverem concluidas concluir o curso
                    $user_curso[0]->dataConclusao = $data;
                    $user_curso[0]->save();
                }
            }

        }elseif (count($concluidos) > 0){
            // se existirem materiais concluídos, faz a conta e conclui a unidade e curso
            $status = intval(count($concluidos) / count($todosMateriais));
            if ($status >= 1){
                $user_unidade[0]->dataConclusao = $data;
                $user_unidade[0]->save();

                $unidades_concluidas = UsuarioCursoUnidadeMaterialProva::
                whereIn('unidade_id', $arrayUnidades)
                    ->where([
                        ['user_id', $auth->id],
                        ['dataConclusao', '<>', NULL],])
                    ->get();

                if (count($todasUnidades) <= 0){
                    //se não houver unidades concluir o curso
                    $user_curso[0]->dataConclusao = $data;
                    $user_curso[0]->save();
                }elseif (count($unidades_concluidas) > 0){
                    $status = intval(count($unidades_concluidas) / count($todasUnidades));
                    if ($status >= 1){
                        //se todas as unidades estiverem concluidas concluir o curso
                        $user_curso[0]->dataConclusao = $data;
                        $user_curso[0]->save();
                    }
                }
            }
        }

        return json_encode($todosMateriais);
    }
}

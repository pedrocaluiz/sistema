<?php

namespace App\Http\Controllers\Auth;

use App\Model\Agencia;
use App\Model\Cargo;
use App\Model\Estado;
use App\Model\Funcao;
use App\Model\Municipio;
use App\Model\Perfil;
use App\Model\PerfilUsuario;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth\Traits\RedirectsUsersTrait;
use Illuminate\Support\Facades\Storage;
use function Psy\debug;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/meus-cursos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'primeiroNome' => ['required', 'string', 'min:3', 'max:60'],
            'ultimoNome' => ['required', 'string', 'min:3', 'max:60'],
            'email' => ['required', 'string', 'email', 'min:8', 'max:80', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:60', 'confirmed'],
        ]);

    }

    public function showRegistrationForm()
    {
        $cargos = Cargo::all();
        $agencias = Agencia::all();
        $funcoes = Funcao::all();
        $municipios = Municipio::all();
        $estados = Estado::all();
        $perfis = Perfil::all();
        return view('auth.register', compact(
            'cargos', 'agencias', 'funcoes', 'municipios', 'estados', 'perfis'));
    }


       /**
     * Create a new user instance after a valid registration.
     *
     * @param array  $data
     * @return User
     */

    protected function create(array $data)
    {
        $usuario = new User();
        $usuario->primeiroNome = $data['primeiroNome'];
        $usuario->ultimoNome = $data['ultimoNome'];
        $usuario->email = $data['email'];
        $usuario->password = Hash::make($data['password']);
        if (isset($data['foto'])){
            $path = $data['foto']->store('imagens', 'public');
            $usuario->foto = $path;
        }
        $usuario->cargo_id = $data['cargo_id'];
        $usuario->funcao_id = $data['funcao_id'];
        $usuario->agencia_id = $data['agencia_id'];
        $usuario->dataNascimento = $data['dataNascimento'];
        $usuario->matricula = $data['matricula'];
        $usuario->dataAdmissao = $data['dataAdmissao'];
        $usuario->endereco = $data['endereco'];
        $usuario->numero = $data['numero'];
        $usuario->complemento = $data['complemento'];
        $usuario->bairro = $data['bairro'];
        $usuario->CEP = $data['CEP'];
        $usuario->municipio_id = $data['municipio_id'];
        $usuario->telefone = $data['telefone'];
        $usuario->celular = $data['celular'];
        $usuario->ativo = 1;
        $usuario->save();

        $perfil = new PerfilUsuario();
        $perfil->perfil_id = 3;
        $perfil->user_id = $usuario->id;
        $perfil->save();

        return $usuario;
    }
}

<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Model\Agencia;
use App\Model\Cargo;
use App\Model\Categoria;
use App\Model\Curso;
use App\Model\Funcao;
use App\Model\Questao;
use App\Model\Unidade;
use App\Model\UnidadeMaterial;
use App\Policies\AgenciasPolicy;
use App\Policies\CargosPolicy;
use App\Policies\CategoriasPolicy;
use App\Policies\CursosPolicy;
use App\Policies\FuncoesPolicy;
use App\Policies\HomePolicy;
use App\Policies\MateriaisPolicy;
use App\Policies\QuestoesPolicy;
use App\Policies\UnidadePolicy;
use App\Policies\UsersPolicy;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        HomeController::class => HomePolicy::class,
        Agencia::class => AgenciasPolicy::class,
        Cargo::class => CargosPolicy::class,
        Funcao::class => FuncoesPolicy::class,
        Categoria::class => CategoriasPolicy::class,
        User::class => UsersPolicy::class,
        Curso::class => CursosPolicy::class,
        Unidade::class => UnidadePolicy::class,
        UnidadeMaterial::class => MateriaisPolicy::class,
        Questao::class => QuestoesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param GateContract $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->before(function (User $user) {
            foreach ($user->perfil as $perfil){
                if ($perfil->administrador){
                    return true;
                }
            }
        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Funcao;
use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $funcoes = Funcao::all();
        return view('usuarios', compact('users', 'funcoes'));
    }
}

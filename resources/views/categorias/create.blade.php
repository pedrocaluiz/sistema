@extends('layouts.base', ["menu" => "cadastrar", "current" => "categorias"])

@section('header')
  @lang('messages.categories')
@endsection

@section('title')
  <a href="{{route('categorias')}}"> @lang('messages.categories')</a>
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <form method="POST" action="{{route('categorias.store')}}" class="cadastro">
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.create')
              @lang('messages.category')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" required minlength="3" maxlength="40">
                </div>
                <div class="form-group col-md-4">
                  <label for="icone">@lang('messages.icon')</label>
                  <input type="text" class="form-control icp icp-auto"  id="icone" name="icone" value="{{ old('icone') }}"
                         placeholder="Ex: fa fa-chrome" required minlength="3" maxlength="60">
                  <small id="fileHelp" class="form-text text-muted"> Para mais ícones clique <a href="{{asset('AdminLTE/pages/UI/icons.html')}}" target="_blank">aqui.</a> </small>
                  <p><small id="fileHelp" class="form-text">Necessário incluir a classe "fa" ou "glyphicon" no início.</small></p>
                </div>
                <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
              </div>
            </fieldset>
          </div>
          <div class="box-footer d-flex justify-content-center">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary botao" id="cadastro">
                @lang('messages.register')
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

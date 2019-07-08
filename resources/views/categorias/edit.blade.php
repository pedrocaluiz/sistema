@extends('layouts.base', ["current" => "categorias"])

@section('header')
  @lang('messages.categories')
@endsection

@section('title')
  @lang('messages.categories')
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <form method="POST" action="/categorias/{{$cat->id}}" class="cadastro">
          @method('PUT')
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.category')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" value="{{ $cat->descricao }}" placeholder="{{ $cat->descricao }}"required>
                </div>
                <div class="form-group col-md-3">
                  <label for="icone">@lang('messages.icon')</label>
                  <input type="text" class="form-control icp icp-auto"  id="icone" name="icone" value="{{ $cat->icone }}" placeholder="{{ $cat->icone }}" required>
                  <small id="fileHelp" class="form-text text-muted"> Para mais ícones <a href="{{asset('AdminLTE/pages/UI/icons.html')}}" target="_blank">aqui.</a> </small>
                  <p><small id="fileHelp" class="form-text">Necessário incluir a classe "fa" ou "glyphicon" no início.</small></p>
                </div>
                @isset($user)
                  <!--Partials .. Atualizado Por.. -->
                  @includeIf('layouts.subviews.partials.atualizado-por')
                @endif
                <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
              </div>
            </fieldset>
          </div>
          <div class="box-footer d-flex justify-content-center">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary botao" id="cadastro">
                @lang('messages.update')
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
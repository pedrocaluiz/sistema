@extends('layouts.base', ["current" => "funcoes"])

@section('header')
  @lang('messages.functions')
@endsection

@section('title')
  @lang('messages.functions')
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <form method="POST" action="/funcoes/{{$funcao->id}}" class="cadastro">
          @method('PUT')
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.function')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-5">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" placeholder="{{ $funcao->descricao }}" value="{{ $funcao->descricao }}" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="valorFuncao">@lang('messages.vl-function')</label>
                  <input type="text" class="form-control money" id="valorFuncao" name="valorFuncao" placeholder="{{ $funcao->valorFuncao }}" value="{{ $funcao->valorFuncao }}" required >
                </div>
                <div class="form-group col-md-2">
                  <label for="pisoSalarial">@lang('messages.salary')</label>
                <input type="text" class="form-control money" id="pisoSalarial" name="pisoSalarial" placeholder="{{ $funcao->pisoSalarial }}" value="{{ $funcao->pisoSalarial }}" required >
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
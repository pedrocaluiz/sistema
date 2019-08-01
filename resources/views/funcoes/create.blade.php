@extends('layouts.base', ["menu" => "cadastrar", "current" => "funcoes"])

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

        <form method="POST" action="{{route('funcoes.store')}}" class="cadastro">
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
                  <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="valorFuncao">@lang('messages.vl-function')</label>
                  <input type="text" class="form-control money" id="valorFuncao" name="valorFuncao" value="{{ old('valorFuncao') }}" required >
                </div>
                <div class="form-group col-md-2">
                  <label for="pisoSalarial">@lang('messages.salary')</label>
                  <input type="text" class="form-control money" id="pisoSalarial" name="pisoSalarial" value="{{ old('pisoSalarial') }}" required >
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

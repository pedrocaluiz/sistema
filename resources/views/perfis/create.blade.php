@extends('layouts.base', ["current" => "perfis"])

@section('header')
  @lang('messages.profiles')
@endsection

@section('title')
  @lang('messages.profiles')
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <form method="POST" action="{{route('perfis.store')}}" class="cadastro">
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.profile')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="administrador">@lang('messages.admin')</label>
                  <select class="form-control" id="administrador" name="administrador">
                      <option value="1">Sim</option>
                      <option value="0" selected>Não</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="ativo">@lang('messages.enable')</label>
                  <select class="form-control" id="ativo" name="ativo">
                      <option value="1" selected>Sim</option>
                      <option value="0">Não</option>
                  </select>
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
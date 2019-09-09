@extends('layouts.base', ["menu" => "cadastrar", "current" => "agencias"])

@section('header')
  @lang('messages.agencies')
@endsection

@section('title')
    <a href="{{route('agencias')}}"> @lang('messages.agencies')</a>
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <form method="POST" action="{{route('agencias.store')}}" class="cadastro">
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.create')
              @lang('messages.agency')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-2">
                  <label for="codigoUnidade">@lang('messages.code')</label>
                  <input id="codigoUnidade" type="text" class="form-control d-4" name="codigoUnidade" placeholder="Digite o Código da Agência" value="{{ old('codigo') }}" required autofocus minlength="4" maxlength="4" >
                </div>
                <div class="form-group col-md-3">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" placeholder="Digite a Descrição da Agência" value="{{ old('descricao') }}" required minlength="3" maxlength="40">
                </div>
                <div class="form-group col-md-2">
                  <label for="SR">{{ __('SR') }}</label>
                  <input type="text" class="form-control d-4"  id="SR" name="SR" placeholder="Digite o Código da SR" value="{{ old('SR') }}" required minlength="4" maxlength="4">
                </div>
                <div class="form-group col-md-2">
                  <label for="DIRE">{{ __('DIRE') }}</label>
                  <input type="text" class="form-control d-4"  id="DIRE" name="DIRE" placeholder="Digite o Código da DIRE" value="{{ old('DIRE') }}" required minlength="4" maxlength="4">
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

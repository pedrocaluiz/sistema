@extends('layouts.base', ["current" => "cargos"])

@section('header')
  @lang('messages.charges')
@endsection

@section('title')
  @lang('messages.charges')
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">

        <form method="POST" action="{{route('cargos.store')}}" class="cadastro">
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.office')
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
                  <label for="salarioBase">{@lang('messages.salary')</label>
                  <input type="text" class="form-control money" id="salarioBase" name="salarioBase" value="{{ old('salarioBase') }}" required>
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
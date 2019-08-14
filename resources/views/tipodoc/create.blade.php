@extends('layouts.base', ["menu" => "cadastrar", "current" => "tipodoc"])

@section('header')
  @lang('messages.types-doc')
@endsection

@section('title')
    <a href="{{route('tipodoc')}}"> @lang('messages.types-doc')</a>
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">

        <form method="POST" action="{{route('tipodoc.store')}}" class="cadastro">
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.create')
              @lang('messages.type-doc')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-2">
                  <label for="siglaDocumento">@lang('messages.initials')</label>
                  <input type="text" class="form-control"  id="siglaDocumento" name="siglaDocumento" value="{{ old('siglaDocumento') }}" required minlength="2" maxlength="10">
                </div>
                <div class="form-group col-md-4">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" required minlength="3" maxlength="80">
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

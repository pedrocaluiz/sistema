@extends('layouts.base', ["current" => "tipomat"])

@section('header')
  @lang('messages.types-mat')
@endsection

@section('title')
  @lang('messages.types-mat')
@endsection
@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">

        <form method="POST" action="/tipomat/{{$tp->id}}" class="cadastro">
          @method('PUT')
          @csrf
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.type-mat')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>Edite um Tipo:</legend>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="descricao">@lang('messages.description')</label>
                  <input id="descricao" type="text" class="form-control" name="descricao" placeholder="{{ $tp->descricao }}" value="{{ $tp->descricao }}" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="icone">@lang('messages.icon')</label>
                  <input class="form-control icp icp-auto" id="icone" name="icone" placeholder="{{ $tp->icone }}" value="{{ $tp->icone }}" type="text" required>
                  <small id="fileHelp" class="form-text text-muted"> Para mais ícones <a href="{{asset('AdminLTE/pages/UI/icons.html')}}" target="_blank">aqui.</a> </small>
                  <p><small id="fileHelp" class="form-text">Necessário incluir a classe "fa" ou "glyphicon" no início.</small></p>
                </div>


                  <!--<  <div class="input-group">
                      <input data-placement="bottomRight" class="form-control icp icp-auto" value="fas fa-archive"
                             type="text"/>
                      <span class="input-group-addon"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>With the input as a search box</label>
                    <input class="form-control icp icp-auto" data-input-search="true" value="fas fa-plane"
                           type="text"/>
                  </div>-->


                  <!--<input type="text" class="form-control"  id="icone" name="icone" value="{{ $tp->icone }}" placeholder="{{ $tp->icone }}" required>-->

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
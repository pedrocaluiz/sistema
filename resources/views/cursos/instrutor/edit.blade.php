@extends('layouts.base', ["current" => "cursos"])

@section('header')
    @lang('messages.course')
@endsection

@section('title')
    @lang('messages.course')
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    <form method="POST" action="/cursos/instrutor/{{$curso->id}}" enctype="multipart/form-data" class="cadastro">
        @method('PUT')
        @csrf
<div class="row align-items-end">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    @lang('messages.edit')
                    @lang('messages.course')
                </h3>
            </div>
            <div class="box-body">
                <fieldset>
                    <legend>@lang('messages.informations'):</legend>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="categoria_id">@lang('messages.categories')</label>
                            <select class="form-control select2" id="categoria_id" name="categoria_id" autofocus>
                                @if(count($cats) > 0)
                                    @foreach ($cats as $cat)
                                        @if ($cat->id == $curso->categoria_id)
                                            <option value="{{$cat->id}}" selected>{{$cat->descricao}}</option>
                                        @else
                                            <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="tituloCurso">@lang('messages.title')</label>
                            <input id="tituloCurso" type="text" class="form-control" name="tituloCurso"
                                   placeholder="{{ $curso->titulo }}" value="{{ $curso->titulo }}" required autofocus>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="descricaoCurso">@lang('messages.description')</label>
                            <textarea rows="2" cols="50" name="descricaoCurso" id="descricaoCurso" class="form-control"
                                      required maxlength="500" style="resize: vertical" placeholder="{{ $curso->titulo }}">{{ $curso->titulo }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="icone">@lang('messages.icon')</label>
                            <input type="text" class="form-control icp icp-auto"  id="icone" name="icone"
                                   placeholder="{{ $curso->icone }}" value="{{ $curso->icone }}" required>
                            <small id="fileHelp" class="form-text text-muted"> Para mais ícones
                                <a href="{{asset('AdminLTE/pages/UI/icons.html')}}" target="_blank">aqui.</a></small>
                            <p><small id="fileHelp" class="form-text">Necessário incluir a classe "fa" ou "glyphicon" no início.</small></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="palavrasChave-i">@lang('messages.keywords')</label>
                            <input id="palavrasChave-i" type="text" class="form-control" name="palavrasChave-i" >
                        </div>
                        <div class="form-group col-md-1">
                            <!--<label for="newkeyword">Adicionar</label>-->
                            <button type="button" class="btn btn-primary" id="newkeyword" style="margin-top: 25px">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-danger" id="deletekeyword" style="margin-top: 25px">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="palavrasChave">@lang('messages.description')</label>
                            <textarea rows="2" cols="50" name="palavrasChave" id="palavrasChave" class="form-control"
                                      readonly maxlength="500" style="resize: vertical">{{ $curso->palavrasChave }}</textarea>
                        </div>
                        @isset($user)
                        <!--Partials .. Atualizado Por.. -->
                            @includeIf('layouts.subviews.partials.atualizado-por')
                        @endif
                    </div>
                    <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
                </fieldset>

            </div>
            <div class="box-footer d-flex justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary botao" id="cadastro">
                        @lang('messages.update')
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
</form>
@endsection

@push('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $("#newkeyword").click(function(){
            txtArea = $("#palavrasChave");
            txtAreaI = $("#palavrasChave-i");
            if (txtAreaI.val() == ""){
                alert("Digite alguma palavra-chave");
            }else if (txtAreaI.val().length < 3){
                //console.log(txtAreaI.val().length);
                alert("Digite no mínimo 3 caracteres");
            }else {
                txtArea.val(txtArea.val() + txtAreaI.val() + ';');
                txtAreaI.val("");
            }
        });

        $("#deletekeyword").click(function(){
            txtArea = $("#palavrasChave");
            txtArea.val('');
        });





        $(function(){
            //
        });
    </script>
@endpush
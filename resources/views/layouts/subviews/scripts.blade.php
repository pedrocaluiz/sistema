<!-- jQuery 3 -->
<script src="{{asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2-->
<script src="{{asset('AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask-->
<script src="{{asset('AdminLTE/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- jQuery Mask-->
<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Data Tables -->
<script src="{{asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<!-- Icon Picker -->
<script src="{{asset('js/fontawesome-iconpicker.js')}}"></script>


<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
            placeholder: 'SELECIONE'
        });

        //Icon Picker
        $('.icp-auto').iconpicker();

        //Datemask dd/mm/yyyy
        $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/aaaa' });

        //Date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $(".money").mask("999990.00", {reverse: true});
        $("#matricula").mask("c000000-0", {translation: {'c': {pattern: /[a-z]/}}});
        $("#telefone").mask("(00)0000-0000");
        $("#celular").mask("(00)00000-0000");
        $(".d-4").mask("0000");
        $(".ordem").mask("90");
        $("#CEP").mask("99.999-999");

        $('#example1').DataTable({
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostando&nbsp _MENU_ &nbspresultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }});

    })
</script>


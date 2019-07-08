
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

<!-- date-range-picker -->
<script src="{{asset('AdminLTE/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Morris.js charts GRÁFICOS -->
<script src="{{asset('AdminLTE/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline GRÁFICOS EM LINHA-->
<script src="{{asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap MAPAS-->
<script src="{{asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart RODA DE VOLUME-->
<script src="{{asset('AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>

<script src="{{asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/aaaa' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })

        $(".money").mask("999999.99", {reverse: true})
        $("#matricula").mask("c000000-0", {translation: {'c': {pattern: /[cp]/}}})
        $("#telefone").mask("(00)0000-0000")
        $("#celular").mask("(00)00000-0000")

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


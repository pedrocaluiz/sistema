<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href=" {{asset('adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('adminLTE/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('adminLTE/dist/css/skins/_all-skins.min.css')}}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/morris.js/morris.css')}}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/jvectormap/jquery-jvectormap.css')}}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/iCheck/all.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">




<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<!-- TESTES -->

<style>

  /*CADASTRO*/

  fieldset {
    padding: 10px;
    border: 1px solid black;
  }

  fieldset legend{
    font-size: medium;
  }

  .box-footer{
    display: flex;
    justify-content: space-around;
  }

  .botao{
    width: 100%;
    font-size: medium;
  }

  .form-control:focus{
    box-shadow: 0 0 10px #2980b9;
  }

  span strong {
    font-weight: 700;
    color: red;
  }

  /*HOME*/

  .small-box:hover {
    transform: translate(0 , -10px);
    box-shadow: 0 0 20px gray;
    color: #57606f;

  }

  .small-box:hover .icon{
    color: #57606f;
  }

  .small-box {
    transition: transform 0.5s;
    color: #bdc3c7;
    background-color: white;

  }

  .small-box>.icon{
    transition: transform 500ms, color 500ms;

  }

  .bg-white>.small-box-footer {
    color: gray;
  }

  .small-box p {
    font-size: 15px;
    margin: 0 0 -3px;
  }

  .box>.home-box, .box>.home-box{
    display: flex;
    justify-content: center;
  }

  /*DATATABLES*/

  .acaoTxt {
    display: inline-block;
  }

  .acaoIcon {
    display: none;
  }

  #acoes {
    min-width: 125px !important;
  }

  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_filter,
  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_processing,
  .dataTables_wrapper .dataTables_paginate {
    margin: 0 10px;
  }


  /*parte mobile usuarios*/
  @media(max-width: 997px){

    table#example1 td:nth-child(3), td:nth-child(4) {
      display: none;
    }

    thead th:nth-child(3), th:nth-child(4) {
      display: none;
    }

    #id {
      width: 20% !important;
    }

    #nome {
      width: 60% !important;
    }

    #acao {
      width: 10% !important;
      min-width: 0 !important;
    }

    .acaoTxt {
      display: none;
    }

    .acaoIcon {
      display: inline-block;
    }

    tfoot th:nth-child(3), th:nth-child(4) {
      display: none;
    }

  }

  /*parte mobile usuarios*/
  @media(max-width: 1335px){


    table#example1 td:nth-child(5), td:nth-child(6) {
      display: none;
    }

    thead th:nth-child(5), th:nth-child(6) {
      display: none;
    }

    tfoot th:nth-child(5), th:nth-child(6) {
      display: none;
    }

  }

  /*NAVBAR*/

  .navbar-nav>li>a {
    margin: 2.5px 5px;
    line-height: 10px;
    border: 0 none;
  }

  .navbar-nav>li>a:hover {
    box-shadow: 0 0 10px #233B5D;
    border: 0 none;
  }

</style>
</head>
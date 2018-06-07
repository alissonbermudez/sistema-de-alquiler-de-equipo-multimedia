


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administración Multimedia</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/dataTables.bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>dist/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>dist/date/jquery-ui.theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>dist/date/jquery-ui.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>dist/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>dist/date/jquery-ui.js"></script>
    <script>

        $(function () {
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd-mm-yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional["es"]);
            $("#fech").datepicker({
                minDate: new Date
            });

            $("#fechai,#fechaf,#fechaic,#fechafc").datepicker({

            });
        });

    </script>




</head>

<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url().'docente' ?>"><span class="glyphicon glyphicon-th"></span>RESERVA DE EQUIPO MULTIMEDIA </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $this->session->userdata('perfil') ?></a></li>
                <li><a href="<?php echo base_url().'login/logout_ci' ?>"><span class="glyphicon glyphicon-share-alt"></span>Salir</a></li>
                <li><button type="button" class="btn btn-link" data-toggle="modal" data-target="#ayuda"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ayuda </button></li>
            </ul>

        </div>
    </div>
</nav>




<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12  col-md-12  main">

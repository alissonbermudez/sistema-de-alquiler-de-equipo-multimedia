<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/login.css">


</head>
<body>

<style>

    img{
        display:block;
        margin:auto;
    }

</style>

<?php
$atrib = array('class' => 'form-signin');
$username = array('name' => 'username', 'placeholder' => 'Nombre de usuario', 'class' =>'form-control');
$password = array('name' => 'password',	'placeholder' => 'Contraseña', 'class' =>'form-control');
$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión' , 'class' => 'btn btn-lg btn-primary btn-block');
?>


<div class="wrapper">






        <?=form_open(base_url().'login/new_user',$atrib)?>
    <img class="img-responsive"  src="<?php echo base_url().'dist/uls.png'?>" alt="ULS"  width="200" height="100">
    <br>


        <?=form_input($username)?><p><?=form_error('username')?></p>

        <?=form_password($password)?><p><?=form_error('password')?></p>
        <?=form_hidden('token',$token)?>
        <?=form_submit($submit)?>
        <?php
        if($this->session->flashdata('usuario_incorrecto'))
        {
            ?>
            <?=$this->session->flashdata('usuario_incorrecto')?>
            <?php
        }
        ?>
        <?=form_close()?>



</div>


















<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="<?php echo base_url() ?>dist/js/bootstrap.min.js"></script>
</body>
</html>
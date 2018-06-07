<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante</title>
</head>
<body>

<style>
    td{
        font-size: 10pt;
        text-align: center;

    }
    th{
        font-style: inherit;
    }

    table{
        border-collapse: collapse;
    }
    h3 , p{
        text-align: center;
    }
    table{
        margin-left: auto;
        margin-right: auto

    }



</style>

<h3 ><b>Universidad Luterana Salvadoreña</b></h3>
<br>
<h3><b>Comprobante de Pago de </b></h3>
<h3><b>Alquiler de Equipo Multimedia  </b></h3>


<br><br>
<h3>Reserva # <?php echo $id;?></h3>
<table border="1" >
    <thead>
    <tr>

        <th>Carnet</th>
        <th>Equipo</th>
        <th>Horario</th>

        <th>Fecha Reservada</th>
        <th width="60">Estado</th>

    </tr>
    </thead>
    <tbody>


        <tr>
            <td> <?php echo $carnet?> </td>
            <td> <?php echo $equipo ?> </td>
            <td> <?php echo $horario ?> </td>
            <td> <?php echo $fecha ?> </td>
            <td></td>



        </tr>


    </tbody>
</table>
<br><br><br><br>
<br><br><br><br>

<table>
    <tbody>
    <tr>
        <td width="170">Firma:_______________</td>
        <td width="60"></td>
        <td width="170">SELLO</td>
    </tr>
    </tbody>
</table>



</body>
</html>
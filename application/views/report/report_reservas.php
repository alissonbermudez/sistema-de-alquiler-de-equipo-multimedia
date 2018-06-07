<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Reservas</title>
</head>
<body>

<style>
    td{
        font-size: 10pt;
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
<h3><b>Reporte de Reservas</b></h3>
<p>Reporte de Reservas del <?php echo $inicio?> al <?php echo $fin?></p>

    <table border="1" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Carnet</th>
            <th>Equipo</th>
            <th>Horario</th>
            <th>Estado</th>
            <th>Fecha </th>
            <th>fecha de Reservación</th>

        </tr>
        </thead>
        <tbody>

        <?php foreach($report as $item): ?>
            <tr>
                <td> <?php echo $item->id ?> </td>
                <td> <?php echo $item->usuario ?> </td>
                <td> <?php echo $item->equipo ?> </td>
                <td> <?php echo $item->horario ?> </td>
                <td> <?php echo $item->estado  ?> </td>
                <td> <?php echo $item->fecha ?> </td>
                <td> <?php echo $item->fecha_reserva ?></td>


            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

</body>
</html>
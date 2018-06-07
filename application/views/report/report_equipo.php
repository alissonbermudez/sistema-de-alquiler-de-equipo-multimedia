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
<h3><b>Reporte de Equipo Multimedia</b></h3>


<table border="1">
    <thead>
    <tr>
        <th width="40">ID</th>
        <th width="40">Marca</th>
        <th width="50">Modelo</th>
        <th width="50">Serie</th>
        <th width="50">Tipo</th>
        <th width="250">Descripción</th>
        <th width="70">Adquisición</th>
        <th width="50">Estado</th>

    </tr>
    </thead>
    <tbody>

    <?php foreach($report as $item): ?>
        <tr>
            <td> <?php echo $item->idequipo ?> </td>
            <td> <?php echo $item->marca ?> </td>
            <td> <?php echo $item->modelo ?> </td>
            <td> <?php echo $item->serie ?> </td>
            <td> <?php echo $item->tipo ?> </td>
            <td> <?php echo $item->descripcion ?> </td>
            <td> <?php echo $item->fechaadq ?></td>
            <td> <?php  if ($item->estado == 1){
                    echo "Bueno";
                }elseif($item->estado == 2){
                    echo "Dañado";
                }elseif($item->estado == 3){
                    echo "En Reparación";
                }

                ?>

            </td>


        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

</body>
</html>
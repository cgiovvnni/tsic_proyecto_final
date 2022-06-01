<?php
include("db.php");
?>

<link rel="stylesheet" href="reporte.css">

<table class="blueTable">
<thead>
    <tr>
        <td>id</td>
        <td>id_videojuego</td>
        <td>nombre</td>
        <td>precio</td>
        <td>cantidad</td>
    </tr>
</thead>
    <?php
    $sqlventas="SELECT * FROM ventas";
    $tablaventas=mysqli_query($bd_connection,$sqlventas);

    while($mostrar=mysqli_fetch_array($tablaventas)){
        ?>
<tbody>
    <tr>
        <td><?php echo $mostrar['id'] ?></td>
        <td><?php echo $mostrar['id_videojuego'] ?></td>
        <td><?php echo $mostrar['nombre'] ?></td>
        <td><?php echo $mostrar['precio'] ?></td>
        <td><?php echo $mostrar['cantidad'] ?></td>
    </tr>
<?php
    }
?>
</tbody>
</table>
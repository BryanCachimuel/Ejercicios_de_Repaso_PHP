<?php
    require_once("C://xampp/htdocs/Ejercicios_PHP/codigo_barras/database/conexion.php");
    $conectar = conexion();
    $sql = "SELECT * FROM medicamentos";
    $resultado = mysqli_query($conectar,$sql);
    $arraycodigos = array();
?>

<table class="table">
    <tr>
        <td>Nombre del Farmaco</td>
        <td>Código de Barras</td>
    </tr>
    <?php while($datos=mysqli_fetch_row($resultado)) : 
          $arraycodigos[] = (string)$datos[2];    
    ?>
        <tr>
            <td><?php echo $datos[1]; ?></td>
            <td>
                <svg id="<?php echo "barcode".$datos[2] ?>">
            </td>
        </tr>
    <?php endwhile;  ?>
</table>
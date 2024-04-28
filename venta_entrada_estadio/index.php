<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas para el estadio</title>
    <link rel="stylesheet" href="publico/css/estilos.css">
</head>
<body>
    <section>

        <?php 

            error_reporting();
            $nombre_comprador = $_POST['txtComprador'];
            $fecha_actual = $_POST['txtFecha'];
            $cantidad_adultos = $_POST['txtEntradasAdultos'];
            $cantidad_ninios = $_POST['txtEntradasNinios'];

            $mComprador = '';
            $mAdultos = '';
            $mNinios = '';

            if(isset($_POST['btnComprar'])){
                if(empty($nombre_comprador)) $mComprador = 'Debe Ingresar el nombre del comprador';
                elseif(is_numeric($mComprador)) $mComprador = 'Solo se permite letras en este campo';
                else $mComprador;

                if(empty($cantidad_adultos)) $mAdultos = 'Debe ingresar la cantidad de adultos';
                elseif(!is_numeric($cantidad_adultos)) $mAdultos = 'Solo se permite números';
                else $cantidad_adultos;

                if(empty($cantidad_ninios)) $cantidad_ninios = 'Debe ingresar la cantidad de ninios';
                elseif(!is_numeric($cantidad_ninios)) $cantidad_ninios = 'Solo se permite números';
                else $cantidad_ninios;
            }

        ?>

        <form action="index.php" method="POST" autocomplete="off">
            <table>
                <h4>Formulario de Compra de Entradas</h4>
                
                <tr>
                    <td width="200">Comprador</td>
                    <td>
                        <input type="text" name="txtComprador" class="comprador">
                    </td>
                    <td width="200" id="error"><?php echo $mComprador; ?></td>
                </tr>

                <tr>
                    <td>Fecha Actual</td>
                    <td>
                        <input type="text" name="txtFecha" class="fecha" readonly value="<?php echo date('d/m/y'); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Nro de Entradas para Adultos</td>
                    <td>
                        <input type="text" name="txtEntradasAdultos" class="adultos">
                    </td>
                    <td width="200" id="error"><?php echo $mAdultos; ?></td>
                </tr>

                <tr>
                    <td>Nro de Entradas para Niños</td>
                    <td>
                        <input type="text" name="txtEntradasNinios" class="ninios">
                    </td>
                    <td width="200" id="error"><?php echo $mAdultos; ?></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <button class="boton" type="submit" name="btnComprar">Comprar Entradas</button>
                        <button class="limpiar" type="reset">Limpiar</button>
                        <a href="index.php" class="nuevaCompra">Nueva Compra</a>
                    </td>
                </tr>

            </table>
        </form>
    </section>
</body>
</html>
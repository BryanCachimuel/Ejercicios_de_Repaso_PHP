<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas para el estadio</title>
    <link rel="stylesheet" href="publico/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>

        <?php

        error_reporting(0);
        $nombre_comprador = $_POST['txtComprador'];
        $fecha_actual = $_POST['txtFecha'];
        $cantidad_adultos = $_POST['txtEntradasAdultos'];
        $cantidad_ninios = $_POST['txtEntradasNinios'];

        $mComprador = "";
        $mAdultos = "";
        $mNinios = "";
        
        if (isset($_POST['btnComprar'])) {
            if (empty($nombre_comprador)) $mComprador = 'Debe Ingresar el nombre del comprador';
            elseif (is_numeric($nombre_comprador)) $mComprador = 'Solo se permite letras en este campo';

            if (empty($cantidad_adultos)) $mAdultos = 'Debe ingresar la cantidad de adultos';
            elseif (!is_numeric($cantidad_adultos)) $mAdultos = 'Solo se permite números';

            if (empty($cantidad_ninios)) $mNinios = 'Debe ingresar la cantidad de ninios';
            elseif (!is_numeric($cantidad_ninios)) $mNinios = 'Solo se permite números';
        }

        $dia = date('l');

        switch ($dia) {
            case 'Monday':
                $costosAdultos = 7;
                $costoNinios = 3;
                break;

            case 'Tuesday':
                $costosAdultos = 8;
                $costoNinios = 4;
                break;

            case 'Wednesday':
                $costosAdultos = 9;
                $costoNinios = 4.5;
                break;

            case 'Thursday':
            case 'Friday':
                $costosAdultos = 12;
                $costoNinios = 6;
                break;

            case 'Saturday':
            case 'Sunday':
                $costosAdultos = 28;
                $costoNinios = 14;
                break;

            default:
                $costosAdultos = 0;
                $costoNinios = 0;
                break;
        }

        $adultos = $costosAdultos * $cantidad_adultos;
        $ninios = $costoNinios * $cantidad_ninios;
        ?>

        <form action="index.php" method="POST" autocomplete="off">
            <table id="formulario">
                <h4 id="formulario_titulo"><i class="fa-solid fa-ticket"></i> Formulario de Compra de Entradas</h4>

                <tr>
                    <td width="200"><i class="fa-regular fa-user"></i> Comprador</td>
                    <td>
                        <input type="text" name="txtComprador" class="comprador">
                    </td>
                    <td width="200" id="error"><?php echo $mComprador; ?></td>
                </tr>

                <tr>
                    <td><i class="fa-regular fa-calendar-days"></i> Fecha Actual</td>
                    <td>
                        <input type="text" name="txtFecha" class="fecha" readonly value="<?php echo date('d/m/y'); ?>">
                    </td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-children"></i> Nro de Entradas para Adultos</td>
                    <td>
                        <input type="text" name="txtEntradasAdultos" class="adultos">
                    </td>
                    <td width="200" id="error"><?php echo $mAdultos; ?></td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-child-reaching"></i> Nro de Entradas para Niños</td>
                    <td>
                        <input type="text" name="txtEntradasNinios" class="ninios">
                    </td>
                    <td width="200" id="error"><?php echo $mAdultos; ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button class="boton" type="submit" name="btnComprar">Comprar</button>
                        <button class="limpiar" type="reset">Limpiar</button>
                        <a href="index.php" class="nuevaCompra">Nueva Compra</a>
                    </td>
                </tr>

            </table>

            <?php
            if (
                isset($_POST['btnComprar'])
                && empty($mComprador)
                && empty($mAdultos)
                && empty($mNinios)
            ) {
            ?>

                <table id="tabla_superior" width="800" border="1">
                    <tr>
                        <td>
                            <table id="tabla_resultados" width="800">
                                <h4 id="datos"> Datos de Compra</h4>
                                <tr>
                                    <td width="150">Nombre Comprador</td>
                                    <td width="350"><?php echo $nombre_comprador ?></td>
                                </tr>

                                <tr>
                                    <td>Costo para Adultos</td>
                                    <td><?php echo "$" . number_format($adultos, 2, '.', ','); ?></td>
                                </tr>

                                <tr>
                                    <td>Costo para Niños</td>
                                    <td><?php echo "$" . number_format($ninios, 2, '.', ','); ?></td>
                                </tr>

                                <tr>
                                    <td>Día de Promoción</td>
                                    <td><?php echo $dia; ?></td>
                                </tr>

                                <tr>
                                    <td>Monto Total a Pagar</td>
                                    <td><?php echo "$" . number_format($adultos + $ninios, 2, '.', ','); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </form>
    </section>

    <footer>
        <h6 id="footer">Todos los Derechos Reservados - Rixler Corp - <?php echo date('Y') ?></h6>
    </footer>

</body>

</html>
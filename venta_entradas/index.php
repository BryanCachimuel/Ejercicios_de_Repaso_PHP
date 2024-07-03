<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Entradas</title>
    <link rel="stylesheet" href="publico/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <h1 id="centrado"><i class="fa-solid fa-cash-register"></i> Ventas de Entradas</h1>
        <img src="publico/img/circo.jpg" alt="circo">
    </header>

    <section>

    <?php
        error_reporting(0);
        $comprador = $_POST['txtComprador'];
        $fecha = $_POST['txtFecha'];
        $numAdultos = $_POST['txtNroEntradasAdultos'];
        $numNinios = $_POST['txtNroEntradasNinios'];

        $mComprador = '';
        $mNumAdultos = '';
        $mNumNinios = '';

        if(isset($_POST['btnAdquirir'])){
            if(empty($comprador)) $mComprador = 'Debe Ingresar un nombre';
            elseif(is_numeric($comprador)) $mComprador = 'Solo se Permite Letras';
            else $mComprador = '';

            if(empty($numAdultos)) $mNumAdultos = 'Debe Ingresar la cantidad de adultos para la compra de entradas';
            elseif(!is_numeric($numAdultos)) $mNumAdultos = 'Solo se Permite Números';
           else $mNumAdultos = '';

            if(empty($numNinios)) $mNumNinios = 'Debe Ingresar la cantidad de niños para la compra de entradas';
            elseif(!is_numeric($numNinios)) $mNumNinios = 'Solo se Permite Números';
            else $mNumNinios = '';
        }

        /* Realizando los calculos */
        $dia = date('l');

        switch($dia){
            case 'Monday':
                $costosAdultos = 10;
                $costoNinios = 5;
                break;
            
            case 'Tuesday':
                $costosAdultos = 8;
                $costoNinios = 4;
                break;
            
            case 'Wednesday':
            case 'Thursday':
            case 'Friday':
                $costosAdultos = 16;
                $costoNinios = 8;
                break;

            case 'Saturday':
            case 'Sunday':
                $costosAdultos = 50;
                $costoNinios = 45;
                break;

            default:
                $costosAdultos = 0;
                $costoNinios = 0;
                break;
        }

        $adultos = $costosAdultos * $numAdultos;
        $ninios = $costoNinios * $numNinios;
    ?>

        <form action="index.php" method="post" autocomplete="off">
            <table id="formulario">
                <h4 id="titulo">Formulario de Compra</h4>
                <tr>
                    <td width="200"><i class="fa-regular fa-user"></i> Comprador</td>
                    <td>
                        <input class="comprador" type="text" name="txtComprador">
                    </td>
                    <td width="200" id="error"><?php echo $mComprador; ?></td>
                </tr>

                <tr>
                    <td><i class="fa-regular fa-calendar-days"></i> Fecha Actual</td>
                    <td>
                        <input class="fecha" type="text" name="txtFecha" readonly value="<?php echo date('d/m/Y'); ?>">
                    </td>
                </tr>
                
                <tr>
                    <td><i class="fa-solid fa-children"></i> Nro de Entradas Adultos</td>
                    <td>
                        <input class="adultos" type="text" name="txtNroEntradasAdultos" size="50">
                    </td>
                    <td width="200" id="error"><?php echo $mNumAdultos; ?></td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-child-reaching"></i> Nro de Entradas Niños</td>
                    <td>
                        <input class="ninios" type="text" name="txtNroEntradasNinios" size="50">
                    </td>
                    <td width="200" id="error"><?php echo $mNumNinios; ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button class="boton" type="submit" name="btnAdquirir">Adquirir</button>
                        <button class="limpiar" type="reset">Limpiar</button>
                        <a href="index.php" class="nuevaCompra">Nueva Compra</a>
                    </td>
                </tr>
            </table>


            <?php
                if(isset($_POST['btnAdquirir']) 
                    && empty($mComprador) 
                    && empty($mNumAdultos) 
                    && empty($mNumNinios)){
            ?>

            <table width="800" border="1">
                <tr>
                    <td>
                        <table width="800">
                            <h4 id="datos"> Datos de Compra</h4>
                            <tr>
                                <td width="150">Comprador</td>
                                <td width="350"><?php echo $comprador; ?></td>
                            </tr>
                            <tr>
                                <td>Costos por Adultos</td>
                                <td><?php echo "$". number_format($adultos,2, '.', ','); ?></td>
                            </tr>
                            <tr>
                                <td>Costos por Niños</td>
                                <td><?php echo "$". number_format($ninios, 2, '.', ','); ?></td>
                            </tr>
                            <tr>
                                <td>Día de Promoción</td>
                                <td><?php echo $dia; ?></td>
                            </tr>
                            <tr>
                                <td class="monto">Monto a Pagar</td>
                                <td class="monto"><?php echo "$". number_format($adultos + $ninios, 2, '.', ','); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <?php } ?>
            
        </form>
    </section>

    <footer>
        <h6 id="footer">Todos los Derechos Reservados -  Rixler Corp  - <?php echo date('Y')?></h6>
    </footer>
</body>
</html>
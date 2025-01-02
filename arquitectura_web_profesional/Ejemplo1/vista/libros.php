<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    <!-- TODO: 5. Se crea la vista del proyecto -->
     <h2>Libros de Finanzas Personales</h2>
     
     <ul>
        <?php 
            foreach($datos as $valor){
                print "<li>".$valor["titulo"].", ".$valor["autor"]."</li>";
            }
        ?> 
    </ul>

</body>
</html>
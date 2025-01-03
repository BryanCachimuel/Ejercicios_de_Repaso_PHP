<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
</head>
<body>
    <ul>
        <?php
            for($i=0; $i < count($data); $i++){
                print "<li>".$data[$i]["titulo"]."</li>";
            }
        ?>
    </ul>
</body>
</html>
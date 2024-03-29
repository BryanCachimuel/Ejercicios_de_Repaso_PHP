<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Agregar Registro</h2>
                    <form action="../process/insertar.php" method="post">
                        <div class="mt-3">
                            <label for="apellido_paterno">Apellido Paterno: </label>
                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="apellido_materno">Apellido Materno: </label>
                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="nombres">Nombres: </label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
                        </div>
                        
                        <div class="mt-3 mb-3">
                            <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="edad">Edad: </label>
                            <input type="number" class="form-control"  name="edad" id="edad" required>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="ocupacion">Ocupación:</label>
                            <input type="text" class="form-control" name="ocupacion" id="ocupacion" required>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-outline-success"><i class="fa-solid fa-floppy-disk"></i> Agregar</button>
                            <a href="../index.php" class="btn btn-outline-info"><i class="fa-solid fa-xmark"></i> Cancelar</a>   
                        </div>                
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="../public/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
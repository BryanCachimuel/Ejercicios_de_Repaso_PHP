<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cotizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <header data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4>Nosotros</h4>
                        <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4>Contacto</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Twitter</a></li>
                            <li><a href="#" class="text-white">Facebook</a></li>
                            <li><a href="#" class="text-white">Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>Sistema Cotizador</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- content -->
     <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card mb-3">
                    <div class="card-header">Información del Cliente</div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <div class="col-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba su nombre" required>
                                </div>
                                <div class="col-4">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Escriba el nombre de la empresa" required>
                                </div>
                                <div class="col-4">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Escriba su correo" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Agregar Nuevo Concepto</div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="concepto">Concepto</label>
                                    <input type="text" class="form-control" name="concepto" id="concepto" placeholder="Ingrese un concepto" required>
                                </div>
                                
                                <div class="col-3">
                                    <label for="tipo">Tipo de Producto</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="producto">Producto</option>
                                        <option value="servicio">Servicio</option>
                                    </select>
                                </div>

                                <div class="col-3">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" name="cantidad" id="cantidad" min="1" max="99999" value="1" required>
                                </div>

                                <div class="col-3">
                                    <label for="precio_unitario">Precio Unitario</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" name="precio_unitario" id="precio_unitario" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success" type="submit">Agregar Concepto</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-12">
               <div class="card">
                <div class="card-header">Resumen de Cotización</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Concepto</th>
                                    <th>Cantidad</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Guitarra eléctrica</td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">$325.00</td>
                                    <td class="text-center">$399.00</td>
                                </tr>
                                <tr>
                                    <td>Ukulele</td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">$299.00</ºtd>
                                    <td class="text-center">$498.00</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="3">Subtotal</td>
                                    <td class="text-center">$123.00</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="3">Impuestos</td>
                                    <td class="text-center">$123.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right"style="text-align: right;" colspan="3">Envio</td>
                                    <td class="text-center">$50.00</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="4">
                                        <b>Total</b>
                                        <h3 class="text-success">
                                            <b>$799.00</b>
                                        </h3>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Descargar PDF</button>
                    <button class="btn btn-success">Enviar por Correo</button>
                </div>
               </div> 
            </div>
        </div>
     </div>
    <!-- end content -->

    <footer class="bg-light text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Arriba</a>
            </p>
            <p> 
                <a href="/">Sistema Cotizador</a> &copy;. Todos los Derechos Reservados <?php echo date('Y'); ?> <a href="/docs/5.3/getting-started/introduction/"></a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
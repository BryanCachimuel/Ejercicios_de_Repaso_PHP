<?php require_once INCLUDES.'head.php' ?>
<?php require_once INCLUDES.'navbar.php' ?>

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
                <div class="card-body wrapper_quote">
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

    <?php require_once INCLUDES.'footer.php' ?>


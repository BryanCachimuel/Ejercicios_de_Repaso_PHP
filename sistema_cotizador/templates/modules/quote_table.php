<?php if(empty($d->items)): ?>
    <div class="text-center">
        <h3>La Cotización esta vacia</h3>
        <img src="<?php echo IMG.'empty.png; '?>" alt="Sin Contenido" class="img-fluid" style="width: 150px;">
    </div>
<?php else: ?>
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
                <td class="text-right" style="text-align: right;" colspan="3">Envio</td>
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
<?php endif; ?>   

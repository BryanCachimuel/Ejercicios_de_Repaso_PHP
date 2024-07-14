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
                <th> class="text-center">Precio</th>
                <th class="tgext-center">Cantidad</th>
                <th class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($d->items as $item): ?>
            <tr>
                <td><?php echo $item->concept; ?></td>
                <td class="text-center"><?php echo $item->quanity; ?></td>
                <td class="text-center"><?php echo '$'.number_format($item->price, 2); ?></td>
                <td class="text-center"><?php echo '$'.number_format($item->total, 2); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;" colspan="3">Subtotal</td>
                <td class="text-center"><?php echo '$'.number_format($item->subtotal, 2); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;" colspan="3">Impuestos</td>
                <td class="text-center"><?php echo '$'.number_format($item->taxes),2; ?></td>
            </tr>
            <tr>
                <td class="text-right" style="text-align: right;" colspan="3">Envio</td>
                <td class="text-center"><?php echo '$'.number_format($item->shipping,2); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;" colspan="4">
                    <b>Total</b>
                    <h3 class="text-success">
                        <b><?php echo '$'.number_format($d->total); ?></b>
                    </h3>
                    <?php echo sprintf('Impuestos incluidos %s%% , TAXES_RATE')?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>   

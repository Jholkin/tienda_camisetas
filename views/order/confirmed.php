<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Su pedido ha sido confirmado</h1>
    <p>Su pedido ha sido procesado con éxito, en el momento en que realize el pago
su pedido será automáticamente revisado y enviado.</p>

    <br>
    <?php if(isset($order)): ?>
        <h3>Datos del pedido</h3>
        Numero de pedido: <?=$order->id?> <br>
        Total a pagar: <?=$order->coste?>$ <br>
        Productos:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while($product = $products->fetch(PDO::FETCH_OBJ)): ?>
                <tr>
                    <td>
                        <?php if($product->imagen != null): ?>
                            <img src="<?=base_url?>uploads/images/<?=$product->imagen?>"  class="img-carrito">
                        <?php else: ?>
                            <img src="<?=base_url?>uploads/images/default.jpg"  class="img-carrito">
                        <?php endif; ?>
                    </td>
                    <td><a href="<?=base_url?>product/show&id=<?=$product->id?>"><?=$product->nombre?></a></td>
                    <td><?=$product->precio?></td>
                    <td><?=$product->unidades?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>
    <h1>Su pedido no ha podido procesarse.</h1>
<?php endif; ?>

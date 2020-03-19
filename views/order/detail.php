<h1>Detalle del pedido</h1>

<?php if(isset($order)): ?>

    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Cambiar el estado del pedido</h3>

        <form class="" action="<?=base_url?>order/status" method="post">
            <input type="hidden" name="order_id" value="<?=$order->id?>">
            <select class="" name="status">
                <option value="confirm" <?=$order->estado == 'confirm' ? 'selected' : ''?>>Pendiente</option>
                <option value="preparation" <?=$order->estado == 'preparation' ? 'selected' : ''?>>En preparacion</option>
                <option value="ready" <?=$order->estado == 'ready' ? 'selected' : ''?>>Preparado</option>
                <option value="sender" <?=$order->estado == 'sender' ? 'selected' : ''?>>Enviado</option>
            </select>
            <input type="submit" name="" value="Cambiar estado">
        </form><br>
    <?php endif; ?>

    <h3>Dirección de envío</h3>
    Provincia: <?=$order->provincia?> <br>
    Localidad: <?=$order->localidad?> <br>
    Dirección: <?=$order->direccion?> <br><br>

    <h3>Datos del pedido</h3>
    Estado: <?=Util::showStatus($order->estado)?><br>
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

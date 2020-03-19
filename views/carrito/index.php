<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php
        foreach($carrito as $key => $element):
            $product = $element['product'];
    ?>
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
                <td><?=$element['unidades']?></td>
            </tr>
    <?php endforeach; ?>
</table>

<br>
<div class="total-carrito">
    <?php $stats = Util::statisticsCarrito(); ?>
    <h3>Precio total: <?=$stats['total']?>$</h3>

    <a href="<?=base_url?>order/make" class="button button-pedido">Hacer pedido</a>
</div>

<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
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
                <td>
                    <?=$element['unidades']?>
                    <div class="updown-unidades">
                        <a class="button" href="<?=base_url?>carrito/up&index=<?=$key?>">+</a>
                        <a class="button" href="<?=base_url?>carrito/down&index=<?=$key?>">-</a>
                    </div>
                </td>
                <td><a href="<?=base_url?>carrito/delete&index=<?=$key?>" class="button button-carrito button-red">Quitar producto</a></td>
            </tr>
    <?php endforeach; ?>
</table>

<br>

<div class="delete-carrito">
    <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
</div>

<div class="total-carrito">
    <?php $stats = Util::statisticsCarrito(); ?>
    <h3>Precio total: <?=$stats['total']?>$</h3>

    <a href="<?=base_url?>order/make" class="button button-pedido">Hacer pedido</a>
</div>

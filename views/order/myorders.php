<?php if(isset($gestion)): ?>
    <h1>Gestionar pedidos</h1>
<?php else: ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>N° pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($order = $orders->fetch(PDO::FETCH_OBJ)): ?>
            <tr>
                <td> <a href="<?=base_url?>order/detail&id=<?=$order->id?>"><?=$order->id?></a> </td>
                <td><?=$order->coste?>$</td>
                <td><?=$order->fecha?></td>
                <td><?=Util::showStatus($order->estado)?></td>
            </tr>
    <?php endwhile; ?>
</table>

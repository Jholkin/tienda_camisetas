<h1>Mis pedidos</h1>

<table>
    <tr>
        <th>N° pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
    </tr>
    <?php while($order = $orders->fetch(PDO::FETCH_OBJ)): ?>
            <tr>
                <td> <a href="<?=base_url?>order/detail&id=<?=$order->id?>"><?=$order->id?></a> </td>
                <td><?=$order->coste?>$</td>
                <td><?=$order->fecha?></td>
            </tr>
    <?php endwhile; ?>
</table>

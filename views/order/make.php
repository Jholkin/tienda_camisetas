<?php if(isset($_SESSION['identify'])): ?>
    <h1>Hacer pedido</h1>
    <a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>
    <br>

    <h3>Dirección para el envío:</h3>
    <form class="" action="<?=base_url?>order/add" method="post">
        <label for="province">Provincia</label>
        <input type="text" name="province" id="province" required>
        <label for="locality">Localidad</label>
        <input type="text" name="locality" id="locality" required>
        <label for="address">Direccion</label>
        <input type="text" name="address" id="address" required>

        <input type="submit" name="orderconfirm" value="Confirmar pedido">
    </form>

<?php else: ?>
    <h1>Necesitas identificarte</h1>
    <p>necesitas iniciar sesion para poder realizar tu pedido</p>
<?php endif; ?>

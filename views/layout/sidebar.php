<div id="content">
    <!--BARRA LATERAL -->
    <aside id="lateral">
        <div id="carrito" class="block_aside">
            <h3>Mi carrito</h3>
            <ul>
                <?php $stats = Util::statisticsCarrito(); ?>
                <li><a href="<?=base_url?>carrito/index">productos (<?=$stats['count']?>)</a></li>
                <li><a href="<?=base_url?>carrito/index">total: <?=$stats['total']?>$</a></li>
                <li><a href="<?=base_url?>carrito/index">ver el carrito</a></li>
            </ul>
        </div>

        <div id="login" class="block_aside">

            <?php if(!isset($_SESSION['identify'])): ?>
                <h3>Entrar a la web</h3>
                <form action="<?=base_url?>user/login" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <input type="submit" value="Enviar">
                </form>
            <?php else: ?>
                <h3><?=$_SESSION['identify']->nombre;?> <?= $_SESSION['identify']->apellidos; ?></h3>
            <?php endif; ?>

            <ul>
                <?php if(isset($_SESSION['admin'])): ?>
                    <li><a href="<?=base_url?>category/index">Gestionar Categorias</a></li>
                    <li><a href="<?=base_url?>product/gestion">Gestionar Productos</a></li>
                    <li><a href="<?=base_url?>order/gestion">Gestionar Pedidos</a></li>
                <?php endif; ?>

                <?php if(isset($_SESSION['identify'])): ?>
                    <li><a href="<?=base_url?>order/myorders">Mis pedidos</a></li>
                    <li><a href="<?=base_url?>user/logout">Cerrar sesion</a></li>
                <?php else: ?>
                    <li><a href="<?=base_url?>user/register">Registrate</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
        <div id="central">

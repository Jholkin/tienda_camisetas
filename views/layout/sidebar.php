<div id="content">
    <!--BARRA LATERAL -->
    <aside id="lateral">
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
                    <li><a href="#">Gestionar Productos</a></li>
                    <li><a href="#">Gestionar Pedidos</a></li>
                <?php endif; ?>

                <?php if(isset($_SESSION['identify'])): ?>
                    <li><a href="#">Mis pedidos</a></li>
                    <li><a href="<?=base_url?>user/logout">Cerrar sesion</a></li>
                <?php else: ?>
                    <li><a href="<?=base_url?>user/register">Registrate</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
        <div id="central">
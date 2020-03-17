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
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
                <li><a href="#">Gestionar categorias</a></li>
                <li><a href="<?=base_url?>user/logout">Cerrar sesion</a></li>
            </ul>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
        <div id="central">
<h1> Registrarse </h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
        <strong class="alert-green">Registro completado con éxito</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert-red">Registro fallido</strong>
<?php endif; ?>

<?php Util::deleteSession('register'); ?>

<form action="<?=base_url?>user/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" required>

    <label for="lastname">Apellidos</label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Registrarse">
</form>
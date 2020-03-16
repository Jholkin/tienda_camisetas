<h1> Registrarse </h1>

<form action="index.php?controller=User&action=save" method="POST">
    <label for="nombre">Nombre</label>
    <input name="nombre" id="nombre" required>

    <label for="apellidos">Apellidos</label>
    <input name="apellidos" id="apellidos" required>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" required>

    <label for="password">Contraseña</label>
    <input type="text" name="password" id="password" required>

    <input type="submit" value="Registrarse">
</form>
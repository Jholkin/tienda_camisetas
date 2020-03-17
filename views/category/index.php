<h1>Gestionar categorías</h1>

<a href="<?=base_url?>category/create" class="button button-small">
    Crear categoría
</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while($category = $categories->fetch(PDO::FETCH_OBJ)): ?>
        <tr>
            <td><?=$category->id?></td>
            <td><?=$category->nombre?></td>
        </tr>
    <?php endwhile; ?>
</table>
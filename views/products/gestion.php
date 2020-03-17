<h1>Gestion de productos</h1>

<a href="<?=base_url?>product/create" class="button button-small">
    Crear producto
</a>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'complete'): ?>
    <strong class="alert-green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] == 'failed'): ?>
    <strong class="alert-red">El producto no se creó correctamente</strong>
<?php endif; ?>

<?php Util::deleteSession('product'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert-green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alert-red">El producto no se creó correctamente</strong>
<?php endif; ?>

<?php Util::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($product = $products->fetch(PDO::FETCH_OBJ)): ?>
        <tr>
            <td><?=$product->id?></td>
            <td><?=$product->nombre?></td>
            <td><?=$product->precio?></td>
            <td><?=$product->stock?></td>
            <td>
                <a href="<?=base_url?>product/edit&id=<?=$product->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>product/delete&id=<?=$product->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
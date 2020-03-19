<?php if(isset($edit) && isset($prod)): ?>
    <h1>Editar producto <?=$prod->nombre?></h1>
    <?php $url_action = base_url . "product/save&id=".$prod->id; ?>
<?php else: ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url . "product/save"; ?>
<?php endif; ?>

<div class="form-container">
    <!-- el enctype, es para que podamos enviar ficheros-->
    <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="<?= isset($prod) ? $prod->nombre : '' ?>">

        <label for="description">Descripcion</label>
        <textarea name="description" id="name"><?= isset($prod) ? $prod->nombre : '' ?></textarea>

        <label for="price">Precio</label>
        <input type="number" name="price" id="name" value="<?= isset($prod) ? $prod->precio : '' ?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="name" value="<?= isset($prod) ? $prod->stock : '' ?>">

        <label for="category">Categoria</label>
        <?php $categories = Util::showCategories(); ?>
        <select name="category" id="category">
            <?php while($category = $categories->fetch(PDO::FETCH_OBJ)): ?>
                <option value="<?=$category->id?>" <?= isset($prod) && $category->id == $prod->categoria_id ? 'selected' : '' ?>>
                    <?= $category->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="image">Imagen</label>
        <?php if(isset($prod) && !empty($prod->imagen)): ?>
            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="image" id="image">

        <input type="submit" value="Guardar">
    </form>
</div>

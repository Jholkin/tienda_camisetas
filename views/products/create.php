<h1>Crear nuevos productos</h1>

<div class="form-container">
    <form action="<?=base_url?>product/save" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name">

        <label for="description">Descripcion</label>
        <textarea name="description" id="name"></textarea>

        <label for="price">Precio</label>
        <input type="number" name="price" id="name">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="name">

        <label for="category">Categoria</label>
        <?php $categories = Util::showCategories(); ?>
        <select name="category" id="category">
            <?php while($category = $categories->fetch(PDO::FETCH_OBJ)): ?>
                <option value="<?=$category->id?>">
                    <?= $category->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="image">Imagen</label>
        <input type="file" name="image" id="image">
        
        <input type="submit" value="Guardar">
    </form>
</div>
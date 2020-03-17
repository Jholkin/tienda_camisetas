<?php if (isset($cat)): ?>
    <h1><?=$cat->nombre?></h1>

    <?php if($products->rowCount() > 0): ?>
        <?php while($product = $products->fetch(PDO::FETCH_OBJ)): ?>
            <div class="product">
                <a href="<?=base_url?>product/show&id=<?=$product->id?>">
                    <?php if($product->imagen != null): ?>
                        <img src="<?=base_url?>/uploads/images/<?=$product->imagen?>">
                    <?php else: ?>
                        <img src="<?=base_url?>/uploads/images/default.jpg">
                    <?php endif; ?>
                    <h2><?=$product->nombre?></h2>    
                </a>
                <p><?=$product->precio?></p>
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <h3>No hay productos en esta categoria</h3>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif;?>
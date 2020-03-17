<h1>Algunos de nuestros productos</h1>

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

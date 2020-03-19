<?php if (isset($prod)): ?>
    <h1><?=$prod->nombre?></h1>

    <div id="detail-product">
        <div class="image">
            <?php if($prod->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>">
            <?php else: ?>
                <img src="<?=base_url?>uploads/images/default.jpg">
            <?php endif; ?>
        </div>

        <div class="data">
            <p class="description"><?=$prod->nombre?></p>
            <p class="price"><?=$prod->precio?>$</p>
            <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <?=header('Location: ' . base_url . 'product/gestion')?>;
<?php endif;?>

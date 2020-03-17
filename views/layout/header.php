<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css"/>
</head>
<body>
<div id="container">
    <!-- CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/images/RM.jpg" alt="camiseta logo"/>
            <a href="index_maqueta.php">TIENDA DE CAMISETAS</a>
        </div>
    </header>

    <!-- MENU -->
    <?php $categories = Util::showCategories() ?>
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
            <?php while($category = $categories->fetch(PDO::FETCH_OBJ)): ?>
                <li>
                    <a href="<?=base_url?>category/show&id=<?=$category->id?>"><?=$category->nombre?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </nav>
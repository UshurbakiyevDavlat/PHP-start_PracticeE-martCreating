<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/font-awesome.min.css" rel="stylesheet">
    <link href="template/css/prettyPhoto.css" rel="stylesheet">
    <link href="template/css/price-range.css" rel="stylesheet">
    <link href="template/css/animate.css" rel="stylesheet">
    <link href="template/css/main.css" rel="stylesheet">
    <link href="template/css/responsive.css" rel="stylesheet"
    <!--[if lt IE 9]>
    <script src="template/js/html5shiv.js"></script
    <script src="template/js/respond.min.js"></script>/template/
    <![endif]-->
    <!--    <link rel="shortcut icon" href="/template/images/ico/favicon.ico">-->
    <!--    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">-->
    <!--    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">-->
    <!--    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">-->
    <!--    <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">-->
</head><!--/head-->

<body>
<?php include "view/layouts/header.php";?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="index.php/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach ($latestProd as $latItem):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="template/images/home/product1.jpg" alt="" />
                                        <h2>$ <?php echo $latItem['price'];?></h2>
                                        <p><?php echo $latItem['name'];?></p>
                                        <a href="index.php/products/<?php echo $latItem['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if($latItem['is_new']):?>
                                        <img src="template/images/home/new.png" class ="new" alt=""/>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>


<?php include "view/layouts/footer.php";?>

<script src="template/js/jquery.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/jquery.scrollUp.min.js"></script>
<script src="template/js/price-range.js"></script>
<script src="template/js/jquery.prettyPhoto.js"></script>
<script src="template/js/main.js"></script>
</body>
</html>
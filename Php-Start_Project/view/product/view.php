<!DOCTYPE html>
<base href="http://localhost/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php" />
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Товар</title>
    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/font-awesome.min.css" rel="stylesheet">
    <link href="template/css/prettyPhoto.css" rel="stylesheet">
    <link href="template/css/price-range.css" rel="stylesheet">
    <link href="template/css/animate.css" rel="stylesheet">
    <link href="template/css/main.css" rel="stylesheet">
    <link href="template/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="template/js/html5shiv.js"></script>
    <script src="template/js/respond.min.js"></script>
    <![endif]-->
<!--    <link rel="shortcut icon" href="images/ico/favicon.ico">-->
<!--    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">-->
<!--    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">-->
<!--    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">-->
<!--    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">-->
</head><!--/head-->template/

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
                                        <a href="index.php/category/<?php echo $categoryItem['id'];?>"
                                           class = "<?php if ($categoryItem['id']==$category_id) echo "active";?>"
                                        >
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
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="template/images/product-details/1.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2><?php echo $product['name'];?></h2>
                                <p>Код товара: <?php echo $product['code'];?></p>
                                <span>
                                            <span>US $ <?php echo $product['price'];?></span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                <p><b>Наличие:</b>
                                    <?php
                                    if($product['availability']) echo "На складе";
                                    else echo "Отсутствует";
                                    ?>
                                </p>
                                <p><b>Состояние:</b> <?php
                                    if($product['is_new']) echo "Новое";
                                    else echo "Старая коллекция";
                                    ?>
                                </p>
                                <p><b>Производитель:</b> <?php echo $product['brand'];?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p>Разнообразный и богатый опыт постоянный количественный рост и
                                сфера нашей активности требуют определения и уточнения направлений
                                прогрессивного развития. Таким образом реализация намеченных плановых
                                заданий требуют определения и уточнения форм развития.</p>
                            <p>Повседневная практика показывает, что новая модель организационной
                                деятельности способствует подготовки и реализации позиций, занимаемых
                                участниками в отношении поставленных задач. Таким образом постоянное
                                информационно-пропагандистское обеспечение нашей деятельности влечет
                                за собой процесс внедрения и модернизации форм развития.</p>
                            <p>Повседневная практика показывает, что новая модель организационной
                                деятельности способствует подготовки и реализации позиций, занимаемых
                                участниками в отношении поставленных задач. Таким образом постоянное
                                информационно-пропагандистское обеспечение нашей деятельности влечет
                                за собой процесс внедрения и модернизации форм развития.</p>
                            <p>Повседневная практика показывает, что новая модель организационной
                                деятельности способствует подготовки и реализации позиций, занимаемых
                                участниками в отношении поставленных задач. Таким образом постоянное
                                информационно-пропагандистское обеспечение нашей деятельности влечет
                                за собой процесс внедрения и модернизации форм развития.</p>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br/>
<br/>

<?php include "view/layouts/footer.php";?>



<script src="template/js/jquery.js"></script>
<script src="template/js/price-range.js"></script>
<script src="template/js/jquery.scrollUp.min.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/jquery.prettyPhoto.js"></script>
<script src="template/js/main.js"></script>
</body>
</html>

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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach ($categoryProd as $catProd):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="template/images/home/product1.jpg" alt="" />
                                        <h2>$ <?php echo $catProd['price'];?></h2>
                                        <p><?php echo $catProd['name'];?></p>
                                        <a href="index.php/products/<?php echo $catProd['id'];?>" class="btn btn-default"><i class="fa "></i>Подробнее</a>
                                        <a href="index.php/cart/addToCart/<?php echo $catProd['id'];?>" class="btn btn-default add-to-cart"  data-id = "<?php
                                        echo $catProd['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if($catProd['is_new']):?>
                                        <img src="template/images/home/new.png" class ="new" alt=""/>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <?php echo $pagination->get();?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>


<?php include "view/layouts/footer.php";?>


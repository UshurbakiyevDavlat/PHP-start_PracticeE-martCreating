
<?php include_once "view/layouts/header.php";?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categories as $category): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#"><?php echo $category['name'];?></a></h4>
                            </div>
                        </div>
                        <?php  endforeach;?>
                    </div><!--/category-products-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Последние записи в блоге</h2>
                    <?php foreach ($news as $article):?>
                    <div class="single-blog-post">
                        <h3><?php echo $article['title'];?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?php echo $article['date']; ?></li>
<!--                                <li><i class="fa fa-clock-o"></i> 13:33</li>-->
                            </ul>
                        </div>
                        <a href="">
                            <img src="template/images/blog/blog-one.jpg" alt="">
                        </a>
                        <p><?php echo $article['short_content'] ?> </p>
                            <a  class="btn btn-primary" href="index.php/blog/Bitem/<?php echo $article['id']; ?>">Читать полностью</a>
                    </div>
                    <hr>
                    <?php endforeach; ?>

                    <?php echo $pagination->get();?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'view/layouts/footer.php'; ?>
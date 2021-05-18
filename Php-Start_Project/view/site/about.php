<?php include_once 'view/layouts/header.php';?>


<section>
    <div class = "container">
        <div class = "row">
            <div>
                <h1>About us</h1>
                    <h2>Lable of the market: <?php echo $info['name'];?></h2>
                    <h2>Phone number: <?php echo $info['phone'];?></h2>
                    <h2>Address of the office: <?php echo $info['address'];?></h2>
                <h2>
                    <p>
                        <?php echo $info['description']; ?>
                    </p>
                </h2>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<?php include_once 'view/layouts/footer.php';?>

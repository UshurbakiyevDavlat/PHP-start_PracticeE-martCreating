<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p><a href="index.php/site/contact"><i class="fa fa-lock"></i> Свяжитесь с нами!</a></p>
                <p class="pull-left">Copyright © 2021</p>
                <p class="pull-right">Курс PHP Start</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->
<script src="template/js/jquery.js"></script>
<script src="template/js/price-range.js"></script>
<script src="template/js/jquery.scrollUp.min.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/jquery.prettyPhoto.js"></script>
<script src="template/js/main.js"></script>

<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("index.php/cart/addAjax/" + id,function (data) {
                var arr = data.split(" />");
                $("#cart-count").html(arr[arr.length-1]);
            });
            return false;
        });
    });
</script>
</body>
</html>
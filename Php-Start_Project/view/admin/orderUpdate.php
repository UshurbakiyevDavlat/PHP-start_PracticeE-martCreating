<?php  require_once 'view/layouts/header_admin.php';?>

<form method="post">

    <label>
        UserName: <input type="text" name = 'userName' value="<?php echo $order['userName'];?>">
    </label>
    <br>
    <label>
        UserPhone: <input type="text" name = 'userPhone' value="<?php echo $order['userPhone'];?>">
    </label>
    <br>
    <label>
        UserComment: <input type="text" name = 'userCommentary' value="<?php echo $order['userComment'];?>">
    </label>
    <br>

        OrderProducts: <label>
        <textarea name = 'Products'><?php echo $order['Products'];?></textarea>
    </label>
    <br>
    <label>
        UserId: <input type="text" name = 'user_id' value="<?php echo $order['user_id'];?>">
    </label>
    <br>
    <label>
        dateOfAnOrder: <input type="date" name = 'date_of_an_order' value="<?php echo $order['date_of_an_order'];?>">
    </label>
<br>
        <input type="submit" name="submit" value="Редактировать"/>
</form>
<?php  require_once 'view/layouts/footer_admin.php';?>

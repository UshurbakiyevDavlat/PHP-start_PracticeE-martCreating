<?php  require_once 'view/layouts/header_admin.php';?>

<form method="post">

    <label>
        Name: <input type="text" name = 'name' value="<?php echo $categories['name'];?>">
    </label>
    <br>
    <label>
        Sort-order:
        <select name="sort_order">
            <option <?php if($categories['sort_order']==1)echo "selected";?>>1</option>
            <option <?php if($categories['sort_order']==0)echo "selected";?>>0</option>
        </select>
    </label>
    <br>
    <label>
        Hidden:
        <select name="hid">
            <option <?php if($categories['status']==0)echo "selected";?>>yes</option>
            <option <?php if($categories['status']==1)echo "selected";?>>no</option>
        </select>
    </label>
    <br>
    <input type="submit" name="submit" value="Редактировать"/>

</form>
<?php  require_once 'view/layouts/footer_admin.php';?>

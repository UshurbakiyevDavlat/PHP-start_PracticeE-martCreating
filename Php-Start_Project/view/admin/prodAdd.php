<?php  require_once 'view/layouts/header_admin.php';?>

<form method="post" enctype="multipart/form-data">

    <label>
        Article: <input type="text" name = 'article'>
    </label>
    <br>
    <label>
        Name: <input type="text" name = 'name'>
    </label>
    <br>
    <label>
        category:
        <select name="category">
            <?php foreach ($categories as $category):?>
                <option><?php echo $category['name'];?></option>
            <?php endforeach; ?>
        </select>

    </label>
    <br>
    <label>
        price: <input type="text" name = "price">
    </label>
    <br>
    <label>
        Availability:
        <select name="availability">
            <option>В наличии</option>
            <option>Под заказ</option>
        </select>
    </label>
    <br>
    <label>
        Brand: <input type="text" name = "brand">
    </label>
    <br>
    <label>
        Image: <input type="file" name = "image" >
    </label>
    <br>
    <label>
        Description: <input type="text" name = "description">
    </label>
    <br>
    <label>
        New:
        <select name="new">
            <option>yes</option>
            <option>no</option>
        </select>
    </label>
    <br>
    <label>
        Recomended:
        <select name="rec">
            <option>yes</option>
            <option>no</option>
        </select>
    </label>
    <br>
    <label>
        Hidden:
        <select name="hid">
            <option>yes</option>
            <option>no</option>
        </select>
    </label>
    <br>
    <input type="submit" name="submit" value="Редактировать"/>

</form>
<?php  require_once 'view/layouts/footer_admin.php';?>

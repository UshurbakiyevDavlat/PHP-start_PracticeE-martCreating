<?php  require_once 'view/layouts/header_admin.php';?>
<form method="post" enctype="multipart/form-data">

    <label>
       Article: <input type="text" name = 'article' value="<?php echo $product['code'];?>">
    </label>
    <br>
    <label>
        Name: <input type="text" name = 'name' value="<?php echo $product['name'];?>">
    </label>
    <br>
    <label>
        category:
        <select name="category">
            <?php foreach ($categories as $category):?>
            <option <?php if($category['id'] == $product['category_id']) echo "selected";?>><?php echo $category['name'];?></option>
            <?php endforeach; ?>
        </select>

    </label>
    <br>
    <label>
        price: <input type="text" name = "price" value="<?php echo $product['price'];?>">
    </label>
    <br>
    <label>
        Availability:
        <select name="availability">
            <option <?php if ($product['availability']==1) echo "selected"?>>В наличии</option>
            <option <?php if ($product['availability']==0) echo "selected"?>>Под заказ</option>
        </select>
    </label>
    <br>
    <label>
        Brand: <input type="text" name = "brand" value="<?php echo $product['brand'];?>">
    </label>
    <br>
    <label>
        <img src="<?php  if(is_file($path))echo $path; else echo $altImg; ?>" alt="нет доступа к файловой системе" width="200">
        <br>
        Image: <input type="file" name = "image" >
    </label>
    <br>
    <label>
        Description: <input type="text" name = "description" value="<?php echo $product['description'];?>">
    </label>
    <br>
    <label>
        New:
        <select name="new">
            <option <?php if($product['is_new'] == 1)echo "selected"?>>yes</option>
            <option <?php if($product['is_new'] == 0)echo "selected"?>>no</option>
        </select>
    </label>
    <br>
    <label>
        Recomended:
        <select name="rec">
            <option <?php if($product['is_recommended'] == 1)echo "selected"?>>yes</option>
            <option <?php if($product['is_recommended'] == 0)echo "selected"?>>no</option>
        </select>
    </label>
    <br>
    <label>
        Hidden:
        <select name="hid">
            <option <?php if($product['status'] == 1)echo "selected"?>>no</option>
            <option <?php if($product['status'] == 0)echo "selected"?>>yes</option>
        </select>
    </label>
    <br>
    <input type="submit" name="submit" value="Редактировать"/>

</form>
<?php  require_once 'view/layouts/footer_admin.php';?>

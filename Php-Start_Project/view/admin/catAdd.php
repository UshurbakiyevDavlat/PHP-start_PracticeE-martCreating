<?php  require_once 'view/layouts/header_admin.php';?>

<form method="post">

    <label>
        Name: <input type="text" name = 'name'>
    </label>
    <br>
    <label>
        Sort-order:
        <select name="sort_order">
            <option>1</option>
            <option>0</option>
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
    <input type="submit" name="submit" value="Добавить"/>

</form>
<?php  require_once 'view/layouts/footer_admin.php';?>

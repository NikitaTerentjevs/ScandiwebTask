<!--
Scandiweb assigment task by Nikita Terentjevs
Task: Create 2 web pages :
            1)product list    //displays products from database
            2)product add
Product has:
    SKU (Storage keeping unit)
    Name
    Price
    Special Attributes (depends on type of product):
        DVD-disk: Size (in MB)
        Book: Weight (in Kg)
        Furniture: Dimensions (HxWxL)

Software used to create project:
    PHPStorm - code writing
    XAMPP - server local hosting
    Chrome - displaying pages in browser
-->
<?php
include 'includes/index-autoloader.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/index-style.css">

</head>
<body >
    <h1>Product List</h1>
    <form action="./TempHtml/confirm.php" method="post"><input type="submit" value="Apply" >
        <select id="items" name="option">
            <option value="none" >None</option>
            <option value="mass-delete">Mass delete</option>
        </select>
        <div class="row">
            <?php
            $menuObj = new MenuView();
            $menuObj->showItems();
            ?><div class="col-lg-3 col-md-6 col-sm-12">
                <br><br><a href="TempHtml/product-add.php">Add new product</a><br>

            </div>
        </div>
    </form>
</body>
</html>
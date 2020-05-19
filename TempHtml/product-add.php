<?php
include '../includes/temphtml-autoloader.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>

        <form action="addingProcess.php" method="post">
        <label for="sku">SKU</label>
        <input type="text" name="sku"><br>

        <label for="pr-name">Product Name</label>
        <input type="text" name="pr-name"><br>

        <label for="price">Price</label>
        <input type="text" name="price"><br>



        <label for="pr-type">Type switcher</label>
        <select name="pr-type" id="pr-type">
            <option value="none" selected="selected" disabled="disabled">--Select--</option>
            <option value="book">Book</option>
            <option value="diskdvd">DVD Disk</option>
            <option value="furniture">Furniture</option>
        </select><br>

<!--        Every product has SpecAttribute:-->
<!--        Book=>weight-->
<!--        DVDDisk=>size-->
<!--        Furniture=> height,width,length-->

            <label for="spec1">1st Special Attribute</label>
            <input type="text" name="spec1"><br>
            <label for="spec2">2nd Special Attribute</label>
            <input type="text" name="spec2"><br>
            <label for="spec3">3rd Special Attribute</label>
            <input type="text" name="spec3"><br>

        <input type="submit" value="Save">
    </form>

</body>
</html>

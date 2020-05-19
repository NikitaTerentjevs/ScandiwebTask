<?php
include '../includes/temphtml-autoloader.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function goBack(){
    header('Location: ../index.php');
}
    if($_POST['option']=='none' || $_POST['items']==NULL){       //Redirects back if option is 'none' or there are no items selected
        goBack();
    }
    else{
        $controller = new MenuContr();
    }
    foreach ($_POST['items'] as $key => $value) {       // to get all selected items and delete them one by one
        $controller->removeItem($value);
    }
    goBack();
    ?>

</body>
</html>

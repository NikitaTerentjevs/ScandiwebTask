<?php
include '../includes/temphtml-autoloader.php';

function returnHome(){
    header('Location: ../index.php');
}
function goBack(){
    header('Location: product-add.php');
}

$controller = new MenuContr();

//saving data in variable
$sku = $_POST['sku'];
$prName = $_POST['pr-name'];
$price = $_POST['price'];
$type = $_POST['pr-type'];
$spec = $_POST['spec1'];


$intVar = 2;        //if item has more than 1 special attribute,adds all specAttribute data to spec variable with delimiter "_"
while(isset($_POST['spec'.$intVar])&&$_POST['spec'.$intVar] !=""){
    $spec .= "_".$_POST['spec'.$intVar];
    $intVar++;
}

$product= new $type($sku,$prName,$price,$spec);  //can through exception if type is incorrect


//if product added, return to index page, else return to product add page
if($controller->createItem($product)){
    returnHome();
}
else{
    goBack();
}




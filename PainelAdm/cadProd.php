<?php

include('../conexao.php');

$img = $_FILES['img'];
$desc = $_POST['desc'];
$price = $_POST['price'];

if(empty($img) && empty($desc) && empty($price)) {
    header('Location: painelAdm.php');
    exit();
}else{
    $encurtarFile = strtolower(substr($img['name'], -4));
    $newName = md5(time()) . $encurtarFile;
    $uploadDir = "upload/";

    move_uploaded_file($img['tmp_name'], $uploadDir . $newName);

    $sql = "INSERT INTO prod (img, `desc`, price, idprod) VALUES ('$newName', '$desc', '$price', NULL)";
    $query = mysqli_query($conexao, $sql);

    if($query > 0) {
        header('Location: painelAdm.php?msg=prodCadTru');
    }
}
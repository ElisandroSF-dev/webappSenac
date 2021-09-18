<?php

include('../../conexao.php');

$img = $_FILES['img'];
$desc = $_POST['desc'];
$price = $_POST['price'];

$alt = $_POST['altid'];

$oldPic = $_POST['oldphoto'];

$encurtarFile = strtolower(substr($img['name'], -4));

echo $encurtarFile;
echo "___";
echo $oldPic;

if (empty($img) && empty($desc) && empty($price)) {
    header('Location: altProd.php');
    exit();
} else {
    $pasta = "../upload/";

    $newName = md5(time()) . $encurtarFile;
    $uploadDir = "../upload/";
    if ($encurtarFile != "") {
        move_uploaded_file($img['tmp_name'], $uploadDir . $newName);

        $sql = "UPDATE prod SET 
                   img = '$newName',
                   `desc` = '$desc',
                   price = '$price' 
            WHERE `prod` . `idprod` = '$alt'";

        $query = mysqli_query($conexao, $sql);
        unlink($pasta . $oldPic);
        header('Location: ../painelAdm.php?msg=altProdTru');
    } else {
        $sqlNoImg = "UPDATE prod SET 
                       `desc` = '$desc',
                       price = '$price' 
            WHERE `prod` . `idprod` = '$alt'";

        $queryNoImg = mysqli_query($conexao, $sqlNoImg);
        header('Location: ../painelAdm.php?msg=altProdTru');
    }
}

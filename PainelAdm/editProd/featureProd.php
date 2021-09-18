<?php

include_once('../../conexao.php');

$idProd = $_POST['ftrprod'];

$sql = "UPDATE prod SET featured = 'true' WHERE prod.idprod = '$idProd'";
$sqlrm = "UPDATE prod SET featured = 'false' WHERE prod.idprod = '$idProd'";
$sqlVer = "SELECT featured FROM prod WHERE prod.idprod = '$idProd'";

$getQuery = mysqli_query($conexao, $sqlVer);
$isFeatured = mysqli_fetch_row($getQuery)[0];

if ($isFeatured == 'true') {
    $rmFtr = mysqli_query($conexao, $sqlrm);

    if($rmFtr > 0) {
        header('Location: ../painelAdm.php?msg=rmftr');
    }
} else if($isFeatured == 'false'){
    $query = mysqli_query($conexao, $sql);

    if ($query > 0) {
        header('Location: ../painelAdm.php?msg=10taq');
    }
}


echo $idProd;

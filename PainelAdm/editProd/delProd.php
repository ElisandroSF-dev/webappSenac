<?php
    include('../../conexao.php');

    $del = $_POST['delprod'];
    $imagem = $_POST['imagem'];

    $sqlDel = "DELETE FROM prod WHERE idprod = '$del'";
    $delQuery = mysqli_query($conexao, $sqlDel);

    echo $delQuery;
    echo $del;

    $dir = "../upload/";
    $apagar = unlink($dir.$imagem);

    if($delQuery > 0 && $apagar) {
        header('Location: ../painelAdm.php?msg=delprodTru');
        exit();
    }
?>
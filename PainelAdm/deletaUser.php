<?php
    include('../conexao.php');

    $del = $_POST['delUser'];
    $sqlDel = "DELETE FROM user WHERE id = '$del'";
    $delQuery = mysqli_query($conexao, $sqlDel);

    echo $delQuery;

    if($delQuery > 0) {
        header('Location: painelAdm.php?msg=delTru');
        exit();
    }
?>
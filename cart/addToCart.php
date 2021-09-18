<?php
include("../conexao.php");

$itemId = $_POST['idprod-cart'];
$userId = $_POST['user'];
settype($userId, 'int');

$sqlVer = "SELECT cart FROM user WHERE id = '$userId'";

$queryVer = mysqli_query($conexao, $sqlVer);
$atualValor = mysqli_fetch_row($queryVer);
$valorTotal = $atualValor[0] . ',' . $itemId . ',';

if ($atualValor[0] == 0) {
    $atualValor[0] = null;
    $valorTotal = $itemId . ',';
}

echo gettype($userId);
echo $valorTotal;



$bool = false;

$sqlCart = "SELECT cart FROM user WHERE id = '$userId'";
$queryCart = mysqli_query($conexao, $sqlCart);
$cartValue = mysqli_fetch_row($queryCart)[0];
$cartQtd = explode(",", $cartValue, -1);

echo count($cartQtd);

for ($i = 0; count($cartQtd) > $i; $i++) {
    if ($cartQtd[$i] == $itemId) {
        header('Location: ../home/home.php');
        $bool = true;
    }
}

if (!$bool) {
    $sql = "UPDATE user SET cart = '$valorTotal' WHERE user.id = '$userId'";
    $query = mysqli_query($conexao, $sql);
    echo $sql;

    if ($query > 0) {
        header('Location: ../home/home.php');
    }
}



/*erro verifica

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
}

// Perform a query, check for error
if (!$conexao->$query) {
    echo ("Error description: " . $conexao->error);
}
*/

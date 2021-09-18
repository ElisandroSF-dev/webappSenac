<?php
include_once('../conexao.php');
session_start();

$idprod = "," . $_POST['idprod-cart'] . ",";
$user = $_POST['usuario'];

$sql = "SELECT cart FROM user WHERE id = '$user'";

$query = mysqli_query($conexao, $sql);
$valor = mysqli_fetch_row($query)[0];

$newValor = str_replace($idprod, "", $valor);

$cartIds = explode(",", $newValor, -1);

$listaOrdenada = array_slice($cartIds, 0);

for ($i = 0; count($listaOrdenada) > $i; $i++) {
    if ($listaOrdenada[$i] === "") {
        unset($listaOrdenada[$i]);
    }
}

$sqlrm = "UPDATE user SET cart = '$newValor' WHERE user.id = '$user'";
$rmFromCart = mysqli_query($conexao, $sqlrm);

if($rmFromCart > 0) {
    header('Location: ../home/home.php');
}

print_r($listaOrdenada);
echo "usuario: " . $user . "; ";
echo "produto: " . $idprod . "; ";

echo "valor: " . $newValor;

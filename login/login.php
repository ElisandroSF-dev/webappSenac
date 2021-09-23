<?php
include('../conexao.php');
session_start();

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../index.php');
    exit();
};

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

//Login verify

$query = "select email from user where email = '$email' and senha = '$senha'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

$nome = "select nome from user where email = '$email' and senha = '$senha'";
$id = "select id from user where email = '$email' and senha = '$senha'";


$pesquisa = mysqli_query($conexao, $nome);
$linhasAfetadas = mysqli_num_rows($pesquisa);
$nomeArray = mysqli_fetch_row($pesquisa);

$idQuery = mysqli_query($conexao, $id);
$idNum = mysqli_fetch_row($idQuery);


if ($email == "soyadmin@ademar.adm" && $senha == '399be72dcee0070ca04fab82f550ccc7') {
    $_SESSION['adm'] = "Ademiro";

    header('Location: ../PainelAdm/PainelAdm.php?msg=admOn');
    exit();
} else if ($row == 1) {
    $_SESSION['nome'] = $nomeArray[0];
    $_SESSION['senha'] = $senha;


    header("Location: ../painel.php?msg=true");
    exit();
} else {
    header("Location: formLogin.php?msg=err02");
}
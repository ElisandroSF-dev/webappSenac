<?php
include('../conexao.php');
session_start();

if (
    empty($_POST['email']) &&
    empty($_POST['senha']) &&
    empty($_POST['nome']) &&
    empty($_POST['rua']) &&
    empty($_POST['casa']) &&
    empty($_POST['cidade']) &&
    empty($_POST['estado']) &&
    empty($_POST['bairro']) &&
    empty($_POST['cep'])
) {
    session_destroy();
    header('Location: ../index.php');
    exit();
} else {
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha =  mysqli_real_escape_string($conexao, md5($_POST['senha']));
    $nome =  mysqli_real_escape_string($conexao, $_POST['nome']);
    $rua =  mysqli_real_escape_string($conexao, $_POST['rua']);
    $casa = mysqli_real_escape_string($conexao, $_POST['casa']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cep =  mysqli_real_escape_string($conexao, $_POST['cep']);

    //pesquisas sql;

    //Verificar dados já cadastrados;
    $queryEquals = "SELECT * FROM user WHERE email = '$email'";
    $verEquals = mysqli_query($conexao, $queryEquals);
    $verificarLinhas = mysqli_num_rows($verEquals);

    if ($verificarLinhas > 0) {
        unset($_SESSION['nome']);
        header("Location: ../login/formLogin.php?msg=err01");
    } else {

        unset($_SESSION['display']);

        $query = "INSERT INTO `user` (`email`, `nome`, `senha`, `rua`, `casa`, `bairro`, `cidade`, `estado`, `cep`) 
    VALUES ('$email', '$nome', '$senha', '$rua', '$casa', '$bairro', '$cidade', '$estado', '$cep')";

        $insert = mysqli_query($conexao, $query);

        if ($insert) {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: ../painel.php?msg=true');
        }

        //erro verifica

        if ($conexao->connect_errno) {
            echo "Failed to connect to MySQL: " . $conexao->connect_error;
            exit();
        }

        // Perform a query, check for error
        if (!$conexao->$insert) {
            echo ("Error description: " . $conexao->error);
        }

        $conexao->close();
    }
}

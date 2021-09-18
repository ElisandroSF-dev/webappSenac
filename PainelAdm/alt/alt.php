<?php
    include('../../conexao.php');

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $nome =  mysqli_real_escape_string($conexao, $_POST['nome']);
    $rua =  mysqli_real_escape_string($conexao, $_POST['rua']);
    $casa = mysqli_real_escape_string($conexao, $_POST['casa']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cep =  mysqli_real_escape_string($conexao, $_POST['cep']);

    $alt = $_POST['submit'];

    $queryAlt = "UPDATE `user` SET 
        `email` = '$email',
        `nome` = '$nome',
        `rua` = '$rua', 
        `casa` = '$casa', 
        `bairro` = '$bairro', 
        `cidade` = '$cidade', 
        `estado` = '$estado', 
        `cep` = '$cep' 
        WHERE `user`.`id` = '$alt'";
    
    $execute = mysqli_query($conexao, $queryAlt);

    if($execute > 0) {
        header('Location: ../painelAdm.php?msg=altTrue');
        exit();
    }
?>
<?php
    include_once('conexao.php');
    session_start();
    if(empty($_SESSION['nome'])) {
        header('Location: index.php');
    }else{
        $nome = $_SESSION['nome'];
        $senha = $_SESSION['senha'];

        $sql = "SELECT id FROM user WHERE nome = '$nome' AND senha = '$senha'";
        $query = mysqli_query($conexao, $sql);
        $res = mysqli_fetch_row($query)[0];
        
        $_SESSION['userid'] = $res;
        header('Location: home/home.php');
    }

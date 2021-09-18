<?php

define('HOST', 'localhost');
define('USUARIO', 'ZandSafrei');
define('SENHA', 'LostFrequencies');
define('DB', 'login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possivel conectar');


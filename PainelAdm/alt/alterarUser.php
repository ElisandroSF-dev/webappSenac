<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
</head>
<body>
<?php
include('../../conexao.php');

$alt = $_POST['altUser'];

$query = "SELECT * FROM user WHERE id = '$alt'";
$res = mysqli_query($conexao, $query);

$listarDados = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach ($listarDados as $key => $valor) {
    print_r('
        <div class="container col-sm-3 text-center centered-item">
        <form action="alt.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" value="'.$valor['email'].'" name="email" class="form-control" placeholder="'.$valor['email'].'" aria-label="Email" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input type="text" value="'.$valor['nome'].'" name="nome" class="form-control" placeholder="'.$valor['nome'].'" aria-label="Nome de usuario" aria-describedby="basic-addon2">
            </div>

            <label for="basic-url" class="form-label">
                Endereço
            </label>

            <div class="input-group mb-3">
                <span class="input-group-text">Cep</span>
                <input type="number" id="cep" value="'.$valor['cep'].'" placeholder="'.$valor['cep'].'" class="form-control" name="cep">
            </div>

            <div class="input-group mb-3">
                <input type="text" name="rua" id="rua" value="'.$valor['rua'].'" class="form-control" placeholder="'.$valor['rua'].'">
                <span class="input-group-text">Nº</span>
                <input type="number" class="form-control" value="'.$valor['casa'].'" id="casa" name="casa" placeholder="'.$valor['casa'].'" aria-label="Server">
            </div>

            <div class="input-group">
                <span class="input-group-text">Bairro</span>
                <input type="text" id="bairro" class="form-control" value="'.$valor['bairro'].'" placeholder="'.$valor['bairro'].'" name="bairro">
            </div>
            <br/>
            <div class="input-group">
                <input type="text" name="cidade" id="cidade" class="form-control" value="'.$valor['cidade'].'" placeholder="'.$valor['cidade'].'">
                <span class="input-group-text">Estado</span>
                <input type="text" value="'.$valor['estado'].'" placeholder="'.$valor['estado'].'" class="form-control" id="estado" name="estado" aria-label="Server">
            </div>
            <br />
            <button type="submit" value = "'.$valor['id'].'" name="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

        ');
}
?>

<script src="../../bootstrap/js/bootstrap.js"></script>
<script src="altScripts.js" type="text/javascript"></script>

</body>
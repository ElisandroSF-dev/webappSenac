<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastroStyles.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <div class="container col-sm-3 text-center centered-item">
        <form action="cadastrando.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" name="email" class="form-control" placeholder="Seu email" aria-label="Email" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input type="text" name="nome" class="form-control" placeholder="Nome de usuario" aria-label="Nome de usuario" aria-describedby="basic-addon2">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Senha</span>
                <input type="password" name="senha" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>

            <label for="basic-url" class="form-label">
                Endereço
            </label>

            <div class="input-group mb-3">
                <span class="input-group-text">Cep</span>
                <input type="number" id="cep" class="form-control" name="cep">
            </div>

            <div class="input-group mb-3">
                <input type="text" name="rua" id="rua" class="form-control" placeholder="Endereço">
                <span class="input-group-text">Nº</span>
                <input type="number" class="form-control" id="casa" name="casa" placeholder="numero da residencia" aria-label="Server">
            </div>

            <div class="input-group">
                <span class="input-group-text">Bairro</span>
                <input type="text" id="bairro" class="form-control" name="bairro">
            </div>
            <br/>
            <div class="input-group">
                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="cidade">
                <span class="input-group-text">Estado</span>
                <input type="text" class="form-control" id="estado" name="estado" aria-label="Server">
            </div>
            <br />
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>



    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="scripts.js" type="text/javascript"></script>
</body>

</html>
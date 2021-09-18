<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
</head>

<body>
    <?php
    include('../../conexao.php');

    $alt = $_POST['altprod'];
    
    $query = "SELECT * FROM prod WHERE idprod = '$alt'";
    $res = mysqli_query($conexao, $query);

    $listarDados = mysqli_fetch_all($res, MYSQLI_ASSOC);

    foreach ($listarDados as $key => $valor) {
        print_r('
        <div class="container col-md-4">
        <!-- Info -->
        <blockquote class="text-center blockquote">
            <p>Editar este produto</p>
        </blockquote>
        <!-- formulario -->
        <form action="alt.php" enctype="multipart/form-data" method="POST">

            <div class="mb-3">
                <label for="formFile" class="w-100 text-center form-label">A foto</label>
                <input name="img" value="'.$valor['img'].'" class="form-control" type="file" id="formFile">
                <input value="'.$valor['img'].'" style="display: none;" name="oldphoto" type="text">

                <label class="text-center card">
                    Imagem atual:
                    <img class="card-img-top" src="../upload/'.$valor['img'].'" />
                <label>
            </div>

            <div class="input-group">
                <span class="input-group-text">Descrição</span>
                <textarea name="desc" class="form-control" aria-label="With textarea">'.$valor['desc'].'</textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Preço</span>
                <span class="input-group-text">R$</span>
                <input value="'.$valor['price'].'" placeholder="'.$valor['price'].'" name="price" type="number" class="form-control">
                <input value="'.$alt.'" name="altid" style="display: none;" type="number">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="submit">Feito!</button>
            </div>
        </form>
        </div>
    ');
    }
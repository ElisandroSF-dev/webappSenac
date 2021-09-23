<?php
include('../conexao.php');
session_start();
if(empty($_SESSION['adm'])) {
    header('Location: ../index.php');
}
if ($_GET['msg'] == "true") {
    header('Location: ../index.php');
}
?>

<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>
            Olá,
            <strong>
                Ademir
            </strong>
            <?php
            echo $_SESSION['adm'];
            ?>
        </div>
    </div>

    <!-- Alerta de resposta da ação -->

    <?php

    if ($_GET['msg'] == "delTru") {
        print_r('
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                <div>
                    Usuario deletado.
                </div>
            </div>
            ');
    }
    ?>

    <!-- Lista de usuarios -->

    <div class="container">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cep</th>
                    <th scope="col">Residencia</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = 'SELECT * FROM user';
                $res = mysqli_query($conexao, $query);

                $listarUsuarios = mysqli_fetch_all($res, MYSQLI_ASSOC);

                foreach ($listarUsuarios as $key => $valor) {
                    print_r('
                        <tr>
                        <th scope="row">' . $valor["id"] . '</th>
                        <td>' . $valor["nome"] . '</td>
                        <td>' . $valor["email"] . '</td>
                        <td>' . $valor["cep"] . '</td>
                        <td>' . $valor["casa"] . '</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-4">
                                    <form action="deletaUser.php" method="POST">
                                        <button type="submit" value="' . $valor['id'] . '" name="delUser" id="del-btn" class="btn btn-danger">Excluir</button>
                                    </form> 
                                </div>    
                                <div class="col-sm-4">
                                    <form action="alt/alterarUser.php" method="POST">
                                        <button type="submit" value="' . $valor['id'] . '" name="altUser" id="del-btn" class="btn btn-warning">Alterar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                        ');
                }
                ?>
            </tbody>
        </table>
        <hr />
        <!-- Adicionar produto -->

        <div class="container col-md-4">
            <!-- Info -->
            <blockquote class="text-center blockquote">
                <p>Adicionar um novo produto</p>
            </blockquote>
            <!-- formulario -->
            <form action="cadProd.php" enctype="multipart/form-data" method="POST">

                <div class="mb-3">
                    <label for="formFile" class="form-label">A foto</label>
                    <input name="img" class="form-control" type="file" id="formFile" required>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Descrição</span>
                    <textarea name="desc" class="form-control" aria-label="With textarea" required></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Preço</span>
                    <span class="input-group-text">R$</span>
                    <input name="price" type="number" class="form-control" required>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Listar e editar produtos -->

    <section class="">

<div class="container">
    <div class="row justify-content-center">
        <?php
        $query = 'SELECT * FROM prod';
        $res = mysqli_query($conexao, $query);

        $listarProd = mysqli_fetch_all($res, MYSQLI_ASSOC);

        foreach ($listarProd as $key => $valor) {
            $featured = $valor['featured'];
            $color = "btn-dark";
            switch($featured) {
                case 'false': 
                    $color = "btn-secondary";
                    break;
                case 'true': 
                    $color = "btn-success";
                    break;
            }
            print_r('
                <div class="prod-iten col-8 col-lg-3">
                    <div class="card" style="min-width: 200px;">
                        <img src="upload/' . $valor['img'] . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">R$' . $valor['price'] . '</h5>
                            <p class="card-text">' . $valor['desc'] . '</p>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <form action="editProd/delProd.php" method="POST">
                                        <input style="display: none;" name="imagem" value="'.$valor['img'].'"></input>
                                        <button name="delprod" value="'.$valor['idprod'].'" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>    
                                <div class="col-sm-4">
                                    <form action="editProd/altProd.php" method="POST">
                                        <button value="' . $valor['idprod'] . '" name="altprod" class="btn btn-warning">Alterar</button>
                                    </form>
                                </div>
                                <div class="col-sm-4 p-1">
                                    <form action="editProd/featureProd.php" method="POST">
                                        <button value="' . $valor['idprod'] . '" name="ftrprod" class="btn '.$color.'">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <br />
                </div> 
                ');
        }
        ?>
    </div>
</div>
</section>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
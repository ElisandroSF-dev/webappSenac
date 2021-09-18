<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
</head>

<body>

    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Seu Carrinho!</a>
            <div class="d-flex">
                <a href="../../home/home.php" class="btn btn-outline-warning bg-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <hr> <br>

    <div class="container">
        <div class="row justify-content-center">
            <?php
            include_once('../../conexao.php');

            $user = $_POST['userId'];

            settype($user, 'int');

            $sql = "SELECT cart FROM user WHERE id = '$user'";

            $query = mysqli_query($conexao, $sql);
            $valor = mysqli_fetch_row($query)[0];

            $cartIds = explode(",", $valor, -1);

            $listaOrdenada = array_slice($cartIds, 0);

            for ($i = 0; count($cartIds) > $i; $i++) {
                if ($cartIds[$i] === "") {
                    unset($cartIds[$i]);
                }
            }

            for ($j = 0; count($listaOrdenada) > $j; $j++) {
                $query = "SELECT * FROM prod WHERE idprod = '$listaOrdenada[$j]'";
                $res = mysqli_query($conexao, $query);

                $listarProd = mysqli_fetch_all($res, MYSQLI_ASSOC);

                foreach ($listarProd as $key => $valor) {
                    print_r('
                        <div class="prod-iten col-8 col-lg-3">
                            <div class="card">
                                <img src="../../PainelAdm/upload/' . $valor['img'] . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">R$' . $valor['price'] . '</h5>
                                    <p class="card-text">' . $valor['desc'] . '</p>
                                </div>
                                <div class="text-center d-flex row">
                                    <form action="" method="POST" class="col-md col">
                                        <input class="d-none" name="idprod-cart" value="' . $valor['idprod'] . '">
                                        <input class="d-none" name="user" value="">
                                        <button type="submit" href="#" class="btn btn-primary">Comprar!</button>
                                    </form>
                                    <form action="../rmCartItem.php" method="POST" class="col-md col">
                                        <input class="d-none" name="idprod-cart" value="' . $valor['idprod'] . '">
                                        <input class="d-none" name="usuario" value="'.$user.'">
                                        <button type="submit" href="#" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                                                <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    ');
                }
            }
            if(count($listaOrdenada) == 0) {
                print_r('
                    Nada aqui ainda...
                ');
            }
            ?>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.js"></script>
</body>
<?php
include_once('../conexao.php');
session_start();

if(empty($_SESSION['nome'])) {
    header('Location: ../index.php');
}

$logado = $_SESSION['nome'];
$logadoId = $_SESSION['userid'];

$sqlCart = "SELECT cart FROM user WHERE id = '$logadoId'";
$queryCart = mysqli_query($conexao, $sqlCart);
$cartValue = mysqli_fetch_row($queryCart)[0];
$cartIds = explode(",,", $cartValue);
$cartQtd = array_slice($cartIds, 0);

for ($i = 0; count($cartQtd) > $i; $i++) {
    if ($cartQtd[$i] == "") {
        unset($cartQtd[$i]);
    }
}

?>

<head>
    <link rel="stylesheet" href="home.css">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <div class="d-flex bd-highlight mb-3 text-white bg-dark">
            <div class="d-flex p-2">
                <a href="../index.php" class="btn btn-outline-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg>
                </a>
            </div>
            <div class="me-auto p-2 bd-highlight">
                App Senac
            </div>
            <div class="user-infos p-2 d-flex">
                <div class="bd-highlight">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    <?php
                    echo $logado;
                    ?>
                </div>
                <form action="../cart/cartPage/cart.php" method="POST" class="bd-highlight">
                    <input style="display: none;" value="<?php echo $logadoId; ?>" name="userId">
                    <button type="submit" class="btn btn-primary position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                            if (count($cartQtd) === null) {
                                echo 0;
                            } else {
                                echo count($cartQtd);
                            }
                            ?>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                </form>
            </div>

        </div>
        <p class="text-center">
            <b>
                Bem-vind@,
                <?php
                echo $logado;
                ?>
                !
            </b>
        </p>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">

            <div class="carousel-inner">
                <?php
                $sqlFtrd = "SELECT * FROM prod WHERE featured = 'true'";
                $queryFeatured = mysqli_query($conexao, $sqlFtrd);
                $listarDestaques = mysqli_fetch_all($queryFeatured, MYSQLI_ASSOC);

                if (isset($listarDestaques[0])) {
                    print_r('
                <div class="carousel-item active">
                    <div class="imagem">
                        <span></span>
                        <img src="../PainelAdm/upload/' . $listarDestaques[0]['img'] . '" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-caption d-md-block">
                        <h5>R$' . $listarDestaques[0]['price'] . '</h5>
                        <p>' . $listarDestaques[0]['desc'] . '</p>
                    </div>
                </div>
                ');

                    for ($y = 1; count($listarDestaques) > $y; $y++) {


                        print_r('
                    <div class="carousel-item">
                        <div class="imagem">
                            <span></span>
                            <img src="../PainelAdm/upload/' . $listarDestaques[$y]['img'] . '" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-caption d-md-block">
                            <h5>R$' . $listarDestaques[$y]['price'] . '</h5>
                            <p>' . $listarDestaques[$y]['desc'] . '</p>
                        </div>
                    </div>
                    ');
                    }
                } else {
                    print_r('
                        <div class="h-100">
                            <h5 class="text-center no-ftrd w-100">Nenhuma novidade por enquanto...</h5>
                        <div>
                    ');
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <br>
    <hr /> <br><br>
    <section class="">

        <div class="container">
            <div class="row justify-content-center">
                <?php
                $query = 'SELECT * FROM prod';
                $res = mysqli_query($conexao, $query);

                $listarProd = mysqli_fetch_all($res, MYSQLI_ASSOC);

                foreach ($listarProd as $key => $valor) {
                    print_r('
                        <div class="prod-iten col-8 col-lg-3">
                            <div class="card">
                                <img src="../PainelAdm/upload/' . $valor['img'] . '" class="card-img-top" alt="...">
                                <form action="../cart/addToCart.php" method="POST" class="card-body">
                                    <h5 class="card-title">R$' . $valor['price'] . '</h5>
                                    <p class="card-text">' . $valor['desc'] . '</p>
                                    <input class="d-none" name="idprod-cart" value="' . $valor['idprod'] . '">
                                    <input class="d-none" name="user" value="' . $logadoId . '">
                                    <button type="submit" href="#" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div> 
                        ');
                }
                ?>
            </div>
        </div>
    </section>

    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="homeScripts.js" type="text/javascript"></script>
</body>
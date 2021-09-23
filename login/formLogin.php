<?php
require_once '../vendor/autoload.php';

use SebastianBergmann\Timer\Timer;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <span class="darking-bg"></span>

    <div id="warn-box" class="alert alert-danger d-flex" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div id="warn-text">
            <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            ?>
        </div>
    </div>
    <span class="bg-form"></span>
    <div class="container text-white col-sm-3 centered-item text-center">
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </br>
        <div>
            <a class="text-normal" href="../cadastro/cadastro.php">Cadastrar-se</a>
        </div>
    </div>

    <!-- Informações institucionais -->

    <div class="infos text-center container">
        <div class="">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="w-100"></div> <br>

            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>

            </div>
            <div class="w-100"></div> <br>

            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>

            </div>
            <div class="w-100"></div> <br>

            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>

            </div>
            <div class="w-100"></div> <br>

            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contate-nos</h5>
                        <p class="card-text">
                            (99)9.9999-9999 <br>
                            (99)9999-9999 <br>
                            Instagram: @user
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="text-white timer">
        <?php
        $timer = new Timer;
        $timer->start();
        $duration = $timer->stop();
        echo "Tempo de loading: " . $duration->asMilliseconds() . "ms";
        ?>
    </footer>
    <script src="loginScripts.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
</body>

</html>
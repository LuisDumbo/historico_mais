<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="public/img/favicon/favicon.ico" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="public/css/stylecolor.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="public/css/style.css">
    

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <?php if (!is_null($erro)) : ?>
                <div class="row justify-content-center">

                    <div class="col-md-7 col-lg-5">
                        <div class="alert alert-danger animate__animated animate__fadeInDown ">
                        <?= $erro ?>
                        </div>

                    </div>

                </div>
            <?php endif ?>

            <div class="row justify-content-center">

                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Login</h3>
                            </div>

                        </div>
                        <form action="<?php route("login") ?>" method="POST" class="login-form">
                            <div class="form-group">
                                <div class="icon cor d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                <input type="text" name="nome" class="form-control coriput  rounded-left" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <div class="icon cor d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                <input type="password" name="Password" class="form-control coriput rounded-left" placeholder="Password">
                            </div>
                            <div class="form-group d-flex align-items-center">

                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn  cor corb rounded submit">Login</button>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="w-100 text-center">
                                    <p class="mb-1"> Sem uma a conta? <a class="corlink" href="<?php echo '/historico_mais' . route("Registar") ?>">Faça o cadastro</a></p>
                                    <p class="mb-1"><a class="corlink" href="<?php echo '/historico_mais' . route("home") ?>">home</a></p>

                                </div>
                            </div>
                        </form>
                        <!-- <p><a href="#"><?= var_dump($nome ?? '') ?></a></p>
            -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/main.js"></script>

</body>

</html>
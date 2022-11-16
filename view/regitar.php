<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">


        <link rel="shortcut icon" href="public/img/favicon/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="public/css/stylecolor.css">
        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Main css -->
        <link rel="stylesheet" href="public/css/styleRegister.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <title>Registar</title>
</head>

<body>


    <?php if (isset($erro)) : ?>
        <div class="d-flex justify-content-center ">
            <div class=" col-md-7 col-lg-5   mt-1">
                <div class="alert alert-danger animate__animated animate__fadeInDown ">
                <?= $erro ?>
                </div>

            </div>
        </div>
    <?php endif ?>
    <!-- Sign up form -->
    <div class="container ">

        <div class="signup-content <?php if (!isset($erro)) {
            echo "mt-5" ;
        } ?> ">

            <div class="signup-form">
                <h2 class="form-title">Registar</h2>
                <form action="<?php route("registar") ?>" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Seu nome" />
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Seu Email" />
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" />
                    </div>

                    <div class="form-group">
                        <label for="nif"><i class="zmdi zmdi-lock"></i></label>
                        <input type="text" name="nif" id="pass" placeholder="NIF" />
                    </div>


                    <div class="form-group form-button">
                        <button type="submit" class="btn cor corb rounded submit">Registar</button>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="public/img/signin-image.jpg" alt="sing up image"></figure>
                <a href="<?php echo '/historico_mais' . route("login") ?>" class="signup-image-link">Já sou um menbro</a>
            </div>
        </div>
    </div>


    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/main.js"></script>
</body>

</html>
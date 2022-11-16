<!doctype html>
<html lang="en">

<head>
    <title>Documentação</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://divs.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="public/img/favicon/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="public/css/stylecolor.css">
    <link rel="stylesheet" href="public/css/user.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/div-awesome/4.7.0/css/div-awesome.min.css">
    <link href="public/css/bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS only -->
    <link href="public/css/home/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="public/css/main.css" />
    <link rel="stylesheet" href="public/css/styleUser.css">

</head>

<body>


    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a class="corlink" href="<?php echo '/historico_mais' . route("user")  ?>">Historico +</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->


            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link corlink scrollto  " href="<?php echo '/historico_mais' . route("user")  ?>">Home</a></li>
                    <li><a class="nav-link  scrollto" href="<?php echo '/historico_mais' . route("documentacao")  ?>"> Documentação</a></li>

                    <li><a class="nav-link  scrollto" href="<?php echo '/historico_mais' . route("logout") ?>">logout</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="app">


        <aside class="sidebar">

            <nav class="menu">
                <ul class="lista_item">
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>
                    <li>teste</li>

                </ul>
            </nav>

        </aside>

        <main class="content">
            <div class="menu-toggle">
                <div class="hamburger">
                    <span></span>
                </div>
            </div>


            <section class="row ">

                <div class="col-md-6 intro">

                    <h2 class="heading">Como Usar</h2>
                    <p class="masi">
                        fakeStoreApi can be used with any type of shopping project that needs products, carts, and users
                        in JSON
                        format. you can use examples below to check how fakeStoreApi works and feel free to enjoy it in
                        your awesome
                        projects!
                    </p>
                </div>
            </section>




            <section id="try" class="row">
                <h2 class="heading">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Código de exemplo</font>
                    </font>
                </h2>

                <pre class="userstyl"><code>fetch('https://fakestoreapi.com/products/1')<font></font>
            .then(res=&gt;res.json())<font></font>
            .then(json=&gt;console.log(json))</code></pre>

                <h2 class="heading">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Resusltado</font>
                    </font>
                </h2>

                <pre class="userstyl">
        {
            "_id": {
                "$oid": "63199d2fac057601f504e028"
            },
            "nome": "editado mais vezes, mais vezes",
            "Data": "02/05/2022",
            "sexo": "Femenino",
            "tipo sanguinio": "AB2",
            "BI": "399ei9dk"
        }</pre>


            </section>

            <section class="row">
                <h2 class="heading">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Rotas</font>
                    </font>
                </h2>
                <p>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Todos os métodos HTTP são suportados</font>
                    </font>
                </p>
                <ul class="list">
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">GET</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/listar_paciente</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/registar_paciente</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/editar_paciente</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">GET</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/listar_medico</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/registar_medico</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/editar_mdico</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/registar_consulta</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/listar_consulta</font>
                        </font>
                    </li>
                    <li><span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">POST</font>
                            </font>
                        </span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">/editar_consulta</font>
                        </font>
                    </li>

                </ul>

            </section>


        </main>
    </div>

    <footer>
        <p>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Feito com </font>
            </font><span class="heart">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">♥</font>
                </font>
            </span>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;"> por </font>
            </font><a target="_blank" rel="noopener noreferrer" href="https://keikaavousi.com/">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">MohammadReza Keikavousi</font>
                </font>
            </a>
        </p>
        <a href="https://donate.keikaavousi.com/" target="_blank" class="donate">
            <img src="./Fake Store API_files/coffee.svg">
            Buy me a coffee</a>
    </footer>


    <script>
        const menu_toggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        menu_toggle.addEventListener('click', () => {
            menu_toggle.classList.toggle('is-active');
            sidebar.classList.toggle('is-active');
        });
    </script>






    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/main_copy.js"></script>

</body>

</html>
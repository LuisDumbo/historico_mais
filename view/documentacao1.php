<!doctype html>
<html lang="pt">

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

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>

</head>

<body>


    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a class="corlink" href="<?php echo '/historico_mais' . route("user")  ?>">Historico +</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->


            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link  scrollto  " href="<?php echo '/historico_mais' . route("user")  ?>">Home</a></li>
                    <li><a class="nav-link corlink  scrollto" href="<?php echo '/historico_mais' . route("documentacao")  ?>"> Documentação</a></li>

                    <li><a class="nav-link  scrollto" href="<?php echo '/historico_mais' . route("logout") ?>">logout</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="container-fluid">
        <div class="row">

            <div class="col-2 px-1 bg-dark position-fixed  " id="sticky-sidebar">
                <div  id="navbar" class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-2  sidemenu d-flex justify-content-center align-items-center   ">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#lista_paciente">Listar Pacientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#registarPaciente">Registrar Paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#editarPaciente">Editar Paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Listar Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Listar Exames</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Registrar Exame</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Editar Exame</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Listar Procedimento Médico</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-9 offset-3" id="main">
                <main class="tema ">

                    <section class="row ">
                        <div class="col-md-6 intro">
                            <h2 class="heading">Como Usar</h2>
                            <p class="masi">
                                Historico mais é uma ferramenta poderosa para acessar informações valiosas sobre a saúde de um paciente. Ao seguir as melhores práticas de segurança e entender como usar os endpoints e filtros corretamente, você pode obter informações precisas e confiáveis ​​para melhorar o atendimento ao paciente.
                            </p>
                        </div>
                    </section>




                    <section id="lista_paciente" class="row">
                    <h2 class="heading">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Código de exemplo Listar Pacientes</font>
                    </font>
                </h2>

                <pre class="userstyl"><code>fetch('https://historico.com/api/paciente/3224')<font></font>
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
            "nome": "Luis Dumbo",
            "Data": "02/05/2022",
            "sexo": "Femenino",
            "tipo sanguinio": "AB2",
            "BI": "003264457LA038"
        }</pre>


                    </section>

                    <section id="editarPaciente" class="row">
                    <h2 class="heading">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Código de exemplo Editar Paciente</font>
                    </font>
                </h2>

                <pre class="userstyl"><code>fetch('https://historico.com/api/paciente/3224')<font></font>
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
            "nome": "Luis Dumbo",
            "Data": "02/05/2022",
            "sexo": "Femenino",
            "tipo sanguinio": "AB2",
            "BI": "003264457LA038"
        }</pre>


                    </section>

                    <section id="registarPaciente" class="row">
                    <h2 class="heading">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Código de exemplo Registrar Paciente</font>
                    </font>
                </h2>

                <pre class="userstyl"><code>fetch('https://historico.com/api/paciente/3224')<font></font>
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
            "nome": "Luis Dumbo",
            "Data": "02/05/2022",
            "sexo": "Femenino",
            "tipo sanguinio": "AB2",
            "BI": "003264457LA038"
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
        </div>
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
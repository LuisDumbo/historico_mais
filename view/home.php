<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Vendor CSS Files -->
    <link href="public/css/home/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="public/css/home/animate.css/animate.min.css" rel="stylesheet">
    <link href="public/css/home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/home/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link rel="shortcut icon" href="public/img/favicon/favicon.ico" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="public/css/styleHome.css">
    <title>Historico +</title>
</head>

<body>


    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">

            <div class="d-flex align-items-center">
                <i class="bi bi-phone"></i> Contacte-nos +244 936 294 865
            </div>

            <div class="d-flex align-items-center">
                <a href="<?php echo '/historico_mais' . route("login") ?>" class="nav-link"><i class="bi bi-phone"></i> Login </a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="index.html" class="logo me-auto">Historico +</a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Quem Somos</a></li>
                    <li><a class="nav-link scrollto" href="#services">Servoços</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo '/historico_mais' . route("Registar") ?>">Cdastre-se</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(public/img/slide/slide-1.png)">
                    <div class="container">
                        <h2>Bem vindo a <span>API</span> Historico +</h2>
                        <p>Bem-vindo à API Histórico +, uma poderosa solução para coleta e análise de dados de pacientes. Com essa tecnologia, você terá acesso a informações precisas e completas sobre o histórico médico dos pacientes, permitindo uma melhor tomada de decisões no diagnóstico, tratamento e monitoramento da saúde.</p>

                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(public/img/slide/slide-2.jpeg)">
                    <div class="container">
                        <h2>Dados Médicos Mais Próximos </h2>
                        <p>Essa tecnologia traz muitos benefícios para o controle e tratamento de doenças, permitindo uma visão mais completa do histórico médico dos pacientes. Com essas informações, os profissionais de saúde podem fazer um diagnóstico mais preciso.</p>

                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(public/img/slide/slide3.jpg)">
                    <div class="container">
                        <h2>Controle de Pandemias</h2>
                        <p>A API de histórico mais de pacientes é uma ferramenta fundamental para o controle de pandemias, permitindo a coleta e análise de dados sobre pacientes de diferentes fontes. Com essa tecnologia, é possível obter informações mais precisas e completas sobre os pacientes.</p>

                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Quem Somos</h2>
                <p>Nós somos uma empresa de tecnologia comprometida com o desenvolvimento de soluções inovadoras para o setor de saúde. Nosso principal objetivo é ajudar profissionais de saúde e instituições a fornecer um atendimento de qualidade aos pacientes, por meio do uso de tecnologias avançadas.</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="public/img/slide/slide-1.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Nosso objetivo com a API de histórico mais de pacientes é facilitar o trabalho dos profissionais de saúde, permitindo que eles tenham acesso rápido e fácil aos dados dos pacientes</h3>
                    <p class="fst-italic">
                        A API de histórico mais de pacientes é uma solução que permite a coleta, armazenamento e análise de dados de pacientes. Para proteger os dados dos pacientes, é necessário seguir as diretrizes estabelecidas pela Lei Geral de Proteção de Dados (LGPD)  Lei nº 22/11, de 17 de junho de 2011, </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Consentimento informado: é fundamental que os pacientes tenham conhecimento do uso que será feito dos seus dados e concordem com isso..</li>
                        <li><i class="bi bi-check-circle"></i> Acesso restrito: o acesso aos dados dos pacientes deve ser restrito a profissionais autorizados e que necessitem dessas informações para realizar seu trabalho. É importante definir políticas de acesso e controle de acesso aos dados para garantir que apenas pessoas autorizadas tenham acesso a eles.</li>
                        <li><i class="bi bi-check-circle"></i> Criptografia de dados: é importante adotar medidas de segurança, como a criptografia dos dados, para proteger as informações dos pacientes durante a transmissão e armazenamento na API.</li>
                    </ul>
                    <p>
                    Qualquer descumprimento com a LGPD pode ter consequências graves, incluindo ações judiciais. As empresas que não seguem as diretrizes da LGPD podem enfrentar multas, sanções administrativas e ações civis públicas, além de danos à sua reputação. Além disso, os indivíduos que tiverem seus dados pessoais violados podem ter direito a indenizações por danos morais e materiais.   </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Serviços</h2>
                <p>Nós oferecemos uma série de serviços relacionados à API de histórico mais de pacientes, com o objetivo de garantir que nossos clientes tenham acesso às melhores soluções para coleta, armazenamento e análise de dados de pacientes.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-heartbeat"></i></div>
                    <h4 class="title"><a href="">Implementação da API</a></h4>
                    <p class="description">Nossa equipe de especialistas pode ajudar na implementação da API de histórico mais de pacientes em diferentes sistemas de saúde</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4 class="title"><a href="">Customização da API</a></h4>
                    <p class="description">Entendemos que cada instituição de saúde tem suas próprias necessidades e demandas específicas. Por isso, oferecemos serviços de customização da API de acordo com as necessidades de cada cliente</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fas fa-hospital-user"></i></div>
                    <h4 class="title"><a href="">Treinamento</a></h4>
                    <p class="description">Oferecemos treinamento para os profissionais de saúde que utilizarão a API de histórico mais de pacientes, garantindo que eles tenham conhecimento completo sobre a solução </p>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <section id="contact" class="contact">

        <div class="section-title">
            <h2>Contacto</h2>
            <p>Estamos insteiramente ligados para qualquer informação</p>
        </div>
        <div class="container">

            <div class="row mt-5">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Endereço</h3>
                                <p>Ilha de Luanda</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>contacto@historico.com<br>recrutamento@historico.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>934 732 249<br>912 844 935</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Seu Nome" required="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Sumario" required="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7" placeholder="Mensagem" required=""></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Sua mensagem foi enviada Obrigado</div>
                        </div>
                        <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
                    </form>
                </div>

            </div>
        </div>

    </section><!-- End Contact Section -->


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Medicio</h3>
                            <p>
                                Ilhda de Luanda <br>
                                <strong>Telefone:</strong> 934 732 249<br>
                                <strong>Email:</strong> contacto@historico.com<<br>
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Links do usuario</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">Quem Somos</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">Servoços</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contacto</a></li>
                        </ul>
                    </div>



                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Alguma Informação</h4>
                        <p>Escreva aqui uma sugestão </p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Enviar">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Luis</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
                Designed by <a href="#">Luis Dumbo</a>
            </div>
        </div>
    </footer><!-- End Footer -->





    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



    <script src="public/css/home/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="public/css/home/js/main.js"></script>
</body>

</html>
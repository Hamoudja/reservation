<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/erepro-logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        E-Repro Réservation
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <a class="navbar-brand" href="acceuil.php">
          <img src="../assets/img/erepro-logo.png" style="height:50px ; width:50px" alt="Logo">
        </a>
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../visiteur/acceuil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../visiteur/page_de_recherche.php">Recherche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../visiteur/page_inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../visiteur/page_connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/connexion.jpg)"></div>
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-login card-plain">
                    <?php
                        require_once '../../api/personnes/connexion.php';
                        ?>
                        <form class="form" method="POST" action="">
                            <div class="card-header text-center">
                                <h2 class="title">Connexion</h2>
                            </div>
                            <div class="card-body">
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control " name="mail" id="Email" placeholder="E-mail" required autofocus>
                                </div>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-key text_caps-small"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="mots_de_passe" id="Password1" placeholder="Mot de passe" required autofocus>
                                </div>
                                <button class="btn btn-primary btn-round btn-lg btn-block" type="submit">Connexion</button>
                            </div>
                            <div class="card-footer text-center">

                                <div class="pull-left">
                                    <h6>
                                        <a href="../../view/visiteur/page_inscription" class="link">Inscription</a>
                                    </h6>
                                </div>
                                <div class="pull-right">
                                    <h6>
                                        <a href="../../view/visiteur/mots_de_passe_oublier" class="link">Mot de passe oublier?</a>
                                    </h6>
                                </div>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class=" container ">
            <div class="copyright" id="copyright">
                &copy;
                <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, Designed by Hamoudja Diakité
            </div>
        </div>
    </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
</body>

</html>
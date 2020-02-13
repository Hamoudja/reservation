<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/erepro-logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        E-Repro Réservations
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

<body class="landing-page sidebar-collapse">
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
    
        <div class="section section-team text-center clear-filter" filter-color="orange" >
            <div class=" col-md-6 ml-auto mr-auto px-5">
            <div class="card card-login card-plain">
            <?php   require_once '../../api/personnes/inscription.php' ; ?>
                <div class="card text-left px-4 m-4 " >
                    <div class="card-body  mb-4 shadow-sm">
                        <form class="form" method="POST" action="">
                            <div class="card-header text-center">
                                <h2 class="title">Inscription</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Nom" class="bmd-label-floating">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="Nom" placeholder="Nom" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Prenom">Prénom</label>
                                    <input type="text" class="form-control " name="prenom" id="Prenom" placeholder="Prenom" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="Email">E-mail</label>
                                <input type="email" class="form-control " name="mail" id="Email" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <label for="pet-select">Question Secrète</label>
                                <select class="form-control " name="question" id="question" required>
                                    <option value="Quelle est votre ville favorite ?">Quelle est votre ville favorite ?</option>
                                    <option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
                                    <option value="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
                                    <option value="Quelle était le nom de votre école primaire ?">Quelle était le nom de votre école primaire ?</option>
                                    <option value="Quel est le nom de votre premier animal domestique ?"> Quel est le nom de votre premier animal domestique ?</option>
                                    <option value="Quel est le nom de votre jouet d’enfant préféré ?">Quel est le nom de votre jouet d’enfant préféré ?</option>
                                    <option value="Quel est le nom de jeune fille de votre grand-mère ?">Quel est le nom de jeune fille de votre grand-mère ?</option>


                                    <input type="text" class="form-control " name="reponse" id="Reponse" placeholder="Réponse" required>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Password1">Mot de passe</label>
                                    <input type="password" class="form-control" name="mots_de_passe" id="Password1" placeholder="Mot de passe" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Password2">Confirmer mot de passe</label>
                                    <input type="password" class="form-control" name="mots_de_passe2" id="Password2" placeholder="Mot de passe" required>
                                </div>
                                <button class="btn btn-primary  btn-round btn-lg " type="submit">Inscription</button>
                            </div>
                        </form>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer  footer-default">
            <div class=" container ">

                <div class="copyright" id="copyright">
                    &copy;
                    <script>
                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>, Designed by Hamoudja Diakite

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
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
  <?php session_start() ?>
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
  <a class="navbar-brand" href="acceuil.php">
          <img src="../assets/img/erepro-logo.png" style="height:50px ; width:50px" alt="Logo">
        </a>
  <?php if (isset($_SESSION['user']['mail'])  ) : ?>
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
            <a class="nav-link" href="../visiteur/page_profil">Profil</a>
          </li>
        
        </ul>
      </div>
    </div>
    <?php else : ?>
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
            <a class="nav-link" href="../visiteur/page_inscription">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../visiteur/page_connexion">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
    <?php endif ?>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header  clear-filter" filter-color="orange" >
      <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bann2.jpg');  ">
      </div>
      <div class="content-center">
        <div class="container">
          <h1 class="title">Bienvenue sur E-Repro Réservations</h1>
        </div>
        <a href="page_de_recherche.php" class="btn btn-primary btn-round  btn-lg">Recherche</a>
      </div>
    </div>
   
    <div class="section section-team text-center">
      <div class="container">
        <h2 class="title">Qui sommes nous ?</h2>
        <div class="team">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player">
              
                <h4 class="title">Nous sommes</h4>
                <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                  for people to be able to follow them outside the site.</p>
             
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <h4 class="title">Rapide</h4>
                <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                for people to be able to follow them outside the site.</p>
             
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <h4 class="title">Facile</h4>
                <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                 for people to be able to follow them outside the site.</p>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-contact-us text-center">
      <div class="container">
        <h2 class="title">Contactez-Nous</h2>
        <div class="row">
          <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons users_circle-08"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Nom...">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons ui-1_email-85"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Email...">
            </div>
            <div class="textarea-container">
              <textarea class="form-control" name="name" rows="4" cols="80" placeholder="message..."></textarea>
            </div>
            <div class="send-button">
              <button class="btn btn-primary btn-round btn-block btn-lg">Envoyez</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer footer-default">
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
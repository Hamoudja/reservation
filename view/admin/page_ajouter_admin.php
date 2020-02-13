<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>E-Repro Reservation</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,600i,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-dark  bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">E-Repro</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
      <a href="../../api/personnes/deconnexion.php" class="nav-link" style="text-decoration:none"><i class="fa fa-power-off"></i> Deconnexion </a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid py-3">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="page_administrateur.php">
              Accueill
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="page_ajouter_salle.php">

                Ajouter une salle
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="page_supprimer_salle.php">
                Supprimer une salle
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="page_clients.php">
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="page_ajouter_admin.php">
                Administrateur
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="page_gestionnaire.php">
               Gestionnaires
              </a>
            </li>


          </ul>


      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 class="text-center  text-dark">Liste Administrateurs</h1>
        
        <a href="../admin/formulaire_ajouter_admin" > Ajouter Administrateur? </a>

        <?php require_once '../../api/personnes/list_admin.php'; ?>

      </main>
    </div>
  </div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="dashboard.js"></script>

</body>

</html>
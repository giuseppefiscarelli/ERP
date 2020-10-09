<?php
session_start();
require_once 'functions.php';
//var_dump($_SESSION);die;
if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Setec</title>
    <meta name="description" content="Portfolio WebApps">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="../setec/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="../setec/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../setec/assets/css/untitled.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean" style="/*height: 500px;*/">
        <div class="container"><a class="navbar-brand" href="#">Setec</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1"></div>
        </div>
        <form id="logout" class="form" role="form" method="post" action="verify-login.php">
            <input type="hidden" name="action" value="logout">
            <button onclick="logout.submit();" type="button" class="btn btn-success"> Logout</button>
        </form>
    </nav><header class="masthead text-white text-center" style="background:url('../setec/assets/img/bg-showcase-2.jpg')no-repeat center center;background-size:cover;">
    
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5"><img src="../setec/assets/img/logo_setec_250.png" style="width: 50% "/></h1>
                <h1>ERP Automotive</h1>
            </div>
        </div>
    </div>
</header>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/5pf-ZnxiPGo?rel=0" allowfullscreen></iframe>
</div>    
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <p class="text-muted small mb-4 mb-lg-0">© Setec 2020. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="../setec/assets/js/jquery.min.js"></script>
    <script src="../setec/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
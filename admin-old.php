<?php
	session_start();
	if(isset($_SESSION['uid'])) {
		include_once('conn.php');
	}
	else {
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>State of Tripura</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/custom.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
   <script src="js/custom.js"></script>
</head>
<body>
<div class="preloader-background">
	<div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
	</div>
</div>
<div class="navbar-fixed">
  <nav class="green" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Government of Tripura</a>
      <ul class="right hide-on-med-and-down">
		<li class="active"><a href="/ihris/"><i class="material-icons left">perm_identity</i>Login</a></li>
		<li><a href="#"><i class="material-icons left">info_outline</i>Help</a></li>
		<!--<li><a href="#"><i class="material-icons left">email</i>Contact</a></li>-->
		<img height="60px" src="/ihris/images/nhm.png"/>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Login</a></li>
		<li><a href="#">Help</a></li>
		<li><a href="#">Contact</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </div>
  <main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
	<div class="row">
      <div class="col s12 m3">
        <div class="card-panel white">
          <?php include_once('sidebar.php'); ?>
        </div>
      </div>
	  <div class="col s12 m9">
		<div class="card-panel white">
		<h1>Welcome</h1><hr/>
		<img src="http://www.hunter.cuny.edu/onestop/financial-aid-images-new/fa-working-draft-images/under-construction.png"/>
        
		</div>
		</div>
    </div>

    </div>
  </div>
</main>

  <footer class="page-footer green">
    <div class="footer-copyright">
      <div class="container">
      <?php include_once('footer.php'); ?>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Dashboard - HCI AI Lab</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/custom.css" type="text/css" rel="stylesheet"/>
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
  <nav class="cyan" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Dashboard : HCI AI Lab</a>
      <ul class="right hide-on-med-and-down">
		<li class="active"><a href="index.php"><!--<i class="material-icons left">perm_identity</i>-->Login</a></li>
		<li><a href="#"><!--<i class="material-icons left">info_outline</i>-->Help</a></li>
		<!--<li><a href="#"><i class="material-icons left">email</i>Contact</a></li>-->
		
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="index.php">Login</a></li>
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
       <div id="login-page" class="row">
    <div class="col s12 m5 l5 z-depth-6 card-panel">
      <form class="login-form" name="login-form" action="login.php" method="POST">
        <div class="row">
        </div>
        <div class="row">
          <div class="input-field col s12">
            <!--<i class="material-icons prefix">perm_identity</i>-->
            <input class="validate" name="username" id="username" type="text">
            <label for="username">User Name</label>
          </div>
		  <div class="input-field col s12">
            <!--<i class="material-icons prefix">lock_outline</i>-->
            <input id="password" name="password" type="password">
            <label for="password">Password</label>
          </div>
		  <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" name="admin" id="admin" />
              <label for="admin">Admin Login</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
			<button type="submit" class="btn waves-effect waves-light cyan col s12" value="Login">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p style="background-color:yellow; font-weight: 700; text-align: center" class="margin medium-small"><a href="register.php">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#">Forgot password?</a></p>
          </div>          
        </div>

      </form>
	
    </div>
  </div>

    </div>
  </div>
  
</main>

  <footer class="page-footer cyan">
    <div class="footer-copyright">
      <div class="container">
      <?php include_once('footer.php'); ?>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="assets/jquery-2.2.3.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>

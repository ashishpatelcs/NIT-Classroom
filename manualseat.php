<?php
	session_start();
	if(isset($_SESSION['sid'])) {
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
  <title>Dashboard - HCI AI Lab</title>
  
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/custom.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
   <script src="js/custom.js"></script>
   
   <style>
   #seatcode {
	   font-size: 18px;
	   font-weight: 800;
	   color: green;
   }
   </style>
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
		<li class="active"><a href="/ihris/"><!--<i class="material-icons left">perm_identity</i>-->Login</a></li>
		<li><a href="#"><!--<i class="material-icons left">info_outline</i>-->Help</a></li>
		<!--<li><a href="#"><i class="material-icons left">email</i>Contact</a></li>-->
		
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
          <?php include_once('sidebar2.php'); ?>
        </div>
      </div>
	  <div class="col s12 m9">
		<div class="card-panel white">
		<h1>Seating</h1><hr/>
		<p><b>Class Room:</b> 210A</p>
    <form id="seating" name="seating" action="seating.php" method="POST">
		<table>
    <tr>
    <td><p>Select Active Session: </td><td>
    <select style="display: inline;">
      <?php
      $query = 'select class from class where remarks=1';
      $res = mysqli_query($connection, $query);
      if(!$res) echo "<option>No active session found!</option>";
      else {
        while($row = mysqli_fetch_array($res))
          echo "<option>".$row['class']."</option>";
      }
      ?>
    </select></td>
    </tr>
		<tr>
      <td>Your Name-</td> <td><b><?php
      $query='select name from students where enroll="'.$_SESSION['sid'].'"';
      $res = mysqli_query($connection, $query);
      if(!res) echo 'Unauthorized: No Such User found!';
      else {
        $row = mysqli_fetch_array($res);
        $name = $row['name'];
        echo $name;
      }
      ?></b></td></tr>
			<tr><td>Enrollment No- </td><td><b><?php echo $_SESSION['sid']; ?></b></td></tr>
			<tr><td>Enter Seat No- </td><td><input placeholder="e.g. 10" type="text" name="seatno" id="seatno"/></td></tr>
			<tr><td>Enter Code : </td><td><input placeholder="Enter Seat Code" type="text" name="seatcode" id="seatcode"/></td></tr>
			<tr><td></td><td><input type="submit" value="Submit" id="submit" /></td></tr>
			</table>
			</form>
		</div>
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

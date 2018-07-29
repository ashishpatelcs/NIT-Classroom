<?php
	session_start();
	if(isset($_SESSION['sid'])) {
		include_once('conn.php');
	}
	else {
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}
    include_once('conn.php');
    $query = "select `starttime` from class limit 1";
    $res = mysqli_query($con, $query);
    if ($res) $row = mysqli_fetch_row($res);
    $_SESSION['rec-time'] = $row[0];
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
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <!-- main wavesurfer.js lib -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/wavesurfer.min.js"></script>
<!-- wavesurfer.js timeline -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.timeline.min.js"></script>
<!-- wavesurfer.js regions -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.regions.min.js"></script>

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
		<h1>Student Interactions</h1><hr/>
		<b>Active Session: </b><h3><u>
		<?php
			include_once("conn.php");
			$query = "SELECT * FROM class ORDER BY starttime DESC LIMIT 1";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			echo $row[0];
			$_SESSION["rec-time"] = $row[1];
		?></u>
		</h3><br><br>
<button onclick="activity(1)" class="waves-effect waves-light btn orange">Doubt</button>
<button onclick="activity(2)" class="waves-effect waves-light btn green">Repeat</button>
<!-- <button onclick="activity(3)" class="waves-effect waves-light btn yellow">NA</button> -->
<br>
<div id="responses">
<h2>Student Response</h2>
<hr/>
<ul id="date"></ul>
</div>        
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
  
  
	<script>
	
	
	function activity(n) {
		var url = "activity.php?flag="+n+"&rec-time=<?php echo $_SESSION['rec-time']; ?>";
		$.get(url, function(dat, status) {
			//alert(dat);
		});
		$("#date").append("<li class='student-action'>An Activity Recorded on : " + new Date() + "</li>");
	}


</script>

  </body>
</html>

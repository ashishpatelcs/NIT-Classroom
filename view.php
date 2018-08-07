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
  <title>Dashboard - HCI AI Lab</title>
  
  <script>
        $(document).ready(function() {
	// tooltips plugin
            $('.tooltips').tooltipster();
        });
    </script>
  
  <link rel="stylesheet" type="text/css" href="js/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="js/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
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
   
   <style>
   .seat {
	   background-color: #B9DEA0;
	   width: 35px;
	   height: 35px;
	   margin: -3px 3px -3px 3px;
	   border-radius: 20%;
	   display: inline-block;
	   text-align: center;
	   padding: 3px;
	   font-size: 12px;
   }
   
   .seat:hover {
	   background-color: #76B474;
   }
   
   .occupied {
	   background-color: #3a78c3;
   }
   
   .occupied:hover {
	   background-color: #3a78c3;
   }
   
   .doubt {
	   background-color: #BA1821;
   }
   
   .doubt:hover {
	   background-color: #BA1821;
   }
   
   .seatempty {
	   background-color: white;
	   width: 35px;
	   height: 35px;
	   margin: 3px;
	   display: inline-block;
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
          <?php include_once('sidebar.php'); ?>
        </div>
      </div>
	  <div class="col s12 m9">
		<div class="card-panel white">
		<h1>Class View</h1><hr/>
		<p><b>Class Room :</b> 210A</p>
		<p><div class="seat" style="width: 25px; height: 25px;  margin: -8px 3px -8px 10px"></div> - Vacant
		<div class="seat occupied" style="width: 25px; height: 25px;  margin: -8px 3px -8px 10px "></div> - Occupied
		<div class="seat doubt" style="width: 25px; height: 25px;  margin: -8px 3px -8px 10px"></div> - Have a question!</p>
			
		<div id="seat-map" class="">
						 <!-- Dropdown Trigger -->
			  <a class='dropdown-button btn rowsclass' href='#' data-activates='dropdown1' style="height: 30px; width: 175px">Rows (0)</a>

			  <!-- Dropdown Structure -->
			  <ul id='dropdown1' class='dropdown-content'>
				<li><a id="row4" href="#">4</a></li>
				<li><a id="row5" href="#!">5</a></li>
				<li><a id="row6" href="#!">6</a></li>
				<li><a id="row7" href="#!">7</a></li>
				<li><a id="row8" href="#!">8</a></li>
				<li><a id="row9" href="#!">9</a></li>
			  </ul>
			  <a class='dropdown-button btn colsclass' href='#' data-activates='dropdown2' style="height: 30px; width: 175px">Columns (0)</a>

			  <!-- Dropdown Structure -->
			  <ul id='dropdown2' class='dropdown-content'>
				<li><a id="col2" href="#!">2</a></li>
				<li><a id="col3" href="#!">3</a></li>
				<li><a id="col4" href="#!">4</a></li>
				<li><a id="col5" href="#!">5</a></li>
			  </ul>
			  
			  <a class='dropdown-button btn seatsclass' href='#' data-activates='dropdown3' style="height: 30px; width: 175px">Seats (1)</a>

			  <!-- Dropdown Structure -->
			  <ul id='dropdown3' class='dropdown-content'>
				<li><a id="seating1" href="#!">1</a></li>
				<li><a id="seating2" href="#!">2</a></li>
				<li><a id="seating3" href="#!">3</a></li>
			  </ul>
			<!--<button type="submit" class="waves-effect waves-light btn-small blue" id="submit">Submit <i class="material-icons right">send</i></button>-->
			<br><br>
			<div class="seating"></div>
			<?php
			/*$num = 1;
			$seatno = 1;
			$flag = 3;
			while($num <= 40) {
				
				if ($num == $flag) {
					echo "<div class='seatempty'></div>";
					$seatno = $seatno - 1;
					$flag = $flag + 3;
				}
				else echo "<div class='seat seat-". $seatno . "'>S" . $seatno. "</div>";
				if($num % 8 == 0) { echo "<br>"; $flag = $flag + 2;}
				$num = $num + 1;
				$seatno = $seatno + 1;
			}*/
			?>
			
		</div>
		<br><br>
		<p><b>Number of students in class</b>: 10</p>
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
		var noofrows = 0;
		var noofcols = 0;
		var noofseats = 1;
		
		function seatsChange(seatplan, num) {
			$(seatplan).on("click", function() {
				$(".seatsclass").html("Seats (" + num + ")");
				noofseats = num;
				if(noofcols && noofrows) {
					var url = "seatplan.php?rows="+noofrows+"&cols="+noofcols+"&seats="+noofseats;
					$.get(url, function(dat, status) {
						//alert(dat);
						$(".seating").html(dat);
					});
				}
			});
		}
		
		function rowsEvent(rowno, num) {
			$(rowno).on("click", function() {
				$(".rowsclass").html("Rows (" + num + ")");
				noofrows = num;
				if(noofcols===0) console.log("Invalid");
				else {
					var url = "seatplan.php?rows="+noofrows+"&cols="+noofcols+"&seats="+noofseats;
					$.get(url, function(dat, status) {
						//alert(dat);
						$(".seating").html(dat);
					});
				}
			});
		}
		function colsEvent(colno, num) {
			$(colno).on("click", function() {
				$(".colsclass").html("Columns (" + num + ")");
				noofcols = num;
				if(noofrows===0) console.log("Invalid");
				else {
					var url = "seatplan.php?rows="+noofrows+"&cols="+noofcols+"&seats="+noofseats;
					$.get(url, function(dat, status) {
						//alert(dat);
						$(".seating").html(dat);
					});
				}
			});
		}
		
		$(document).ready(function() {
			rowsEvent("#row4", 4);
			rowsEvent("#row5", 5);
			rowsEvent("#row6", 6);
			rowsEvent("#row7", 7);
			rowsEvent("#row8", 8);
			rowsEvent("#row9", 9);
			colsEvent("#col2", 2);
			colsEvent("#col3", 3);
			colsEvent("#col4", 4);
			colsEvent("#col5", 5);
			seatsChange("#seating1", 1);
			seatsChange("#seating2", 2);
			seatsChange("#seating3", 3);
            
            var url = "seatplan.php?rows=5&cols=3&seats=3";
					$.get(url, function(dat, status) {
						//alert(dat);
						$(".seating").html(dat);
					});
		});
		
		
  </script>

  </body>
</html>

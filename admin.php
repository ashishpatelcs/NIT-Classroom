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
          <?php include_once('sidebar.php'); ?>
        </div>
      </div>
	  <div class="col s12 m9">
		<div class="card-panel white">
		<h1>My Class Activity</h1><hr/>

		<div id="waveform"></div>
<div id="waveform-timeline"></div>

<p align="center">
	<input type="file" id="i_file" value=""> 
  <button class="btn btn-primary" onclick="wavesurfer.playPause()">
    <i class="glyphicon glyphicon-play"></i>
    Play
  </button>
  
</p>
<div id="responses" style="width:50%">
<h2>Student Response</h2>
<hr/>
<table>
<tr><td>
<img width="20px" src="images/greend.png">  Have Doubt:</td><td> <strong>5</strong></td>
</tr><tr><td>
<img width="15px" src="images/bluet.png">  Please Repeat: </td><td><strong>4</strong></td></tr>
</table>
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
	var waveLen;
	var canvasWidth;
	var wavesurfer = WaveSurfer.create({
  container: '#waveform',
  waveColor: 'red',
  progressColor: 'purple',
  interact: true
});

$('#i_file').change( function(event) {
var tmppath = URL.createObjectURL(event.target.files[0]);
    wavesurfer.load(tmppath);    
});

wavesurfer.load('play.mp3');
wavesurfer.on('ready', function () {
	//wavesurfer.enableDragSelection({});
  var timeline = Object.create(WaveSurfer.Timeline);

  timeline.init({
    wavesurfer: wavesurfer,
    container: '#waveform-timeline'
  });
  
  waveLen = wavesurfer.getDuration();  
  canvasDrawing(waveLen);
});
//console.log(wavesurfer.getCurrentTime());
function canvasDrawing(wavel) {
	var canvas = document.getElementsByTagName("canvas");
	var ctx = canvas[0].getContext("2d");
	canvasWidth = ctx.canvas.width;
	ctx.font = "30px Arial";
	doubts.forEach(function(t) {
		var temp = (t*canvasWidth) / wavel;
		//ctx.strokeText("D",temp,35); 
		ctx.save(); 
			ctx.fillStyle = "green"; 
			ctx.globalAlpha = 0.5; 
			ctx.beginPath(); 
			ctx.arc(temp,(Math.random() * (45 - 25) + 25),7,0,Math.PI*2); 
			ctx.fill(); 
			ctx.restore();
	});
	repeats.forEach(function(r) {
		var temp = (r*canvasWidth) / wavel;
		//ctx.strokeText("R",temp,110);
		/*ctx.save(); 
			ctx.fillStyle = "red"; 
			ctx.globalAlpha = 0.5; 
			ctx.beginPath(); 
			ctx.arc(temp,(Math.random() * (125 - 95) + 95),7,0,Math.PI*2); 
			ctx.fill(); 
			ctx.restore();*/
			var tloc = Math.random() * (125 - 95) + 95;
			ctx.beginPath();
			ctx.fillStyle = "blue";
			ctx.moveTo(temp, tloc);
			ctx.lineTo(temp+7, tloc+7);
			ctx.lineTo(temp+7, tloc-7);
			ctx.fill();
	});
	//ctx.strokeText("Test",10,50); 
}

function bubbles() {
		var canvas = document.getElementById('canvas');
		var ctx = canvas.getContext('2d');
		var colors = ["red","green","blue","yellow","orange"];
		var time = 0;
		function draw() { 
		//bg and border 
		/*ctx.fillStyle = "white"; 
		ctx.fillRect(0,0, canvas.width,canvas.height); 
		ctx.strokeStyle = "black"; 
		ctx.strokeRect(0,0,canvas.width,canvas.height); */
		//time indicator 
		/*ctx.fillStyle = "black"; 
		ctx.fillText("time " + time, 10,20); */
		//draw the data for the current time slice 
		data[time].forEach(function(d) { 
			ctx.save(); 
			ctx.fillStyle = colors[d.country%colors.length]; 
			ctx.globalAlpha = 0.5; 
			ctx.beginPath(); 
			ctx.arc(d.x,d.y,d.size,0,Math.PI*2); 
			ctx.fill(); 
			ctx.restore();
			}); 
			}
	}
<?php

include_once("conn.php");
$query = "SELECT action from activity where flag = '1'";
$result = mysqli_query($connection, $query);
echo "var doubts = [";
while($row = mysqli_fetch_row($result)) {
	echo $row[0]. ",";
}
echo "];";

$query2 = "SELECT action from activity where flag = '2'";
$result2 = mysqli_query($connection, $query2);
echo "var repeats = [";
while($row2 = mysqli_fetch_row($result2)) {
	echo $row2[0]. ",";
}
echo "];";

?>
//var doubts = [1.222, 30.555, 30.265, 5.555, 18.888];
//var repeats = [14.444, 14.355, 30.999, 5.255];

</script>

  </body>
</html>

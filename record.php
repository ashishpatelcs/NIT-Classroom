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
  
   <script src="js/custom.js"></script>
	 <link href="assets/video-js/video-js.min.css" rel="stylesheet">
		<link href="assets/video-js/videojs.wavesurfer.min.css" rel="stylesheet">
		<link href="assets/video-js/videojs.record.min.css" rel="stylesheet">

		<script src="assets/video-js/video.min.js"></script>
		<script src="assets/video-js/RecordRTC.js"></script>
		<script src="assets/video-js/adapter-latest.js"></script>
		<script src="assets/video-js/wavesurfer.min.js"></script>
		<script src="assets/video-js/wavesurfer.microphone.min.js"></script>
		<script src="assets/video-js/videojs.wavesurfer.min.js"></script>

		<script src="assets/video-js/videojs.record.min.js"></script>
	<style>
	
		/* change player background color */
		#myAudio {
				background-color: cyan;
		}

	</style>
</head>
<body>
	<div class="preloader-background">
		<div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
				<div class="gap-patch">
          <div class="circle"></div>
        </div>
				<div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
		</div>
	</div>
	<div class="navbar-fixed">
  	<nav class="cyan" role="navigation">
    	<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Dashboard : HCI AI Lab</a>
      	<ul class="right hide-on-med-and-down">
					<li class="active"><a href="/"><!--<i class="material-icons left">perm_identity</i>-->Login</a></li>
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
							<h1>Create Session</h1><hr/>

							<p align="center">
							<br>
							<input id="class" type="text" style="text-align:center;" placeholder="Enter Class Name / Subject Topic">
							<br>
							<audio id="myAudio" class="video-js vjs-default-skin"></audio>
							<!--<button class="btn btn-primary">
								<i class="glyphicon glyphicon-play"></i>
								Submit
							</button>-->
							</p>    
							
							

							<div>
								<!--<h4><b>Recording started at:</b> <span id="record-time"></span></h4>-->
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
			var recid=0;

			var player = videojs("myAudio", {
				controls: true,
				width: 600,
				height: 300,
				fluid: false,
				plugins: {
						wavesurfer: {
								src: "live",
								waveColor: "#36393b",
								progressColor: "black",
								debug: true,
								cursorWidth: 1,
								msDisplayMax: 20,
								hideScrollbar: true
						},
						record: {
								audio: true,
								video: false,
								maxLength: 20,
								debug: true
						}
				}
		}, function() {
				// print version information at startup
				var msg = 'Using video.js ' + videojs.VERSION +
						' with videojs-record ' + videojs.getPluginVersion('record') +
						' + videojs-wavesurfer ' + videojs.getPluginVersion('wavesurfer') +
						' and recordrtc ' + RecordRTC.version;
				videojs.log(msg);
		});
		// error handling
		player.on('deviceError', function() {
				console.log('device error:', player.deviceErrorCode);
		});
		player.on('error', function(error) {
				console.log('error:', error);
		});
		// user clicked the record button and started recording
		player.on('startRecord', function() {
				console.log('started recording!');
				var date = new Date();
				$("#record-time").html(date);
				var name = $("#class").val();
				if(name=="") name = "Undefined";
				var url = "record-class.php?name="+name+"&remarks=1";
				$.get(url, function(dat, status) {
					//alert(dat);
				});
		});
		// user completed recording and stream is available
		player.on('finishRecord', function() {
				// the blob object contains the recorded data that
				// can be downloaded by the user, stored on server etc.
				console.log('finished recording: ', player.recordedData);
				upload(player.recordedData);
		});

		function upload(dat){
			var url = 'data:audio/wav;base64,' + dat;

			$.ajax({
			type: "POST",
			url: "upload.php",
			data: { 
				wavBase64: url
			}
			}).done(function(o) {
			console.log('saved'); 

			});

		}
	</script>
</body>
</html>

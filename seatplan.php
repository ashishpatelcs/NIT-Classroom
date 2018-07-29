<?php
	session_start();
	include_once('conn.php');
	$rows = $_GET["rows"];
	$cols = $_GET["cols"];
	$seating = $_GET["seats"];
	$emptyrows = $cols - 1;
	$allcols = $seating * $cols + $emptyrows;
	$seats = $rows * $allcols;
	$num = 1;
	$seatno = 1;
	//$flag = 3;
	$flag = $seating + 1;
	$outp = " ";
	while($num <= $seats) {
		
		if ($num == $flag) {
			$outp = $outp . "<div class='seatempty'></div>";
			$seatno = $seatno - 1;
			//$flag = $flag + 3;
			$flag = $flag + $seating + 1;
		}
		else { 
			$query = 'select * from seatplan where seatno="S'.$seatno.'"';
			$res = mysqli_query($connection, $query);
			if($res) {
				$row = mysqli_fetch_row($res);
			}
            if(isset($row[1])) {
                $outp = $outp . "<div class='tooltips seat occupied seat-". $seatno . "' title='".$row[1]."'>S" . $seatno. "</div>";
            } else {
			     $outp = $outp . "<div class='tooltips seat seat-". $seatno . "' title='".$row[1]."'>S" . $seatno. "</div>";
            }
		}
		if($num % $allcols == 0) { $outp = $outp . "<br>"; $flag = $flag + $seating;}
		$num = $num + 1;
		$seatno = $seatno + 1;
	}
	echo $outp;
?>
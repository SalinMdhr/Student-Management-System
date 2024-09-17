<?php
	session_start();
	include "connection.php";
	if(isset($_SESSION['user'])){
		// sleep(2);
		// $uname = $_SESSION['user'];
	}else{
		echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SP Record: Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/homeStyle.css">
	<script defer src="../javaScript/sessDestroy.js "></script>
	<script defer src="../javaScript/date.js "></script>
</head>
<body>
	<div class="dash">
		<div class="space"></div>
		<ul class="menu">
			<li><h2>Dashboard</h2></li>
			<li><h3><a href="adminHome.php">Home</a></h3></li>
			<li><h3><a href="addStd.php">Add student</a></h3></li>
			<li><h3><a href="stdAttendance.php">Attendance</a></h3></li>
			<?php echo "<li><h3><a href='changePsw.php'>Change password</a></h3></li>" ?>
			<li><h3><a href="mng_Marks.php">Manage marks</a></h3></li>
			<li><h3><a href="manageStd.php">Manage student</a></h3></li>
		</ul>
	</div>
	<div class="container">
		<div class="head">
			<h2><a href='adminHome.php'>SP Record</a></h2>
			<p>Welcome Admin</p>
			<div id="date">
				<div id="currentDate"></div>
				<div class="day"></div>
			</div>
			<div class="inp">
				<input type="button" name="logout" onclick="return logout()" value="Logout">
			</div>
		</div>
		<div class="main">
			<h1>Student Record System</h1>
			<div class="big-box">
				<div class="box"><a href="manageStd.php"><img src="../Images/stdmng.jpg"></a></div>
				<div class="box"><a href="addStd.php"><img src="../Images/addstd.jpg"></a></div>
				<div class="box"><?php echo "<a href='changePsw.php'><img src='../Images/cngpsw.jpg'></a>" ?></div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	session_start();
	include "connection.php";
	if(isset($_SESSION['user'])){
		if(isset($_GET['term'])){
			$term = $_GET['term'];
			$s_id = $_GET['ID'];
			if($term == 0){
				echo "<script>window.alert('Enter previous result..');
                	window.location.href='mng_marks.php';</script>";
					exit;
			}
		}else{
			header("location:mng_Marks.php");
		}
	}else{
		echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
				session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SP Record: Add marks</title>
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/formStyle.css">
	
	<script defer src="../javaScript/sessDestroy.js "></script>
	<script defer src="../javaScript/date.js "></script>
	<script defer src="../javaScript/formVal.js "></script>
</head>
<body>
	<div class="dash">	
		<div class="space"></div>
		<ul class="menu">
			<li><h2>Dashboard</h2></li>
			<li><h3><a href="adminHome.php">Home</a></h3></li>
			<li><h3><a href="addStd.php">Add student</a></h3></li>
			<li><h3><a href="stdAttendance.php">Attendance</a></h3></li>
			<li><h3><a href="changePsw.php">Change password</a></h3></li>
			<li><h3><a href="mng_Marks.php">Manage marks</a></h3></li>
			<li><h3><a href="manageStd.php">Manage student</a></h3></li>
		</ul>
	</div>
	<div class="container">
		<div class="head">
			<h2><a href="adminHome.php">SP Record</a></h2>
			<div id="date">
				<div id="currentDate"></div>
				<div class="day"></div>
			</div>
			<div class="inp">
				<input type="button" name="logout" onclick="return logout()" value="Logout">
			</div>
		</div>
		<div class="main">
			<h1>Add student marks</h1>
			<div class="box">
				<form method="POST" action="">
					<fieldset>
						<legend>Result</legend>
							<table>
								<tr>
									<td><label for="stdid">Student ID:</label></td>
									<td><input type="text" id="stdid" name="sid" readonly value="<?php echo $s_id ?>"></td>
								</tr>
								<tr>
									<td><label>Software Engineering:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="se"></td>
								</tr>
								<tr>
									<td><label>Database Management System:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="dbms"></td>
								</tr>
								<tr>
									<td><label>Operating System:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="os"></td>
								</tr>
								<tr>
									<td><label>Numerical Method:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="nm"></td>
								</tr>
								<tr>
									<td><label>Scripting Language:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="sl"></td>
								</tr>
								<tr>
									<td><input type="submit" name="submit"></td>
									<td><input type="reset" name="reset"></td>
								</tr>
							</table>
					</fieldset>
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$id = $_POST['sid'];
		$s_engineering = $_POST['se'];
		$Dbms = $_POST['dbms'];
		$o_system = $_POST['os'];
		$n_method = $_POST['nm'];
		$s_language = $_POST['sl'];

		if($term == 1){
			$ins_marks = "INSERT INTO first_term (ID,S_engineering,DBMS,O_system,N_method,S_language) VALUES ('$id','$s_engineering','$Dbms','$o_system','$n_method','$s_language')";
			$exe_marks = mysqli_query($conn,$ins_marks);

			if ($exe_marks){
				echo "<script>window.alert('Data inserted');
					window.location.href='mng_Marks.php';</script>";
			}else{
				echo "<script>window.alert('Error');
					window.location.href='mng_Marks.php';</script>";
			}
		} else if($term == 2){
			$ins_marks = "INSERT INTO mid_term (ID,S_engineering,DBMS,O_system,N_method,S_language) VALUES ('$id','$s_engineering','$Dbms','$o_system','$n_method','$s_language')";
			$exe_marks = mysqli_query($conn,$ins_marks);

			if ($exe_marks){
				echo "<script>window.alert('Data inserted');
					window.location.href='mng_Marks.php';</script>";
			}else{
				echo "<script>window.alert('Error');
					window.location.href='mng_Marks.php';</script>";
			}
		} else if($term == 3){
			$ins_marks = "INSERT INTO pre_board (ID,S_engineering,DBMS,O_system,N_method,S_language) VALUES ('$id','$s_engineering','$Dbms','$o_system','$n_method','$s_language')";
			$exe_marks = mysqli_query($conn,$ins_marks);

			if ($exe_marks){
				echo "<script>window.alert('Data inserted');
					window.location.href='mng_Marks.php';</script>";
			}else{
				echo "<script>window.alert('Error');
					window.location.href='mng_Marks.php';</script>";
			}
		} else if($term == 4){
			$ins_marks = "INSERT INTO board (ID,S_engineering,DBMS,O_system,N_method,S_language) VALUES ('$id','$s_engineering','$Dbms','$o_system','$n_method','$s_language')";
			$exe_marks = mysqli_query($conn,$ins_marks);

			if ($exe_marks){
				echo "<script>window.alert('Data inserted');
					window.location.href='mng_Marks.php';</script>";
			}else{
				echo "<script>window.alert('Error');
					window.location.href='mng_Marks.php';</script>";
			}
		} 
	}
?>
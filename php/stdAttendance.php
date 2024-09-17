<?php
	session_start();
	include "connection.php";
	if(isset($_SESSION['user'])){
		$stdIDs = array();
		$query = "SELECT ID FROM std_info ORDER BY ID ASC";
		$exe_query = mysqli_query($conn,$query);
		$result = mysqli_num_rows($exe_query);
		if ($result > 0){
			while($row = mysqli_fetch_assoc($exe_query)){
				$stdIDs[] = $row['ID'];
			}
		}
		$atd_query = "SELECT start_sem FROM attendance";
		$exe_atd_query = mysqli_query($conn,$atd_query);
		$total = mysqli_num_rows($exe_atd_query);
		if($total > 0){
			$store = mysqli_fetch_assoc($exe_atd_query);
			$sem_start = $store['start_sem'];
			$isReadOnly = true;
			$readAttribute = $isReadOnly ? 'readonly' : '';
		} else{
			$readAttribute = 0;
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
	<title>SP Record: Attendance</title>
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/formStyle.css">

	<script defer src="../javaScript/sessDestroy.js "></script>
	<script defer src="../javaScript/date.js "></script>
	<style>
		.box input{
			width: 75px;
			margin: 10px;
		}
		.box .atd_date{
			width: auto;
		}
		.main{
			margin-top: 8%;
		}
	</style>
</head>
<body>
	<div class="dash">		
		<div class="space"></div>
		<ul class="menu">
			<li><h2>Dashboard</h2></li>
			<li><h3><a href="adminHome.php">Home</a></h3></li>
			<li><h3><a href="addStd.php">Add student</a></h3></li>
			<li><h3><a href="stdAttendance.php">Attendance</a></h3></li>
			<li><h3><a href="mng_Marks.php">Manage marks</a></h3></li>
			<li><h3><a href="manageStd.php">Manage student</a></h3></li>
			<li><h3><a href="changePsw.php">Change password</a></h3></li>
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
			<h1>Attendance details</h1>
			<div class="box">
				<form method="POST" action="attendanceVal.php">
					<fieldset>
						<legend>Attendance</legend>
						<table>
							<tr>
								<th>Student ID</th>
								<th>Attendance Status</th>
							</tr>
							<?php 
								foreach ($stdIDs as $studentId) { 
									echo ' 
										<tr>
											<td><input type="text" id="stdid" name="sid[]" value="' . $studentId . '" readonly></td>
											<td>
												<select name="status[]" >
													<option value="Present">Present</option>
													<option value="Absent">Absent</option>
												</select>
											</td>										
										</tr>
									';
								}	
							?>
							<tr>
								<td>Semester Start</td>
								<td><input type="Date" value="<?php echo $sem_start?>" class="atd_date" name="semesterStart" <?php echo $readAttribute?>></td>
							</tr>
							<!-- <tr>
								<td>Semester End</td>
								<td><input type="Date" class="atd_date" name="semesterEnd"></td>
							</tr> -->
							<tr>
								<td><label>Date:</label></td>
								<td><input type="Date" class="atd_date" name="date"></td>
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

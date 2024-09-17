<?php
	session_start();
	include "connection.php";
	if(isset($_SESSION['user'])){
		$stdIDs = $_GET['ID'];
        $ftcDate = $_GET['Date'];
    
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
			<h1>Attendance details</h1>
			<div class="box">
				<form method="POST" action="">
					<fieldset>
						<legend>Attendance</legend>
						<table>
							<tr>
								<th>Student ID</th>
                                <?php echo '<td><input type="text" id="stdid" name="sid" value="' . $stdIDs . '" readonly></td>'?>
							</tr>
                            <tr>
                                <th><label>Date:</label></th>
                                <td><input type="Date" value="<?php echo $ftcDate?>" readonly class="atd_date" name="date"></td>
                            </tr>
							<?php echo '
                                <tr>
                                    <th>Status</th>
                                        <td>
                                            <select name="status" >
                                                <option value="Present">Present</option>
                                                <option value="Absent">Absent</option>
                                            </select>
                                        </td>										
                                </tr>
                                ';
							?>
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
        
        $std_Ids = $_POST['sid'];
        $stats = $_POST['status'];
        $date = $_POST['date'];
        var_dump($std_Ids); var_dump($date); var_dump($stats);
        // $flag = 0;
        
        $semesterStartDate = $_POST['semesterStart'];
        $semesterEndDate = date('Y-m-d', strtotime($semesterStartDate . '+6 months'));

        $today = date('Y-m-d');

        if ($semesterStartDate > $today) {
            echo "<script>window.alert('Invalid Date! Start Date is greater than today\'s date.');
                window.location.href='stdAttendance.php';</script>";
            exit;
        }else if ($date < $semesterStartDate || $date > $semesterEndDate) {
            echo "<script>window.alert('Invalid Date! Date should be within the semester start and end dates.');
                window.location.href='stdAttendance.php';</script>";
            exit;
        } else if ($date > $today) {
            echo "<script>window.alert('Invalid Date! Date cannot be greater than today\'s date.');
                window.location.href='stdAttendance.php';</script>";
            exit;
        }
        
        $attend_Val = "UPDATE attendance SET std_status = '$stats' WHERE ID = '$std_Ids' AND dates = '$date'";
        $attend_Val_Exe = mysqli_query($conn,$attend_Val);

            if($attend_Val_Exe){
                echo "<script>window.alert('Date updated successfully');
                    window.location.href='manageStd.php';</script>";   
            }else{
                echo "<script>window.alert('Error');
                    window.location.href='manageStd.php';</script>";
            }
    }
?>
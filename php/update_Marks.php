<?php
	session_start();
	include "connection.php";
	if(isset($_SESSION['user'])){
		if(isset($_GET['term'])){
			$term = $_GET['term'];
			$s_id = $_GET['ID'];

            if($term == 1){
                $query = "SELECT * from first_term WHERE ID = '$s_id'";
                $exe_query = mysqli_query($conn,$query);
            } elseif($term == 2){
                $query = "SELECT * from mid_term WHERE ID = '$s_id'";
                $exe_query = mysqli_query($conn,$query);
            } elseif($term == 3){
                $query = "SELECT * from pre_board WHERE ID = '$s_id'";
                $exe_query = mysqli_query($conn,$query);
            } elseif($term == 4){
                $query = "SELECT * from board WHERE ID = '$s_id'";
                $exe_query = mysqli_query($conn,$query);
            }

            if($exe_query){
                while($row = mysqli_fetch_assoc($exe_query)){
                    $se = $row['S_engineering'];
                    $dbms = $row['DBMS'];
                    $os = $row['O_system'];
                    $nm = $row['N_method'];
                    $sl = $row['S_language'];
                }
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
			<h1>Update student marks</h1>
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
									<td><input type="number" max="100" min="0" class="num" name="se" value="<?php echo $se ?>"></td>
								</tr>
								<tr>
									<td><label>Database Management System:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="dbms" value="<?php echo $dbms ?>"></td>
								</tr>
								<tr>
									<td><label>Operating System:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="os" value="<?php echo $os ?>"></td>
								</tr>
								<tr>
									<td><label>Numerical Method:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="nm" value="<?php echo $nm ?>"></td>
								</tr>
								<tr>
									<td><label>Scripting Language:</label></td>
									<td><input type="number" max="100" min="0" class="num" name="sl" value="<?php echo $sl ?>"></td>
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
		if (empty($_POST['sid'])||empty($_POST['se'])||empty($_POST['dbms'])||empty($_POST['os'])||empty($_POST['nm'])||empty($_POST['sl'])) {
            // sleep(1);
            echo "<script>window.alert('Please Input all details.');
                    window.location.href='mng_Marks.php';</script>";
		}else{
            $std_id=$_POST['sid'];

            $s_engineering = $_POST['se'];
            $db_ms = $_POST['dbms'];
            $o_system = $_POST['os'];
            $n_method = $_POST['nm'];
            $s_language = $_POST['sl'];

			if($term == 1){
				$upd_Query = "UPDATE first_term SET S_engineering='$s_engineering',DBMS='$db_ms',O_system='$o_system',
                	N_method='$n_method',S_language='$s_language' where ID='$std_id'";
            	$upd_Exe = mysqli_query($conn,$upd_Query);

			} elseif($term == 2){
				$upd_Query = "UPDATE mid_term SET S_engineering='$s_engineering',DBMS='$db_ms',O_system='$o_system',
                	N_method='$n_method',S_language='$s_language' where ID='$std_id'";
            	$upd_Exe = mysqli_query($conn,$upd_Query);

			} elseif($term == 3){
				$upd_Query = "UPDATE pre_board SET S_engineering='$s_engineering',DBMS='$db_ms',O_system='$o_system',
                	N_method='$n_method',S_language='$s_language' where ID='$std_id'";
            	$upd_Exe = mysqli_query($conn,$upd_Query);
				
			} elseif($term == 4){
				$upd_Query = "UPDATE board SET S_engineering='$s_engineering',DBMS='$db_ms',O_system='$o_system',
                	N_method='$n_method',S_language='$s_language' where ID='$std_id'";
            	$upd_Exe = mysqli_query($conn,$upd_Query);
				
			}

            if($upd_Exe){
                // sleep(2);
                echo "<script>window.alert('Update Successful.');
		    			window.location.href='mng_Marks.php';</script>";
            }else{
                // sleep(2);
                echo "<script>window.alert('Error.');
		        		window.location.href='mng_Marks.php';</script>";
            }
        }
    }
?>
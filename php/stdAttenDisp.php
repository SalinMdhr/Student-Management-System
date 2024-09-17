<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['user'])){
        // sleep(3);
        $uname = $_SESSION['user'];

        $query = "SELECT std_info.F_name, std_info.L_name, attendance.dates, attendance.std_status
                FROM attendance
                INNER JOIN std_info ON attendance.ID = std_info.ID WHERE std_info.ID = '$uname'
                ORDER BY attendance.dates ASC";
        $result = mysqli_query($conn, $query);
	}else{
		echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
			session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP Record</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/viewStyle.css">

    <script defer src="../javaScript/date.js "></script>
    <script defer src="../javaScript/sessDestroy.js"></script>
</head>
<body>
    <div class="dash">
        <div class="space"></div>
		<ul class="menu">
            <li><h2>Dashboard</h2></li>
            <li><h3><a href="stdHome.php">Home</a></h3></li>
            <?php echo "<li><h3><a href='stdAttenDisp.php?ID=$uname'>Attendance Detail</a></h3></li>"?>
            <?php echo "<li><h3><a href='changePsw.php'>Change password</a></h3></li>" ?>
            <?php echo "<li><h3><a href='std_Marks_disp.php?ID=$uname'>Marks Obtained</a></h3></li>"?>
        </ul>
    </div>
    <div class="container">
        <div class="head">
            <h2><a href="stdHome.php">SP Record</a></h2>
            <p>Welcome Student</p>
            <div id="date">
				<div id="currentDate"></div>
				<div class="day"></div>
			</div>
			<div class="inp">
				<input type="button" name="logout" onclick="return logout()" value="Logout">
			</div>
        </div>
        <div class="atd">
            <h1 class="heading">Attendance Record</h1>
            <div class="box">
                <?php
                    if ($result) {
                        $totalPresent = 0;
                        $totalAbsent = 0;
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>" . $row['dates'] . "</td>
                                            <td>" . $row['std_status'] . "</td>
                                        </tr>";
                                    if($row['std_status'] == 'Present'){
                                        $totalPresent++;
                                    }elseif($row['std_status'] == 'Absent'){
                                        $totalAbsent++;
                                    }
                                }
                            echo "</table>";
                        } else {
                            echo "<table>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                <tr>
                                    <td colspan='2'>No attendance records found.</td>
                                </tr>
                                </tr>";
                            echo "</table>";
                        }
                    } else {
                        echo "Error" . mysqli_error($conn);
                    }
                ?> 
            </div>    
            <div class="para">
                <?php
                    echo "<p>Total no of days Present: $totalPresent</p>
                    <p>Total no of days Absent: $totalAbsent</p>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>
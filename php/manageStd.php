<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP Record</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mng.css">
    
	<script defer src="../javaScript/sessDestroy.js "></script>
	<script defer src="../javaScript/date.js "></script>
    <script defer src="../javaScript/delScript.js "></script>
</head>
<body>
</body>
</html>
<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['user'])){
		// sleep(2);
		$uname = $_SESSION['user'];
        $mng_Query = "SELECT * FROM std_info ORDER BY ID ASC";
        $mng_Exe = mysqli_query($conn,$mng_Query);
        echo "<div class='dash'>";
            echo "<div class='space'></div>";
                echo "<ul class='menu'>";
                    echo "<li><h2>Dashboard</h2></li>";
                    echo "<li><h3><a href='adminHome.php'>Home</a></h3></li>";
                    echo "<li><h3><a href='addStd.php'>Add student</a></h3></li>";
                    echo "<li><h3><a href='stdAttendance.php'>Attendance</a></h3></li>";
                    echo "<li><h3><a href='changePsw.php'>Change password</a></h3></li>";
                    echo "<li><h3><a href='mng_Marks.php'>Manage marks</a></h3></li>";
                    echo "<li><h3><a href='manageStd.php'>Manage student</a></h3></li>";
                echo "</ul>";
        echo "</div>";
        echo "<div class='container'>";
            echo "<div class='head'>";
                echo "<h2><a href='adminHome.php'>SP Record</a></h2>";
                echo "<div id='date'>
                    <div id='currentDate'></div>
                    <div class='day'></div>
                </div>
                <div class='inp'>
                    <input type='button' name='logout' onclick='return logout()' value='Logout'>
                </div>";
            echo "</div>";
            echo "<div class='search-box'>
                <form action='searchStd.php' method='POST'>
                    <input class='search-txt' type='text' name='searchData' placeholder='Search...'>
                    <input class='search-btn' type='submit' name='submit' value='Search'>
                </form>
            </div>";
            echo "<div class='main'>";
                echo "<h1>Manage student details</h1>";
                echo "<div class='box'>";
                    echo "<form method='POST'>";
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>Id</th>";
                                echo "<th>First name</th>";
                                echo "<th>Last name</th>";
                                echo "<th colspan=3>Operations</th>";
                            echo "</tr>";
                            if($mng_Exe){
                                while($row = mysqli_fetch_assoc($mng_Exe)){
                                    $id = $row['ID'];
                                    $f_name = $row['F_name'];
                                    $l_name = $row['L_name'];
                                    $password = $row['Pasword'];
                                    $gender = $row['Gender'];
                                    $dob = $row['DOB'];
                                    $contact = $row['Contact'];
                                    $address = $row['Address'];

                                    echo "<tr>";
                                        echo "<td>$id</td>";
                                        echo "<td>$f_name</td>";
                                        echo "<td>$l_name</td>";
                                        echo "<td><a href='view.php?ID=$id & F_name=$f_name & L_name=$l_name & Pasword=$password & Gender=$gender & DOB=$dob & Contact=$contact
                                            & Address=$address'><input type='button' value='View'></a></td>";
                                        echo "<td><a href='update.php?ID=$id & F_name=$f_name & L_name=$l_name & Pasword=$password & Gender=$gender & DOB=$dob & Contact=$contact
                                            & Address=$address'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete.php?ID=$id'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                                    echo "</tr>";
                                }
                            }
                        echo "</table>";
                    echo "</form>";
                echo "<div>";
            echo "</div>";
        echo "</div>";
	}else{
		echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
                session_destroy();
	}
    // $uname = $_GET['username'];
    // sleep (3);
    
?>
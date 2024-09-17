<?php
    session_start();
    include "connection.php";
	if(isset($_SESSION['user'])){
		// sleep(2);
        $std_id = $_GET['ID'];

        $view_Query = "SELECT
            s.ID,
            s.F_name,
            s.L_name,
            s.Pasword,
            s.Gender,
            s.DOB,
            s.Contact,
            s.Address,
            f.S_engineering AS ft_se,
            f.DBMS AS ft_dbms,
            f.O_system AS ft_os,
            f.N_method AS ft_nm,
            f.S_language AS ft_sl,
            m.S_engineering AS mt_se,
            m.DBMS AS mt_dbms,
            m.O_system AS mt_os,
            m.N_method AS mt_nm,
            m.S_language AS mt_sl,
            p.S_engineering AS pb_se,
            p.DBMS AS pb_dbms,
            p.O_system AS pb_os,
            p.N_method AS pb_nm,
            p.S_language AS pb_sl,
            b.S_engineering AS bd_se,
            b.DBMS AS bd_dbms,
            b.O_system AS bd_os,
            b.N_method AS bd_nm,
            b.S_language AS bd_sl
            FROM std_info s
            LEFT JOIN first_term f ON s.ID = f.ID
            LEFT JOIN mid_term m ON s.ID = m.ID
            LEFT JOIN pre_board p ON s.ID = p.ID
            LEFT JOIN board b ON s.ID = b.ID WHERE s.ID = '$std_id';
        ";
        $exe_View_Query = mysqli_query($conn,$view_Query);
        
        if($exe_View_Query){
            while($row = mysqli_fetch_assoc($exe_View_Query)){
                $f_name = $row['F_name'];
                $l_name = $row['L_name'];
                $password = $row['Pasword'];
                $gender = $row['Gender'];
                $dob = $row['DOB'];
                $contact = $row['Contact'];
                $address = $row['Address'];

                $ft_sengineering = $row['ft_se'];
                $ft_dbms = $row['ft_dbms'];
                $ft_osystem = $row['ft_os'];
                $ft_nmethod = $row['ft_nm'];
                $ft_slanguage = $row['ft_sl'];

                $mt_sengineering = $row['mt_se'];
                $mt_dbms = $row['mt_dbms'];
                $mt_osystem = $row['mt_os'];
                $mt_nmethod = $row['mt_nm'];
                $mt_slanguage = $row['mt_sl'];

                $pb_sengineering = $row['pb_se'];
                $pb_dbms = $row['pb_dbms'];
                $pb_osystem = $row['pb_os'];
                $pb_nmethod = $row['pb_nm'];
                $pb_slanguage = $row['pb_sl'];

                $bd_sengineering = $row['bd_se'];
                $bd_dbms = $row['bd_dbms'];
                $bd_osystem = $row['bd_os'];
                $bd_nmethod = $row['bd_nm'];
                $bd_slanguage = $row['bd_sl'];

            }
        }

	}else{
		echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
			session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP Record: View detail</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/viewStyle.css">
    
    <script defer src="../javaScript/sessDestroy.js "></script>
	<script defer src="../javaScript/date.js "></script>
    <script defer src="../javaScript/delScript.js "></script>
</head>
<body>
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
            <!-- <?php echo "<li><h3><a href='attendanceDisplay.php?ID=$std_id'>Attendance Detail</a></h3></li>"?> -->
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
        <div class="std">
            <h1>Student Record</h1>
			<div class="box">
                <table>
                    <tr>
                        <th>Student ID:</th>
                        <td><?php echo $std_id ?></td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $f_name ." ". $l_name ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo $gender ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo $dob ?></td>
                    </tr>
                    <tr>
                        <th>Contact:</th>
                        <td><?php echo $contact ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?php echo $address ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                echo "<a href='update.php?ID=$std_id & F_name=$f_name & L_name=$l_name & Pasword=$password & Gender=$gender & DOB=$dob & Contact=$contact
                                    & Address=$address'><input type='button' value='Update'></a>";
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo "<a href='delete.php?ID=$std_id'><input type='button' onclick='return delConfirmation()' value='Delete'></a>";
                            ?>
                        </td>
                    </tr>
                </table>
            </div> 
        </div>
        <div class="result">
            <h1 class="heading">Academic Preformance</h1>
            <table>
                <tr>
                    <th>Exams</th>
                    <th>Software Engineering</th>
                    <th>Database Management System</th>
                    <th>Operating System</th>
                    <th>Numerical Method</th>
                    <th>Scripting Language</th>
                    <th colspan=3>Operations</th>
                </tr>
                <tr>
                    <th>First Term</th>
                    <td><?php echo (!empty($ft_sengineering) ? $ft_sengineering : '-')  ?></td>
                    <td><?php echo (!empty($ft_dbms) ? $ft_dbms : '-')  ?></td>
                    <td><?php echo (!empty($ft_osystem) ? $ft_osystem : '-') ?></td>
                    <td><?php echo (!empty($ft_nmethod) ? $ft_nmethod : '-') ?></td>
                    <td><?php echo (!empty($ft_slanguage) ? $ft_slanguage : '-') ?></td>
                    
                    <?php
                        if(empty($ft_sengineering)){
                            echo "<td><a href='add_Marks.php?ID=$std_id & term=1'><input type='button' value='Add'></a></td>";
                            echo "<td><a href='update_Marks.php?ID=$std_id & term=1'><input type='button' value='Update'></a></td>";
                            echo "<td><a href='delete_Marks.php?ID=$std_id & term=1'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                        } else{
                            echo "<td colspan=2><a href='update_Marks.php?ID=$std_id & term=1'><input type='button' value='Update'></a></td>";
                            echo "<td><a href='delete_Marks.php?ID=$std_id & term=1'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";

                        }
                    ?>
                </tr>

                <tr>
                    <th>Mid Term</th> 
                    <td><?php echo (!empty($mt_sengineering) ? $mt_sengineering : '-') ?></td>
                    <td><?php echo (!empty( $mt_dbms) ?  $mt_dbms : '-')  ?></td>
                    <td><?php echo (!empty($mt_osystem) ? $mt_osystem : '-')  ?></td>
                    <td><?php echo (!empty($mt_nmethod) ? $mt_nmethod : '-')  ?></td>
                    <td><?php echo (!empty($mt_slanguage) ? $mt_slanguage : '-')   ?></td>
                    <?php
                        if(empty($mt_sengineering)){
                            if(empty($ft_sengineering)){
                                echo "<td><a href='add_Marks.php?ID=$std_id & term=1'><input type='button' value='Add'></a></td>";
                                echo "<td><a href='update_Marks.php?ID=$std_id & term=1'><input type='button' value='Update'></a></td>";
                                echo "<td><a href='delete_Marks.php?ID=$std_id & term=1'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                            }else{
                                echo "<td><a href='add_Marks.php?ID=$std_id & term=2'><input type='button' value='Add'></a></td>";
                                echo "<td><a href='update_Marks.php?ID=$std_id & term=2'><input type='button' value='Update'></a></td>";
                                echo "<td><a href='delete_Marks.php?ID=$std_id & term=2'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                            }
                        } else{
                            echo "<td colspan=2><a href='update_Marks.php?ID=$std_id & term=2'><input type='button' value='Update'></a></td>";
                            echo "<td><a href='delete_Marks.php?ID=$std_id & term=2'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                        }
                    ?>
                </tr>

                <tr>
                    <th>Pre-Board</th> 
                    <td><?php echo (!empty($pb_sengineering) ? $pb_sengineering : '-')  ?></td>
                    <td><?php echo (!empty($pb_dbms) ? $pb_dbms : '-')  ?></td>
                    <td><?php echo (!empty($pb_osystem) ? $pb_osystem : '-')  ?></td>
                    <td><?php echo (!empty($pb_nmethod) ? $pb_nmethod : '-')  ?></td>
                    <td><?php echo (!empty($pb_slanguage) ? $pb_slanguage : '-')  ?></td>
                    <?php
                        if(empty($pb_sengineering)){
                            if(empty($mt_sengineering)){
                                if(empty($ft_sengineering)){
                                    echo "<td><a href='add_Marks.php?ID=$std_id & term=1'><input type='button' value='Add'></a></td>";
                                    echo "<td><a href='update_Marks.php?ID=$std_id & term=1'><input type='button' value='Update'></a></td>";
                                    echo "<td><a href='delete_Marks.php?ID=$std_id & term=1'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                                }else{
                                    echo "<td><a href='add_Marks.php?ID=$std_id & term=2'><input type='button' value='Add'></a></td>";
                                    echo "<td><a href='update_Marks.php?ID=$std_id & term=2'><input type='button' value='Update'></a></td>";
                                    echo "<td><a href='delete_Marks.php?ID=$std_id & term=2'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                                }
                            } else{
                                echo "<td><a href='add_Marks.php?ID=$std_id & term=3'><input type='button' value='Add'></a></td>";
                                echo "<td><a href='update_Marks.php?ID=$std_id & term=3'><input type='button' value='Update'></a></td>";
                                echo "<td><a href='delete_Marks.php?ID=$std_id & term=3'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                            }
                        } else{
                            echo "<td colspan=2><a href='update_Marks.php?ID=$std_id & term=3'><input type='button' value='Update'></a></td>";
                            echo "<td><a href='delete_Marks.php?ID=$std_id & term=3'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                        }
                    ?>
                </tr>

                <tr>
                    <th>Board</th> 
                    <td><?php echo (!empty($bd_sengineering) ? $bd_sengineering : '-') ?></td>
                    <td><?php echo (!empty($bd_dbms) ? $bd_dbms : '-') ?></td>
                    <td><?php echo (!empty($bd_osystem) ? $bd_osystem : '-') ?></td>
                    <td><?php echo (!empty($bd_nmethod) ? $bd_nmethod : '-') ?></td>
                    <td><?php echo (!empty($bd_slanguage) ? $bd_slanguage : '-') ?></td>
                    <?php
                        if(empty($bd_sengineering)){
                            if(empty($pb_sengineering)){
                                if(empty($mt_sengineering)){
                                    if(empty($ft_sengineering)){
                                        echo "<td><a href='add_Marks.php?ID=$std_id & term=1'><input type='button' value='Add'></a></td>";
                                        echo "<td><a href='update_Marks.php?ID=$std_id & term=1'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete_Marks.php?ID=$std_id & term=1'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                                    }else{
                                        echo "<td><a href='add_Marks.php?ID=$std_id & term=2'><input type='button' value='Add'></a></td>";
                                        echo "<td><a href='update_Marks.php?ID=$std_id & term=2'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete_Marks.php?ID=$std_id & term=2'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                                    }
                                } else{
                                    echo "<td><a href='add_Marks.php?ID=$std_id & term=3'><input type='button' value='Add'></a></td>";
                                    echo "<td><a href='update_Marks.php?ID=$std_id & term=3'><input type='button' value='Update'></a></td>";
                                    echo "<td><a href='delete_Marks.php?ID=$std_id & term=3'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                                }
                            } else{
                                echo "<td><a href='add_Marks.php?ID=$std_id & term=4'><input type='button' value='Add'></a></td>";
                                echo "<td><a href='update_Marks.php?ID=$std_id & term=4'><input type='button' value='Update'></a></td>";
                                echo "<td><a href='delete_Marks.php?ID=$std_id & term=4'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
                            }
                        } else{
                            echo "<td colspan=2><a href='update_Marks.php?ID=$std_id & term=4'><input type='button' value='Update'></a></td>";
                            echo "<td><a href='delete_Marks.php?ID=$std_id & term=4'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";

                        }
                    ?> 
                </tr>

            </table>
        </div>
        <div class="atd">
            <h1 class="heading">Attendance Record</h1>
            <div class="box">
                <?php
                    $att_Query = "SELECT * FROM attendance WHERE ID='$std_id'";
                    $exe_query = mysqli_query($conn,$att_Query);
                    $total = mysqli_num_rows($exe_query);
                    $store = mysqli_fetch_assoc($exe_query);
                    $start = $store['start_sem'];
                    $end = $store['end_sem'];

                    echo "<h2 class='heading'>Semester Statred from: $start - $end</h2>";
                    
                    if (isset($_SESSION['user'])) {
                        //$std_id = (trim($_GET['ID']))?trim($_GET['ID']):false;

                        $query = "SELECT std_info.F_name, std_info.L_name, attendance.dates, attendance.std_status
                                FROM attendance
                                INNER JOIN std_info ON attendance.ID = std_info.ID WHERE std_info.ID = '$std_id'
                                ORDER BY attendance.dates ASC";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $totalPresent = 0;
                            $totalAbsent = 0;
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>";
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                                $std_date = $row['dates'];
                                        echo "  <td>" . $row['dates'] . "</td>
                                                <td>" . $row['std_status'] . "</td>
                                                <td><a href='update_Attendance.php?ID=$std_id & Date=$std_date'><input type='button' value='Update'></a></td>
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
                    } else {
                        echo "<script>window.alert('Redirecting...');
                                    window.location.href='login.php';</script>";
                        session_destroy();
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
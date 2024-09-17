<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP Record</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mng_marks.css">
    
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
    error_reporting(0);
    if(isset($_SESSION['user'])){
		// sleep(2);
		$uname = $_SESSION['user'];
        $mng_Query = "SELECT
            s.ID,
            s.F_name,
            s.L_name,
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
            LEFT JOIN board b ON s.ID = b.ID ORDER BY ID ASC;
        ";
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
                <form action='marks_search.php' method='POST'>
                    <input class='search-txt' type='text' name='searchData' placeholder='Search...'>
                    <input class='search-btn' type='submit' name='submit' value='Search'>
                </form>
            </div>";
            echo "<div class='main'>";
                echo "<h1>Manage student marks</h1>";
                echo "<div class='box'>";
                    echo "<form method='POST'>";
                        echo "<table>";
                            echo "<tr>";
                                echo "<th rowspan=2>Id</th>";
                                echo "<th rowspan=2>Full name</th>";
                                echo "<th colspan=8>1st Term</th>";
                                echo "<th colspan=8>Mid Term</th>";
                                echo "<th colspan=8>Pre-board</th>";
                                echo "<th colspan=8>Board</th>";
                                // echo "<th>Last name</th>";
                                
                            echo "</tr>";
                            echo "<tr>";
                                echo "<th>SE</th>";
                                echo "<th>DBMS</th>";
                                echo "<th>OS</th>";
                                echo "<th>NM</th>";
                                echo "<th>SL</th>";
                                echo "<th colspan=3>Operations</th>";
                                
                                echo "<th>SE</th>";
                                echo "<th>DBMS</th>";
                                echo "<th>OS</th>";
                                echo "<th>NM</th>";
                                echo "<th>SL</th>";
                                echo "<th colspan=3>Operations</th>";
                                
                                echo "<th>SE</th>";
                                echo "<th>DBMS</th>";
                                echo "<th>OS</th>";
                                echo "<th>NM</th>";
                                echo "<th>SL</th>";
                                echo "<th colspan=3>Operations</th>";
                                
                                echo "<th>SE</th>";
                                echo "<th>DBMS</th>";
                                echo "<th>OS</th>";
                                echo "<th>NM</th>";
                                echo "<th>SL</th>";
                                echo "<th colspan=3>Operations</th>";
                            echo "</tr>";
                            
                            if($mng_Exe){
                                $flag = 0;
                                while($row = mysqli_fetch_assoc($mng_Exe)){
                                    $id = $row['ID'];
                                    $f_name = $row['F_name'];
                                    $l_name = $row['L_name'];

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

                                    echo "<tr>";
                                        echo "<td>$id</td>";
                                        echo "<td>$f_name $l_name</td>";
                                        
                                        // First Term
                                        if (empty($row['ft_se']) && empty($row['ft_dbms']) && empty($row['ft_os']) && empty($row['ft_nm']) && empty($row['ft_sl'])) {
                                            $flag = 1;
                                            echo "<td colspan=5><a href='add_Marks.php?ID=$id & term=1'><input type='button' value='Add Marks'></a></td>";
                                        } else {
                                            echo "<td>" . (!empty($row['ft_se']) ? $row['ft_se'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['ft_dbms']) ? $row['ft_dbms'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['ft_os']) ? $row['ft_os'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['ft_nm']) ? $row['ft_nm'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['ft_sl']) ? $row['ft_sl'] : '-') . "</td>";
                                        }
                                        echo "<td><a href='view.php?ID=$id & S_engineering=$s_engineering & DBMS=$dbms & O_system=$o_system & N_method=$n_method & S_language=$s_language'><input type='button' value='View'></a></td>";
                                        echo "<td><a href='update_Marks.php?ID=$id & term=1'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete_Marks.php?ID=$id & term=1'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";

                                        // Mid Term
                                        if (empty($row['mt_se']) && empty($row['mt_dbms']) && empty($row['mt_os']) && empty($row['mt_nm']) && empty($row['mt_sl'])) {
                                            if($flag == 1){
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=0'><input type='button' value='Add Marks'></a></td>";
                                            } else{
                                                $flag = 2;
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=2'><input type='button' value='Add Marks'></a></td>";
                                            }  
                                        } else {
                                            echo "<td>" . (!empty($row['mt_se']) ? $row['mt_se'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['mt_dbms']) ? $row['mt_dbms'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['mt_os']) ? $row['mt_os'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['mt_nm']) ? $row['mt_nm'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['mt_sl']) ? $row['mt_sl'] : '-') . "</td>";
                                        }
                                        echo "<td><a href='view.php?ID=$id & S_engineering=$s_engineering & DBMS=$dbms & O_system=$o_system & N_method=$n_method & S_language=$s_language'><input type='button' value='View'></a></td>";
                                        echo "<td><a href='update_Marks.php?ID=$id & term=2'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete_Marks.php?ID=$id & term=2'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";

                                        // Pre-board
                                        if (empty($row['pb_se']) && empty($row['pb_dbms']) && empty($row['pb_os']) && empty($row['pb_nm']) && empty($row['pb_sl'])) {
                                            if($flag == 1){
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=0'><input type='button' value='Add Marks'></a></td>";
                                            } else if($flag == 2){
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=0'><input type='button' value='Add Marks'></a></td>";
                                            } else{
                                                $flag = 3;
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=3'><input type='button' value='Add Marks'></a></td>";
                                            }  
                                        } else {
                                            echo "<td>" . (!empty($row['pb_se']) ? $row['pb_se'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['pb_dbms']) ? $row['pb_dbms'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['pb_os']) ? $row['pb_os'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['pb_nm']) ? $row['pb_nm'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['pb_sl']) ? $row['pb_sl'] : '-') . "</td>";
                                        }
                                        echo "<td><a href='view.php?ID=$id & S_engineering=$s_engineering & DBMS=$dbms & O_system=$o_system & N_method=$n_method & S_language=$s_language'><input type='button' value='View'></a></td>";
                                        echo "<td><a href='update_Marks.php?ID=$id & term=3'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete_Marks.php?ID=$id & term=3'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";

                                        // board
                                        if (empty($row['bd_se']) && empty($row['bd_dbms']) && empty($row['bd_os']) && empty($row['bd_nm']) && empty($row['bd_sl'])) {
                                            if($flag == 1){
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=0'><input type='button' value='Add Marks'></a></td></a></td>";
                                            } else if($flag == 2){
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=0'><input type='button' value='Add Marks'></a></td>";
                                            } else if($flag == 3){
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=0'><input type='button' value='Add Marks'></a></td>";
                                            }  else{
                                                echo "<td colspan=5><a href='add_Marks.php?ID=$id&term=4'><input type='button' value='Add Marks'></a></td>";
                                            }
                                        } else {
                                            echo "<td>" . (!empty($row['bd_se']) ? $row['bd_se'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['bd_dbms']) ? $row['bd_dbms'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['bd_os']) ? $row['bd_os'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['bd_nm']) ? $row['bd_nm'] : '-') . "</td>";
                                            echo "<td>" . (!empty($row['bd_sl']) ? $row['bd_sl'] : '-') . "</td>";
                                        }
                                        echo "<td><a href='view.php?ID=$id & S_engineering=$s_engineering & DBMS=$dbms & O_system=$o_system & N_method=$n_method & S_language=$s_language'><input type='button' value='View'></a></td>";
                                        echo "<td><a href='update_Marks.php?ID=$id & term=4'><input type='button' value='Update'></a></td>";
                                        echo "<td><a href='delete_Marks.php?ID=$id & term=4'><input type='button' onclick='return delConfirmation()' value='Delete'></a></td>";
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
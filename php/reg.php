<?php
    include "connection.php";

    $query = "select * from adm_info";
    $exe_query = mysqli_query($conn,$query);
    $total = mysqli_num_rows($exe_query);
    if($total > 0){
        echo "<script>window.alert('User already exists!');
                window.location.href='login.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP Record</title>
    <link rel="stylesheet" href="../css/loginStyle.css">
   
	<script defer src="../javaScript/passwordVal.js "></script>
</head>
<body>
    <div class="head"><h2><a href="login.php">SP Record</a></h2></div>
    <div class="container">
        <form action="regVal.php" method="POST" onsubmit="return validateForm()">
            <h1>Registration</h1>
            <input type="text" id="username" name="u_name" placeholder="Username"/><br>
            <input type="password" id="paswrd" name="ps_word" placeholder="Password"/><br>
            <input type="password" id="repaswrd" name="repass" placeholder="Confirm password"/><br>
            <input type="submit" name="submit" value="Submit"/>
        </form>
    </div>
</body>
</html>
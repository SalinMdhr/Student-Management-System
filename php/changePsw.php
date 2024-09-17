<?php
    include "connection.php";
    error_reporting(0);
    session_start();
    sleep(2);
    if(isset($_SESSION['user'])){
        $std_Query = "select ID,Pasword from std_info";
        $exe_std_Query = mysqli_query($conn,$std_Query);

        $adm_Query = "select username,pasword from adm_info";
        $exe_adm_Query = mysqli_query($conn,$adm_Query);
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
    <link rel="stylesheet" href="../css/loginStyle.css">

	<script defer src="../javaScript/passwordVal.js"></script>
</head>
<body>
    <div class="head"><h2>SP Record</h2></div>
    <div class="container">
        <?php echo "<form action='cngPswVal.php' method='POST' onsubmit='return validateForm()'> "?>
            <h1>Change password</h1>
            <input type="password" id="paswrd" name="passwrd" placeholder="Password"/><br>
            <input type="password" name="repasswrd" placeholder="Confirm password"/><br>
            <input type="submit" name="submit" value="Submit"/>
            <input type="reset" value="Reset"/>
        </form>
    </div>
</body>
</html>
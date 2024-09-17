<?php
    include "connection.php";
    if(isset($_POST['submit'])){
		if (empty($_POST['sid'])||empty($_POST['firstName'])||empty($_POST['lastName'])||empty($_POST['passwrd'])||empty($_POST['gender'])||empty($_POST['dob'])||empty($_POST['contactNo'])||empty($_POST['address'])) {
            // sleep(1);
            echo "<script>window.alert('Please Input all details.');
                    window.location.href='manageStd.php';</script>";
		}else{
            $std_id=$_POST['sid'];
            $f_name = $_POST['firstName'];
            $l_name = $_POST['lastName'];
            $password = $_POST['passwrd'];
            $gen = $_POST['gender'];
            $date = $_POST['dob'];
            $phone = $_POST['contactNo'];
            $addr = $_POST['address'];

            $upd_Query = "UPDATE std_info SET F_name='$f_name',L_name='$l_name',Pasword='$password',Gender='$gen',
                DOB='$date',Contact='$phone',Address='$addr' WHERE ID='$std_id'";
            $upd_Exe = mysqli_query($conn,$upd_Query);
            if($upd_Exe){
                sleep(2);
                echo "<script>window.alert('Update Successful.');
		    			window.location.href='manageStd.php';</script>";
            }else{
                sleep(2);
                echo "<script>window.alert('Contact already exist.');
		        		window.location.href='manageStd.php';</script>";
            }
        }
    }else{
        sleep(3);
        echo "<script>window.location.href='manageStd.php';</script>";
    }
?>
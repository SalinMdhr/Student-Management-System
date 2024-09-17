<?php
    include "connection.php";
    // session_start();
    // if(!isset($_SESSION['user'])){
        include "connection.php";
        $_SESSION['user'] = $_POST['u_name'];

        $query = "select * from adm_info";
        $exe_query = mysqli_query($conn,$query);
        $total = mysqli_num_rows($exe_query);
        // echo $total;

        if(isset($_POST['submit'])){
            if(empty($_POST['u_name'])||empty($_POST['ps_word'])||empty($_POST['repass'])){
                sleep(3);
			    echo "<script>window.alert('Please fill all the details!!');
				    window.location.href='reg.php';</script>";
            }elseif($_POST['ps_word'] != $_POST['repass']){
                sleep(3);
                echo "<script>window.alert('Password and Confirm password must be same!');
			    	window.location.href='reg.php';</script>";
            }elseif($total == 0){
                $usr_name = $_POST['u_name'];
                $passwrd = $_POST['ps_word'];

                $ins_Inp = "insert into adm_info (username,pasword) values('$usr_name','$passwrd')";
                $exe_Ins = mysqli_query($conn,$ins_Inp);
                if($exe_Ins){
                    sleep(3);
                    echo "<script>window.alert('Successfully registered');
				        window.location.href='login.php';</script>";
                }
            }else{
                sleep(3);
                echo "<script>window.alert('Invalid User!');
				    window.location.href='login.php';</script>";
                    // session_destroy();
            }
        }   
    // }
    
?>
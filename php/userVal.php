<?php
    include "connection.php";
    
    session_start();
    if(!isset($_SESSION['user'])){
        include "connection.php";
        $_SESSION['user'] = $_POST['uname'];
        // $_SESSION['passwrd'] = $_POST['psword'];    

        $std_Query = "select ID,Pasword from std_info";
        $exe_std_Query = mysqli_query($conn,$std_Query);

        $adm_Query = "select username,pasword from adm_info";
        $exe_adm_Query = mysqli_query($conn,$adm_Query);

        $uname = $_POST['uname'];
        $passwrd = $_POST['psword'];

        $flag = 0;
    
        while($rows = mysqli_fetch_assoc($exe_std_Query)){
            if($uname == $rows['ID'] & $passwrd == $rows['Pasword']){
                $flag = 1;
                echo "<script>window.alert('Welcome student!');
                        window.location.href='stdHome.php?ID=$uname';</script>";
            }
        }
        if($flag == 0){
            while($rows = mysqli_fetch_assoc($exe_adm_Query)){
                if($uname == $rows['username'] & $passwrd == $rows['pasword']){
                    echo "<script>window.alert('Welcome Admin!');
                            window.location.href='adminHome.php';</script>";
                }else{
                    echo "<script>window.alert('Incorrect Username or password');
                    window.location.href='login.php';</script>";
                    session_destroy();
                }
            }
        }
    }else{
        echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
                session_destroy();
    }
?>
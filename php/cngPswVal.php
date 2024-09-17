<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['user'])){
        $std_id = $_SESSION['user'];
        $adm_uname = $_SESSION['user'];

        $Adm_query = "select * from adm_info where username = '$adm_uname'";
        $Exe_Adm_query = mysqli_query($conn,$Adm_query);

        $Std_query = "select * from std_info where ID = '$std_id'";
        $Exe_Std_query = mysqli_query($conn,$Std_query);

        $flag = 0;

        while($rows = mysqli_fetch_assoc($Exe_Std_query)){
            if($std_id == $rows['ID']){
                $flag = 1;
                $uname = $std_id;
            }
        }
        if($flag == 0){
            while($rows = mysqli_fetch_assoc($Exe_Adm_query)){
                if($Exe_Adm_query->num_rows > 0){//$adm_uname == $rows['username']
                    $uname = $adm_uname;
                }
            }
        }

        if(isset($_POST['submit'])){
            if(empty($_POST['passwrd'])||empty($_POST['repasswrd'])){
                echo "<script>window.alert('Please enter all fields!');
                    window.location.href='changePsw.php?username=$uname';</script>";
            }elseif(($_POST['passwrd']) != ($_POST['repasswrd'])){
                echo "<script>window.alert('Password and comfirm password must be same!');
                    window.location.href='changePsw.php?username=$uname';</script>";
            }else{
                if($flag == 1){
                    $query = "select * from std_info where ID = '$std_id'";
                    $Exe_query = mysqli_query($conn,$query);
                    while($rows1 = mysqli_fetch_assoc($Exe_query)){
                        if($uname == $rows1['ID']){
                            $paswrd = $_POST['passwrd'];
                        
                            $Up_Std_query = "update std_info set Pasword='$paswrd' where ID='$uname'";
                            $Exe_Up_Std_query = mysqli_query($conn,$Up_Std_query);
    
                            if($Exe_Up_Std_query){
                                echo "<script>window.alert('Password has been changed!');
                                window.location.href='stdHome.php?ID=$uname';</script>";    
                            }
                        }
                    }
                }else{
                    $Aquery = "select * from adm_info where username = '$adm_uname'";
                    $Exe_Aquery = mysqli_query($conn,$Aquery);
                    while($rows1 = mysqli_fetch_assoc($Exe_Aquery)){
                        if($uname == ($Exe_Adm_query->num_rows > 0)){
                            $paswrd = $_POST['passwrd'];

                            $Up_Adm_query = "update adm_info set pasword='$paswrd' where username='$uname'";
                            $Exe_Up_Adm_query = mysqli_query($conn,$Up_Adm_query);
                            if($Exe_Up_Adm_query){
                                echo "<script>window.alert('Password has been changed!');
                                window.location.href='adminHome.php?username=$uname';</script>";    
                            }
                        }
                    }
                }
            }
        }
    }
    
?>
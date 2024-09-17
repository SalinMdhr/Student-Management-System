<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['user'])){
		// sleep(2);
        $delid = $_GET['ID'];
        
        $del_Bdmarks_Query = "DELETE FROM board WHERE ID='$delid'";
        $exe_del_Bdmarks_Query = mysqli_query($conn,$del_Bdmarks_Query);

        $del_Pbmarks_Query = "DELETE FROM pre_board WHERE ID='$delid'";
        $exe_del_Pbmarks_Query = mysqli_query($conn,$del_Pbmarks_Query);

        $del_Mtmarks_Query = "DELETE FROM mid_term WHERE ID='$delid'";
        $exe_del_Mtmarks_Query = mysqli_query($conn,$del_Mtmarks_Query);

        $del_Ftmarks_Query = "DELETE FROM first_term WHERE ID='$delid'";
        $exe_del_Ftmarks_Query = mysqli_query($conn,$del_Ftmarks_Query);

        $del_Att_Query = "DELETE FROM attendance WHERE ID='$delid'";
        $del_Att_Exe = mysqli_query($conn,$del_Att_Query);

        $del_Query = "DELETE FROM std_info WHERE ID='$delid'";
        $del_Exe = mysqli_query($conn,$del_Query);

        if($del_Exe && $del_Att_Exe){
            // sleep(2);
            echo "<script>window.alert('Record has been deleted.');
					window.location.href='manageStd.php';</script>";
        }else{
            echo "failed";
        }
	}else{
		echo "<script>window.alert('Redirecting...');
                window.location.href='login.php';</script>";
            session_destroy();
	}
    
?>

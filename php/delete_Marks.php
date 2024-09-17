<?php
    include "connection.php";

    $delid = $_GET['ID'];
    $term = $_GET['term'];
    $flag = 0;

    $sel_Bdmarks_Query = "SELECT * FROM board WHERE ID='$delid'";
    $exe_sel_bdmarks = mysqli_query($conn,$sel_Bdmarks_Query);

    $sel_Pbmarks_Query = "SELECT * FROM pre_board WHERE ID='$delid'";
    $exe_sel_pbmarks = mysqli_query($conn,$sel_Pbmarks_Query);

    $sel_Mtmarks_Query = "SELECT * FROM mid_term WHERE ID='$delid'";
    $exe_sel_Mtmarks = mysqli_query($conn,$sel_Mtmarks_Query);

    if($term == 1){
        if(mysqli_num_rows($exe_sel_Mtmarks) == 0){
            $del_Ftmarks_Query = "DELETE FROM first_term WHERE ID='$delid'";
            $exe_del_Query = mysqli_query($conn,$del_Ftmarks_Query);
        }
    } elseif($term == 2){
        if(mysqli_num_rows($exe_sel_pbmarks) == 0){
            $del_Mtmarks_Query = "DELETE FROM mid_term WHERE ID='$delid'";
            $exe_del_Query = mysqli_query($conn,$del_Mtmarks_Query);
        }
    } elseif($term == 3){
        if(mysqli_num_rows($exe_sel_bdmarks) == 0){
            $del_Pbmarks_Query = "DELETE FROM pre_board WHERE ID='$delid'";
            $exe_del_Query = mysqli_query($conn,$del_Pbmarks_Query);
        }
    } else{
        $del_Bdmarks_Query = "DELETE FROM board WHERE ID='$delid'";
        $exe_del_Query = mysqli_query($conn,$del_Bdmarks_Query);
    }
    
    if($exe_del_Query){
        echo "<script>window.alert('Record has been deleted.');
					window.location.href='mng_Marks.php';</script>";
    } else{
        echo "<script>window.alert('Deletion failed');
					window.location.href='mng_Marks.php';</script>";
    }

?>
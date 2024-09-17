<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        
        $std_Ids = $_POST['sid'];
        $stats = $_POST['status'];
        $date = $_POST['date'];
        var_dump($std_Ids); var_dump($date); var_dump($stats);
        // $flag = 0;
        
        $semesterStartDate = $_POST['semesterStart'];
        $semesterEndDate = date('Y-m-d', strtotime($semesterStartDate . '+6 months'));

        $today = date('Y-m-d');

        if ($semesterStartDate > $today) {
            echo "<script>window.alert('Invalid Date! Start Date is greater than today\'s date.');
                window.location.href='stdAttendance.php';</script>";
            exit;
        }else if ($date < $semesterStartDate || $date > $semesterEndDate) {
            echo "<script>window.alert('Invalid Date! Date should be within the semester start and end dates.');
                window.location.href='stdAttendance.php';</script>";
            exit;
        } else if ($date > $today) {
            echo "<script>window.alert('Invalid Date! Date cannot be greater than today\'s date.');
                window.location.href='stdAttendance.php';</script>";
            exit;
        }
        for ($i = 0; $i < count($std_Ids); $i++) {
            $studentId = $std_Ids[$i];
            // $date = $dates[$i];

            $attend_Val = "SELECT * FROM attendance WHERE ID = '$studentId' AND dates = '$date'";
            $attend_Val_Exe = mysqli_query($conn,$attend_Val);

            if(mysqli_num_rows($attend_Val_Exe) > 0){
                // $flag = 1;
                echo "<script>window.alert('Date already registered');
                    window.location.href='stdAttendance.php';</script>";  
            }else{
                $status = $stats[$i];
                $attend_Query = "INSERT INTO attendance (ID,start_sem,end_sem, dates, std_status) VALUES ('$studentId','$semesterStartDate','$semesterEndDate','$date','$status')";
                $attend_Query_Exe = mysqli_query($conn,$attend_Query);

                if($attend_Query_Exe){
                    echo "<script>window.alert('Date registered successfully');
                        window.location.href='stdAttendance.php';</script>";   
                }else{
                    echo "<script>window.alert('Invalid Id');
                        window.location.href='stdAttendance.php';</script>";
                }
            }
        }
    }
?>
<?php 
	include "connection.php";
	if(isset($_POST['submit'])){
		if (empty($_POST['sid'])||empty($_POST['firstName'])||empty($_POST['lastName'])||empty($_POST['passwrd'])||empty($_POST['gender'])||empty($_POST['dob'])||empty($_POST['contactNo'])||empty($_POST['address'])) {
			// sleep(2);
			echo "<script>window.alert('Please fill all the details!!');
				window.location.href='addStd.php';</script>";
		}else{
			$id = $_POST['sid'];
			$f_name = $_POST['firstName'];
			$l_name = $_POST['lastName'];
			$password = $_POST['passwrd'];
			$gender = $_POST['gender'];
			$Dob = $_POST['dob'];
			$contact = $_POST['contactNo'];
			$address = $_POST['address'];

			$currentYear = date("Y");
			$minimumAge = 20;

			$dateOfBirth = new DateTime($Dob);
			$today = new DateTime();
			$age = $today->diff($dateOfBirth)->y;	
							

			if ($dateOfBirth > $today || $age < $minimumAge) {
				echo "<script>window.alert('Invalid Date of Birth! Please make sure you\\'re at least $minimumAge years old.');
					window.location.href='addStd.php';</script>";
			}else{
				$flag = 0;
				$val_query = "SELECT * FROM std_info";
				$exe_val_query = mysqli_query($conn,$val_query);

				while($row = mysqli_fetch_assoc($exe_val_query)){
					$idVal = $row['ID'];
					$contactVal = $row['Contact'];
					
					if($idVal == $id){
						$flag = 1;
						echo "<script>window.alert('Id already exists');
							window.location.href='addStd.php';</script>";
					} elseif($contactVal == $contact){
						$flag = 2;
						echo "<script>window.alert('Contact already exists');
							window.location.href='addStd.php';</script>";
					}
				}

				$ins_query = "INSERT INTO std_info VALUES ('$id','$f_name','$l_name','$password','$gender','$Dob','$contact','$address')";
				$ins_exe = mysqli_query($conn,$ins_query);
				
				if ($ins_exe){
					// sleep(1);
					echo "<script>window.alert('Data inserted');
						window.location.href='mng_Marks.php';</script>";
				}else{
					// sleep(2);
					echo "<script>window.alert('Error');
						window.location.href='addStd.php';</script>";
				}
			}
		}
		}else{
			// sleep(2);
			header("location:adminHome.php");
		}
?>
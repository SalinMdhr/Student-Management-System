<?php 
    session_start();
    if(isset($_SESSION['user'])){
		sleep(2);
        session_destroy();
	}
?>
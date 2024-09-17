<?php 
    sleep(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP Record</title>
    <link rel="stylesheet" href="../css/loginStyle.css">
    <script defer src="../javaScript/loginScript.js "></script>
</head>
<body>
    <div class="head"><h2>SP Record</h2></div>
    <div class="container">
        <form action="userVal.php" method="POST">
            <h1>Login</h1>
            <input type="text" id="username" name="uname" placeholder="Username"/><br>
            <input type="password" id="paswrd" name="psword" placeholder="Password"/><br>
            <p id="errorMessage" hidden></p>
            <input type="submit" value="Login"/>
            <a href="reg.php"><input type="button" value="Register"/></a>
        </form>
    </div>
</body>
</html>
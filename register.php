<?php

session_start();

$db = mysqli_connect("localhost", "phpmyadmin", "Hazel355", "authentication");
if (isset($_POST['register_btn'])){
    $username =mysqli_real_escape_string($db,$_POST['username']);
    $email =mysqli_real_escape_string($db,$_POST['email']);
    $location = mysqli_real_escape_string($db,$_POST['location']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $password2 = mysqli_real_escape_string($db,$_POST['password2']);
    
    
    if ($password == $password2){
        $password = md5($password);
        $sql = "INSERT INTO users(username, email, location, password) VALUES('$username', '$email', '$location', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['username'] =$username;
        $_SESSION['message'] = 'You have successfully registered';
        header("location : home.php");
        
    }else{
        $_SESSION['message'] = 'The two passwords do not match';
}
    
}

?>

<html>
<head>
<title>REGISTRATION</title>
<link rel="stylesheet" href="style1.css">
</head>
<body>
<form action="register.php" method="post">
<h1>REGISTRATION FORM</h1>

<input name="username" type="text" placeholder="username" required>
<input name="location" type="text" placeholder="location" required>
<input name="email" type="email" placeholder="email" required>
<input name="password" type="password" placeholder="password" required>
<input name="password2" type="password" placeholder="password Again" required>
<input type="submit" name="register_btn" value="Register" class="btn">
</form>
<a href='logout.php'>BACK</a>
</body>
</html> 
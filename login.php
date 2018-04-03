<?php 
session_start();

$db = mysqli_connect("localhost", "", "", "authentication");
if (isset($_POST['login_btn'])){
    $username =mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    
    if ($username == $password){
   
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        mysqli_query($db, $sql);
        $_SESSION['username'] =$username;
        $_SESSION['message'] = 'You have successfully logged in';
        header('location :home.php');
        
    }else{
        $_SESSION['message'] = 'Username and password do not match';
        header('location:login.php');
}
    
}

?>


<html>
<head>
<title>LOGIN</title>
<link rel="stylesheet" href="style3.css">
</head>
<body>
<form action="login.php" method="post">
<h1>LOGIN FORM</h1>

<input name="username" type="text" placeholder="username" required>
<input name="password" type="password" placeholder="password" required>
<input type="submit" name="login_btn" value="Login" class="btn">
</form>
<a href="logout.php">BACK</a>
</body>
</html> 

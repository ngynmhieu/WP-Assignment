<?php
  if (isset($_COOKIE["username"])){
    setcookie("username", False, time() - 0, '/');
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <form action="login_processing.php" method="post">
        <div class="imgcontainer">
          <img src="image/user.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
          <label for="login_username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="login_username" required>
      
          <label for="login_password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="login_password" required>
        <div class="buttoncontainer">
            <button type="submit" name="Login">Login</button>
            <button type="submit" name="Register">Register</button>
        </div>
        </div>   
    </form>
</body>
</html>
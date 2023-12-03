<?php
    if (isset($_COOKIE["username"])){
        $name = $_COOKIE["username"];
    }
    else{
        $name = "resume";
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    
</head>
<body>
    <div class="topbar">
        <div class="left">
            <img src="image/cv.png" alt="page logo">
            <div class="text-logo">
                <p>Resume.io</p>
            </div>
        </div>
        <div class="right">
            <button class="user" onclick="displayUser()">
                <img src="image/user.png" alt="personal icon">
            </button>
            <div class="dropdown">
                <a href="Login.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="hr-body">
        <hr>
    </div>
    <div class="main-container">
        <div class="headline">
            <h2><?php echo $name?></h2>
            <button class="new-button">
                <img src="image/plus.png" alt="new sign">
                <p>Create new</p>
            </button>
        </div>
        <div class="hr-main">
            <hr>
        </div>
        <div class="resume-container">     
        </div>
    </div>
    <script src="home.js" defer></script>
</body>
</html>
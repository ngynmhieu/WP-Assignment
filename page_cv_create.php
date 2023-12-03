<?php
    $user_name = $_COOKIE["username"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_id = $_POST["user_id"];
    }
    else{
        $user_id = 0;
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

    <div class="container">        
        <div class="topbar">
            <div class="left">
                <a href="home.php">
                    <img src="image/cv.png" alt="page logo">
                    <div class="text-logo">
                        <p>Resume.io</p>
                    </div>
                </a>
            </div>
            <div class="right">
                    <button class="user">
                        <img src="image/user.png" alt="personal icon">
                    </button>
                </div>
            </div>
            <div class="hr-body">
                <hr>
        </div>
        <?php
            include ("form.php");
        ?>
    </div>
</body>
</html>

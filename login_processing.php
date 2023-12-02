<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty ($_POST["login_username"]) || empty($_POST["login_password"])){
            echo "Please enter username and password.";
            exit;
        }
        include "DBconnection.php";
        $username = $_POST["login_username"];
        $password = $_POST["login_password"];
        if (isset($_POST["Login"])){
            
            $sql = "SELECT * FROM user_login WHERE login_username = '$username' AND login_password = '$password'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0){
                echo "Incorrect username or password";
                exit;
            }
            echo "<script> window.location.replace(\"home.php?name=$username\"); </script>";
        }
        else if(isset($_POST["Register"])){
            $sql = "SELECT * FROM user_login WHERE login_username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0){
                $sql = "INSERT INTO user_login(user_id, login_username, login_password) VALUES (NULL, '$username', '$password')";
                $conn->query($sql);
                echo "<script> window.location.replace(\"home.php?name=$username\"); </script>";
            }
            else{
                echo "Username already exist";
                exit;
            }
        } 
    }
?>
<?php

    // delete cv
    if($_SERVER["REQUEST_METHOD"] == "DELETE"){
        include "DBconnection.php";
        // dont know why but the variable is sent in $_GET
        $user_id = $_GET["user_id"];

        // certification
        $sql = "DELETE FROM user_certification WHERE user_id = $user_id";
        $conn->query($sql);
        // education
        $sql = "DELETE FROM user_education WHERE user_id = $user_id";
        $conn->query($sql);
        // experience
        $sql = "DELETE FROM user_experience WHERE user_id = $user_id";
        $conn->query($sql);
        // language
        $sql = "DELETE FROM user_languages WHERE user_id = $user_id";
        $conn->query($sql);
        // phone number
        $sql = "DELETE FROM user_phonenumber WHERE user_id = $user_id";
        $conn->query($sql);
        // skill
        $sql = "DELETE FROM user_skills WHERE user_id = $user_id";
        $conn->query($sql);
        // delete login information
        $sql = "DELETE FROM user_login WHERE user_id = $user_id";
        $conn->query($sql);
        // user id
        $sql = "DELETE FROM users WHERE user_id = $user_id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
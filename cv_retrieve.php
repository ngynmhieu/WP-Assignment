<?php

    // CV retrieve for home page
    if ($_SERVER["REQUEST_METHOD"]== "GET"){
        include "DBconnection.php";
        $_username = $_GET["login_username"]; 
        $sql = "SELECT * FROM user_login WHERE login_username = '$_username'";
        $result = $conn->query($sql);
        $ids = [];
        $shows = [];
        while($row = $result->fetch_assoc()){
            $ids[] = $row["user_id"];
        }
        $button = " <div class=\"edit\">
                        <button class=\"edit-button\">
                            <img src=\"image/pen.png\" alt=\"\">
                        </button>
                    </div>
                    <div class=\"delete\">
                        <button class=\"delete-button\">
                            <img src=\"image/bin.png\" alt=\"\">
                        </button>
                    </div>";
        foreach($ids as $id){
            $sql = "SELECT * FROM users WHERE user_id = $id";
            $many_result = $conn->query($sql);
            $result = $many_result->fetch_assoc();
            $first_name =  $result["first_name"];
            $last_name = $result["last_name"];
            $wanted_job = $result["wanted_job"];
            $country = $result["country"];
            $city = $result["city"];
            $address = $result["address"];
            $date_of_birth = $result["date_of_birth"];
            $upload_photo = $result["upload_photo"];
            $email = $result["email"];
            $profile = $result["profile"];
            $show = "<h2> $first_name $last_name </h2>
                    <ul>
                        <li>$id</li>
                        <li>Wanted job: $wanted_job</li>
                        <li>Country: $country</li>
                        <li>City: $city</li>
                        <li>Address: $address</li>
                        <li>Date of birth: $date_of_birth</li>
                        <li>Upload photo: $upload_photo</li>
                        <li>Email: $email</li>
                        <li>Profile: $profile</li>
                    </ul>";
            $shows[] = "<div class=\"resume\">" . $button . $show . "</div>";
        }
        foreach($shows as $show){
            echo $show;
        }
    }
?>
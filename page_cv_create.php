<?php
    include ('DBconnection.php');
    $user_name = $_COOKIE["username"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_id = $_POST["user_id"];
        // retrieve data from users
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = mysqli_query ($conn, $sql);
    
        if (mysqli_num_rows($result) > 0){
            while ($row = $result->fetch_assoc()){
                $first_name =  $row["first_name"];
                $last_name = $row['last_name'];
                $wanted_job = $row['wanted_job'];
                $country = $row['country'];
                $city = $row['city'];
                $address = $row['address'];
                $date_of_birth = $row['date_of_birth'];
                $upload_photo = $row['upload_photo'];
                $email = $row['email'];
                $profile = $row['profile'];
            }
        }

        //retrieve data from phone table 
        $phone_numbers = array();
        $sql = "SELECT phone_number FROM user_phoneNumber WHERE
        user_id = $user_id";
        $result = $conn->query ($sql);
        while ($row = $result->fetch_assoc()){
            array_push ($phone_numbers, $row["phone_number"]);
        }
        
        //retrieve data from experience table 
        $exp_jobs = array();
        $exp_startDays = array();
        $exp_endDays = array();
        $exp_descriptions = array();
        
        $sql = "SELECT * FROM user_experience WHERE user_id = $user_id";
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc()){
            array_push($exp_jobs, $row["exp_job"]);
            array_push($exp_startDays, $row["exp_startDay"]);
            array_push($exp_endDays, $row["exp_endDay"]);
            array_push($exp_descriptions, $row["exp_description"]);
        }
        
        //retrieve data from education table 
        $edu_schools  = array();
        $edu_degrees = array();
        $edu_startDays = array();
        $edu_endDays = array();
        $edu_descriptions = array();
        $sql = "SELECT * FROM user_education WHERE
        user_id = $user_id";
        $result = $conn->query ($sql);
        while ($row = $result->fetch_assoc()){
            array_push ($edu_schools, $row["edu_school"]);
            array_push ($edu_degrees, $row["edu_degree"]);
            array_push ($edu_startDays, $row["edu_startDay"]);
            array_push ($edu_endDays, $row["edu_endDay"]);
            array_push ($edu_descriptions, $row["edu_description"]);
        }
        
        //retrieve data from certification table 
        $certi_names  = array();
        $certi_descriptions = array();
        $sql = "SELECT * FROM user_certification WHERE
        user_id = $user_id";
        $result = $conn->query ($sql);
        while ($row = $result->fetch_assoc()){
            array_push ($certi_names, $row["certi_name"]);
            array_push ($certi_descriptions, $row["certi_description"]);
        }

        
        //retrieve data from skills 
        $skills  = array();
        $sql = "SELECT * FROM user_skills WHERE
        user_id = $user_id";
        $result = $conn->query ($sql);
        while ($row = $result->fetch_assoc()){
            array_push ($skills, $row["skills"]);
        }

        //retrieve data from skills 
        $languages  = array();
        $sql = "SELECT * FROM user_languages WHERE
        user_id = $user_id";
        $result = $conn->query ($sql);
        while ($row = $result->fetch_assoc()){
            array_push ($languages, $row["languages"]);
        }
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

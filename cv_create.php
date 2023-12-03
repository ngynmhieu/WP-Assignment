<?php
// print_r($_REQUEST);


if ($_SERVER["REQUEST_METHOD"] == "POST"){ //tao cv moi
    $user_id = $_POST['user_id'];
    $user_name  = $_POST['login_username'];
    include ('DBconnection.php');
    //insert table users
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $wanted_job = $_POST['wanted_job'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $upload_photo = addslashes(file_get_contents($_FILES["upload_photo"]["tmp_name"]));
    $email = $_POST['email'];
    $profile = $_POST['profile'];
    $phone_numbers = array_filter($_POST['phone_number']);
    $exp_jobs = array_filter($_POST['exp_job']);
    $exp_startDays = array_filter($_POST['exp_startDay']);
    $exp_endDays = array_filter($_POST['exp_endDay']);
    $exp_descriptions = array_filter($_POST['exp_description']);
    $edu_schools = array_filter($_POST['edu_school']);
    $edu_degrees = array_filter($_POST['edu_degree']);
    $edu_startDays = array_filter($_POST['edu_startDay']);
    $edu_endDays = array_filter($_POST['edu_endDay']);
    $edu_descriptions = array_filter($_POST['edu_description']);
    $certi_names = array_filter($_POST['certi_name']);
    $certi_descriptions = array_filter($_POST['certi_description']);
    $skills = array_filter($_POST['skills']);
    $languages = array_filter($_POST['languages']);
    
    
    if ($user_id > 0){ // xóa các cột có user_id bằng với user_id cần edit để sau đó add lại
        $sql_delete = "DELETE FROM user_login WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        $sql_delete = "DELETE FROM user_phoneNumber WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_error($conn);
        $sql_delete = "DELETE FROM user_experience WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_error($conn);
        $sql_delete = "DELETE FROM user_education WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_error($conn);
        $sql_delete = "DELETE FROM user_certification WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_error($conn);
        $sql_delete = "DELETE FROM user_skills WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_error($conn);
        $sql_delete = "DELETE FROM user_languages WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
        mysqli_error($conn);
        $sql_delete = "DELETE FROM users WHERE user_id = '$user_id'";
        mysqli_query($conn, $sql_delete);
    }
    
    //add lai du lieu
    $sql = "INSERT INTO users(first_name, last_name, wanted_job, country, city,
    address, date_of_birth, upload_photo, email, profile)
    VALUES ('$first_name', '$last_name', '$wanted_job', '$country', '$city',
    '$address', '$date_of_birth', '$upload_photo', '$email', '$profile')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $user_id = $conn->insert_id;
        
        //insert table phone number
        foreach ($phone_numbers as $index=>$phone_number){
            $phone_insert= $phone_number;
            $sql_insert = "INSERT INTO user_phoneNumber (user_id, phone_number)
            VALUES ('$user_id', '$phone_insert')";
            mysqli_query($conn, $sql_insert);
        }
    
        //insert table experience
        foreach ($exp_jobs as $index=>$exp_job){
            $job_insert= $exp_job;
            $startDay_insert = $exp_startDays[$index];
            $endDay_insert = $exp_endDays[$index];
            $description_insert = $exp_descriptions[$index];
    
            $sql_insert = "INSERT INTO user_experience (user_id, exp_job,
            exp_startDay, exp_endDay, exp_description)
            VALUES ('$user_id', '$job_insert', '$startDay_insert',
            '$endDay_insert', '$description_insert')";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    
        //insert table education
        foreach($edu_schools as $index=>$edu_school){
            $school_insert = $edu_school;
            $degree_insert = $edu_degrees[$index];
            $startDay_insert = $edu_startDays[$index];
            $endDay_insert = $edu_endDays[$index];
            $description_insert = $edu_descriptions[$index];
    
            $sql_insert = "INSERT INTO user_education (user_id, edu_school,
            edu_degree, edu_startDay, edu_endDay, edu_description)
            VALUES ('$user_id', '$school_insert', '$degree_insert',
            '$startDay_insert', '$endDay_insert', '$description_insert')";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    
        //insert table certification
        foreach ($certi_names as $index=>$certi_name){
            $name_insert = $certi_name;
            $description_insert = $certi_descriptions[$index];
            $sql_insert = "INSERT INTO user_certification (user_id, certi_name, certi_description)
            VALUES ('$user_id', '$name_insert', '$description_insert')";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    
        //insert table skills
        foreach($skills as $index=>$skill){ 
            $skill_insert = $skill;
            $sql_insert = "INSERT INTO user_skills (user_id, skills)
            VALUES ('$user_id', '$skill_insert')";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    
        //insert table languages
        foreach($languages as $index=>$language){ 
            $language_insert = $language;
            $sql_insert = "INSERT INTO user_languages (user_id, languages)
            VALUES ('$user_id', '$language_insert')";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }

        //insert cv_link_account
        $sql = "INSERT INTO cv_link_account(user_id, login_username)
        VALUES ('$user_id', '$user_name')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
header ('Location: home.php');
?>

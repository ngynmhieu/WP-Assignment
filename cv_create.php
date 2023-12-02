<?php
// print_r($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
    $phone_numbers = $_POST['phone_number'];
    foreach ($phone_numbers as $index=>$phone_number){
        if (empty($phone_number)) {
            continue;
        }
        $phone_insert= $phone_number;
        $sql_insert = "INSERT INTO user_phoneNumber (user_id, phone_number)
        VALUES ('$user_id', '$phone_insert')";
        mysqli_query($conn, $sql_insert);
    }

    //insert table experience
    $exp_jobs = $_POST['exp_job'];
    $exp_startDays = $_POST['exp_startDay'];
    $exp_endDays = $_POST['exp_endDay'];
    $exp_descriptions = $_POST['exp_description'];

    foreach ($exp_jobs as $index=>$exp_job){
        if (empty($exp_job)) {
            continue;
        }
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
    $edu_schools = $_POST['edu_school'];
    $edu_degrees = $_POST['edu_degree'];
    $edu_startDays = $_POST['edu_startDay'];
    $edu_endDays = $_POST['edu_endDay'];
    $edu_descriptions = $_POST['edu_description'];
    
    foreach($edu_schools as $index=>$edu_school){
        if (empty($edu_school)) {
            continue;
        }
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
    $certi_names = $_POST['certi_name'];
    $certi_descriptions = $_POST['certi_description'];
    foreach ($certi_names as $index=>$certi_name){
        if (empty($certi_name)) {
            continue;
        }
        $name_insert = $certi_name;
        $description_insert = $certi_descriptions[$index];
        $sql_insert = "INSERT INTO user_certification (user_id, certi_name, certi_description)
        VALUES ('$user_id', '$name_insert', '$description_insert')";
        mysqli_query($conn, $sql_insert); // execute sql insert
    }

    //insert table skills
    $skills = $_POST['skills'];
    foreach($skills as $index=>$skill){ 
        if (empty($skill)) {
            continue;
        }
        $skill_insert = $skill;
        $sql_insert = "INSERT INTO user_skills (user_id, skills)
        VALUES ('$user_id', '$skill_insert')";
        mysqli_query($conn, $sql_insert); // execute sql insert
    }

    //insert table languages
    $languages = $_POST['languages'];
    foreach($languages as $index=>$language){ 
        if (empty($language)) {
            continue;
        }
        $language_insert = $language;
        $sql_insert = "INSERT INTO user_languages (user_id, languages)
        VALUES ('$user_id', '$language_insert')";
        mysqli_query($conn, $sql_insert); // execute sql insert
    }
    
}
header ('Location: home.php');
?>
<?php 
//set session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   include ('DBconnection.php');

// update table users
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $wanted_job = $_POST['wanted_job'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $upload_photo = $_POST['upload_photo'];
    $email = $_POST['email'];
    $profile = $_POST['profile'];

    $sql = "UPDATE users SET first_name = '$first_name', 
    last_name = '$last_name', wanted_job = '$wanted_job', 
    country = '$country', city = '$city', address = '$address', 
    date_of_birth = '$date_of_birth', upload_photo = '$upload_photo', 
    email = '$email', profile = '$profile' WHERE user_id = $user_id";
    // Execute query
    if (mysqli_query($conn, $sql)) {
        echo "CV was successfully updated.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

//update table phone number
    $phone_numbers = $_POST['phone_number']; 
    // phone numbers is all phonenumbers sent from user
    $sql = "SELECT * FROM user_phoneNumber WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $ids = mysqli_fetch_all ($result,MYSQLI_ASSOC);
    //phone_number_id cua tat ca so dien thoai co cung user id

    foreach($phone_numbers as $index=>$phone_number){ 
        if ($index < count($ids) ){ //update phone number
            $phone_update = $phone_number; 
            $id = $ids[$index]['phone_number_id']; //lay id cua dong thu index
            $sql_update = "UPDATE user_phoneNumber 
            SET phone_number = '$phone_update'
            WHERE phone_number_id = '$id'";
            mysqli_query($conn, $sql_update);
        }
        else if ($index >= $num ){ // insert new phone number
            $phone_insert= $phone_number;
            $sql_insert = "INSERT INTO user_phoneNumber (user_id, phone_number)
            VALUES ('$user_id', '$phone_insert')";
            mysqli_query($conn, $sql_insert);
        }
    }

//update table experience
    $exp_jobs = $_POST['exp_job'];
    $exp_startDays = $_POST['exp_startDay'];
    $exp_endDays = $_POST['exp_endDay'];
    $exp_descriptions = $_POST['exp_description'];
    $sql = "SELECT * FROM user_experience WHERE user_id = $user_id";
    $result = mysqli_query ($conn, $sql);
    $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    //all exp_id from database
    foreach($exp_jobs as $index=>$exp_job){ 
        if ($index < count($ids) ){ //update 
            $jobs_update = $exp_job;
            $startDay_update = $exp_startDays[$index];
            $endDay_update = $exp_endDays[$index];
            $description_update = $exp_descriptions[$index];


            $id = $ids[$index]['exp_id']; //lay id cua dong thu index
            $sql_update = "UPDATE user_experience 
            SET exp_job = '$jobs_update',
            exp_startDay = '$startDay_update',
            exp_endDay = '$endDay_update',
            exp_description = '$description_update'
            WHERE exp_id = '$id'";
            mysqli_query($conn, $sql_update); // execute sql update
        }
        else if ($index >= $num ){ // insert
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
    }
    
//update table education
    $edu_schools = $_POST['edu_school'];
    $edu_degrees = $_POST['edu_degree'];
    $edu_startDays = $_POST['edu_startDay'];
    $edu_endDays = $_POST['edu_endDay'];
    $edu_descriptions = $_POST['edu_description'];
    $sql = "SELECT * FROM user_education WHERE user_id = $user_id";
    $result = mysqli_query ($conn, $sql);
    $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);


    //all exp_id from database
    foreach($edu_schools as $index=>$edu_school){ 
        if ($index < count($ids) ){ //update 
            $school_update = $edu_school;
            $degree_update = $edu_degrees[$index];
            $startDay_update = $edu_startDays[$index];
            $endDay_update = $edu_endDays[$index];
            $description_update = $edu_descriptions[$index];


            $id = $ids[$index]['edu_id']; //lay id cua dong thu index
            $sql_update = "UPDATE user_education 
            SET edu_school = '$school_update',
            edu_degree = '$degree_update',
            edu_startDay = '$startDay_update',
            edu_endDay = '$endDay_update',
            edu_description = '$description_update'
            WHERE edu_id = '$id'";
            mysqli_query($conn, $sql_update); // execute sql update
        }
        else if ($index >= $num ){ // insert
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
    }


//update table certification
    $certi_names = $_POST['certi_name'];
    $certi_descriptions = $_POST['certi_description'];
    $sql = "SELECT * FROM user_certification WHERE user_id = $user_id";
    $result = mysqli_query ($conn, $sql);
    $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);


    //all exp_id from database
    foreach($certi_names as $index=>$certi_name){ 
        if ($index < count($ids) ){ //update 
            $name_update = $certi_name;
            $description_update = $certi_descriptions[$index];

            $id = $ids[$index]['edu_id']; //lay id cua dong thu index
            $sql_update = "UPDATE user_education 
            SET certi_name = '$name_update',
            edu_description = '$description_update'
            WHERE certi_id = '$id'";
            mysqli_query($conn, $sql_update); // execute sql update
        }
        else if ($index >= $num ){ // insert
            $name_insert = $certi_name;
            $description_insert = $certi_descriptions[$index];

            $sql_insert = "INSERT INTO user_education (user_id, certi_name,
            certi_description)
            VALUES ('$user_id', '$name_insert', '$description_insert')";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    }

//update table skills
    $skills = $_POST['skills'];
    $sql = "SELECT * FROM user_skills WHERE user_id = $user_id";
    $result = mysqli_query ($conn, $sql);
    $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);


    //all exp_id from database
    foreach($skills as $index=>$skill){ 
        if ($index < count($ids) ){ //update 
            $skill_update = $skill;

            $id = $ids[$index]['skills_id']; //lay id cua dong thu index
            $sql_update = "UPDATE user_skills 
            SET skills = '$skill_update'
            WHERE skills_id = '$id'";
            mysqli_query($conn, $sql_update); // execute sql update
        }
        else if ($index >= $num ){ // insert
            $skill_insert = $skill;

            $sql_insert = "INSERT INTO user_skills (user_id, skills)
            VALUES ('$user_id', '$skill_insert)";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    }

//update table languages
    $languages = $_POST['languages'];
    $sql = "SELECT * FROM user_languages WHERE user_id = $user_id";
    $result = mysqli_query ($conn, $sql);
    $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);


    //all exp_id from database
    foreach($languages as $index=>$language){ 
        if ($index < count($ids) ){ //update 
            $language_update = $language;

            $id = $ids[$index]['languages_id']; //lay id cua dong thu index
            $sql_update = "UPDATE user_languages 
            SET languages = '$language_update'
            WHERE languages_id = '$id'";
            mysqli_query($conn, $sql_update); // execute sql update
        }
        else if ($index >= $num ){ // insert
            $language_insert = $language;

            $sql_insert = "INSERT INTO user_languages (user_id, languages)
            VALUES ('$user_id', '$language_insert)";
            mysqli_query($conn, $sql_insert); // execute sql insert
        }
    }
    
}

  
?>
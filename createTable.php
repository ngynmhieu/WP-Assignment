<?php
// print_r($_REQUEST);


if ($_SERVER["REQUEST_METHOD"] == "POST"){ //tao cv moi
    $user_id = $_POST['user_id'];
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
        
    if ($user_id == 0){
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
    }

    
    else if ($user_id > 0){//thay doi cv co san
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

        //update phone table
        $sql = "SELECT * FROM user_phoneNumber WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        $ids = mysqli_fetch_all ($result,MYSQLI_ASSOC);
        
        //phone_number_id cua tat ca so dien thoai co cung user id
        $num = count($ids);
        foreach($phone_numbers as $index=>$phone_number){ 
            if ($index < $num){ //update phone number
                $phone_update = $phone_number; 
                $id = $ids[$index]['phone_number_id']; //lay id cua dong thu index
                $sql_update = "UPDATE user_phoneNumber 
                SET phone_number = '$phone_update'
                WHERE phone_number_id = '$id'";
                mysqli_query($conn, $sql_update);
            }
            else if ($index > $num ){ // insert new phone number
                $phone_insert= $phone_number;
                $sql_insert = "INSERT INTO user_phoneNumber (user_id, phone_number)
                VALUES ('$user_id', '$phone_insert')";
                mysqli_query($conn, $sql_insert);
            }
        }

        //update exp table
        $sql = "SELECT * FROM user_experience WHERE user_id = $user_id";
        $result = mysqli_query ($conn, $sql);
        $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        //all exp_id from database
        $num = count($ids);
        foreach($exp_jobs as $index=>$exp_job){ 
            if ($index <  $num ){ //update 
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
        

        //update edu table
        $sql = "SELECT * FROM user_education WHERE user_id = $user_id";
        $result = mysqli_query ($conn, $sql);
        $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
    
        //all exp_id from database
        $num = count($ids);
        foreach($edu_schools as $index=>$edu_school){ 
            if ($index <  $num ){ //update 
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


        //update certi table
        $sql = "SELECT * FROM user_certification WHERE user_id = $user_id";
        $result = mysqli_query ($conn, $sql);
        $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
    
        //all exp_id from database
        $num = count($ids);
        foreach($certi_names as $index=>$certi_name){ 
            if ($index <  $num){ //update 
                $name_update = $certi_name;
                $description_update = $certi_descriptions[$index];
    
                $id = $ids[$index]['certi_id']; //lay id cua dong thu index
                $sql_update = "UPDATE user_certification 
                SET certi_name = '$name_update',
                certi_description = '$description_update'
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

        //update skill table
        $sql = "SELECT * FROM user_skills WHERE user_id = $user_id";
        $result = mysqli_query ($conn, $sql);
        $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
    
        //all exp_id from database
        $num = count($ids);
        foreach($skills as $index=>$skill){ 
            if ($index <  $num ){ //update 
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

        //update language table
        $sql = "SELECT * FROM user_languages WHERE user_id = $user_id";
        $result = mysqli_query ($conn, $sql);
        $ids = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
    
        //all exp_id from database
        $num = count($ids);
        foreach($languages as $index=>$language){ 
            if ($index < $num ){ //update 
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
    
}
header ('Location: home.php');
?>
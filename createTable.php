<?php
include('DBconnection.php');


// create table products
// $sql = "CREATE TABLE users (
//     user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     first_name VARCHAR(50) NOT NULL,
//     last_name VARCHAR(50) NOT NULL,
//     wanted_job VARCHAR(50) NOT NULL,
//     country VARCHAR(50) NOT NULL,
//     city VARCHAR(50) NOT NULL,
//     address VARCHAR(50) NOT NULL,
//     date_of_birth DATE NOT NULL,
//     upload_photo VARCHAR(225) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     profile VARCHAR(200) NOT NULL

// )";

// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

// // create table phone number
// $sql = "CREATE TABLE user_phoneNumber (
//     phone_number_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT (6) UNSIGNED,
//     phone_number VARCHAR(10) NOT NULL,
//     FOREIGN KEY (user_id) REFERENCES users(user_id)
// )";
// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

// // create table experience
// $sql = "CREATE TABLE user_experience (
//     exp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT (6) UNSIGNED,
//     exp_job VARCHAR(50) NOT NULL,
//     exp_startDay DATE,
//     exp_endDay DATE,
//     exp_description VARCHAR (200),
//     FOREIGN KEY (user_id) REFERENCES users(user_id)
// )";
// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

// // create table education
// $sql = "CREATE TABLE user_education (
//     edu_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT (6) UNSIGNED,
//     edu_school VARCHAR(50) NOT NULL,
//     edu_degree VARCHAR(50) NOT NULL,
//     edu_startDay DATE,
//     edu_endDay DATE,
//     edu_description VARCHAR (200),
//     FOREIGN KEY (user_id) REFERENCES users(user_id)
// )";
// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

// // create table certification
// $sql = "CREATE TABLE user_certification (
//     certi_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT (6) UNSIGNED,
//     certi_name VARCHAR(50) NOT NULL,
//     certi_description VARCHAR (200),
//     FOREIGN KEY (user_id) REFERENCES users(user_id)
// )";
// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

// // create table skills
// $sql = "CREATE TABLE user_skills (
//     skills_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT (6) UNSIGNED,
//     skills VARCHAR(50) NOT NULL,
//     FOREIGN KEY (user_id) REFERENCES users(user_id)
// )";
// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

// // create table languages
// $sql = "CREATE TABLE user_languages (
//     languages_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT (6) UNSIGNED,
//     languages VARCHAR(50) NOT NULL,
//     FOREIGN KEY (user_id) REFERENCES users(user_id)
// )";
// if ($conn->query($sql) === TRUE){
    //     echo "Successfully created table products";
    // }
    // else{
        //     echo "ERROR creating table products" . $conn->error;
        // }
        
        // create table users
//     $sql = "CREATE TABLE user_login (
//         login_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         user_id INT (6) UNSIGNED,
//         login_username VARCHAR(30) NOT NULL,
//         login_password VARCHAR(255) NOT NULL,
//         FOREIGN KEY (user_id) REFERENCES users(user_id)
//  )";

// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table users";
// }
// else{
//     echo "ERROR creating table users" . $conn->error;
// }
// create table link 

// Đổi kiểu dữ liệu cột upload_photo

// $sql = "ALTER TABLE users MODIFY upload_photo BLOB;";
// if ($conn->query($sql) === TRUE){
//     echo "Successfully created table products";
// }
// else{
//     echo "ERROR creating table products" . $conn->error;
// }

xoa bangr user_login
$sql = "DROP TABLE IF EXISTS user_login";
mysqli_query($conn, $sql);
// tao lai bang user_login
$sql = "CREATE TABLE user_login (
    login_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login_username VARCHAR(30) NOT NULL,
    login_password VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE cv_link_account (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT (6) UNSIGNED,
    login_username VARCHAR(30) NOT NULL
)";
mysqli_query($conn, $sql);


?>
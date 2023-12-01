<?php
    //create connection
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DROP DATABASE CV_Online";
    $conn->query($sql);
    if (mysqli_query($conn, $sql)) {
        echo "Database deleted successfully";
    } else {
        echo "Database failed to delete";
    }
    $conn->close();
?>
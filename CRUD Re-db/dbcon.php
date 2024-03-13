<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "teachers_crud";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connection Successfully.";
    } catch(PDOException $e) {
        echo "Failed Connection!!" . $e->getMessage();
    }   

?>
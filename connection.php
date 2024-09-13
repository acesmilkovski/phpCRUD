<?php
    $servername = "localhost";
    $username = "root";
    $password = "Miskin@1982";
    $conn;
    try{
        $conn = new PDO("mysql:host=$servername; dbname=EmployeeDB;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


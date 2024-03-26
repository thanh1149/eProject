<?php
    session_start();
    // connect to MySQL server
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function init_connection(){
        global $conn;
        $servername ="localhost";
        $username = "root";
        $password = "";
        $dbname = "project-demo";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    

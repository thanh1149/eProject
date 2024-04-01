<?php
    session_start();
    // connect to MySQL server
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // connect to db
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
// =========================================================
    function check_login() {
        if(empty($_SESSION['name'])){
            header('location:login.php');
        }
    }

    //generate random password for reset password
    function generateRandomPassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < 5; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
<?php
session_start();
require_once __DIR__ . "/../function.php";
init_connection();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $password = $_POST["password"];
    $check_query = "SELECT * FROM admin WHERE `name` = ? AND `password`=?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $name,$password);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $name;
        echo '<script>alert("Login succesfull!");</script>';
        echo '<script>window.location.href = "admin.php";</script>';
        exit;
    }else{
        echo '<script>alert("Wrong username or password!");</script>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" >
    <title>Admin login Form</title>
</head>
<body>
    <div class="container-fluid">
        <form class="mx-auto" method="POST">
            <h4 class="text-center">Login</h4>
            <div class="mb-3 mt-5">
                <label for="name" class="form-label">Admin Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

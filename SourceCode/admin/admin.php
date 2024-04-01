<?php
require_once __DIR__ . "/../function.php";
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: admin-login.php"); // Chuyển hướng người dùng đến trang đăng nhập nếu chưa đăng nhập
//     exit;
// }
init_connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <script>
        function logout() {
        window.location.href = "admin-login.php";
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="admin.php">
                <?php
                $query = "SELECT name FROM admin LIMIT 1";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                echo "Hello, " . $row['name'];
                ?>
            </a>
            <button class="btn btn-link text-white" style="text-decoration: none" onclick="logout()">Exit</button>
        </div>
    </nav>
    <!-- content -->
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><a href="user-mng.php" class="subheading-link">USER MANAGE</a></div>
                User management (username,password,...)
            </div>
            <span class="badge text-bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><a href="contact-mng.php" class="subheading-link">USER MESSAGES</a></div>
                All messages from "contact-us"
            </div>
            <span class="badge text-bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><a href="#" class="subheading-link">Subheading</a></div>
                Content for list item
            </div>
            <span class="badge text-bg-primary rounded-pill">14</span>
        </li>
    </ol>
    </div>
</body>

</html>
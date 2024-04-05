<?php
session_start();
require_once __DIR__ . "/../function.php";
init_connection();

if (!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header("Location: admin-login.php");
    exit;
}
$id = $_SESSION['id'];
$name = $_SESSION['name'];
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
                    if (isset($_SESSION['name'])) {
                        echo "Hello, " . $_SESSION['name'];
                    }
                ?>
            </a>
            <a class="nav-link log" href="admin-logout.php"><i class="fas fa-sign-in-alt"></i>Exit</a>
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
                <div class="fw-bold"><a href="ticket-mng.php" class="subheading-link">Ticket Management</a></div>
                Search for user ticket infor
            </div>
            <span class="badge text-bg-primary rounded-pill">14</span>
        </li>
    </ol>
    </div>
</body>

</html>
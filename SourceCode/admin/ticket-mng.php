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

$query_cart = "SELECT * FROM `ticket-cart`";
$result_cart = mysqli_query($conn, $query_cart);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    
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
    <table style="margin-top:10px">
        <thead>
            <tr>
                <th>Username</th>
                <th>Tên vé</th>
                <th>Giá vé</th>
                <th>Số lượng</th>
                <th>Ngày đặt vé</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_cart)) {
                $user_id = $row['user_id'];
                $query_user = "SELECT `name` FROM `users` WHERE `id` = '$user_id'";
                $result_user = mysqli_query($conn, $query_user);
                $user_info = mysqli_fetch_assoc($result_user);
                $username = $user_info['name'];

                echo "<tr>";
                echo "<td>$username</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
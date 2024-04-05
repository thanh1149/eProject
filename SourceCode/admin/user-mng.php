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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $userId = $_POST['id'];
    $query = "DELETE FROM users WHERE id = $userId";
    mysqli_query($conn, $query);
}
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
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                $.ajax({
                    type: "POST",
                    url: "user-mng.php",
                    data: { id: userId },
                    success: function(response) {
                        alert("User deleted successfully");
                        location.reload();
                    }
                });
            }
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
    <div class="container mt-5">
        <h2 class="text-center">User Information</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM users";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td><button class='btn btn-danger' onclick='deleteUser(" . $row['id'] . ")'>Delete</button></td>";
                    echo "</tr>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
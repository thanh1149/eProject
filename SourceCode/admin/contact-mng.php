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
    $query = "UPDATE contact SET `condition` = 1 WHERE id = $userId";
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
        function markAsRead(id, btn) {
            $.ajax({
                type: "POST",
                url: "contact-mng.php",
                data: { id: id },
                success: function(response) {
                    // Sau khi cập nhật trạng thái đã xem, không cần xóa dòng
                    // Cập nhật nút "Seen" để không thể nhấn được
                    $(btn).prop('disabled', true).removeClass('btn-info').addClass('btn-secondary').text('Seen');
                },
                error: function(xhr, status, error) {
                    alert("Error: " + xhr.responseText);
                }
            });
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
        <h2 class="text-center">User Messages</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM contact";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>";
                    if ($row['condition'] == 0) {
                        echo "<button class='btn btn-info' onclick='markAsRead(" . $row['id'] . ", this)'>Seen</button>";
                    }else{
                        echo 'Seen';
                    }
                    echo "</td>";
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
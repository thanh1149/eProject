<?php
require_once 'function.php';
session_start();

if(isset($_SESSION['name'])) {
    init_connection();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }$name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="css/fe-style.css" />
    <script>
        function logout() {
            $.ajax({
                url: 'logout.php', // Đường dẫn đến file xử lý đăng xuất
                type: 'POST', // Phương thức gửi yêu cầu
                success: function(response) {
                    // Chuyển hướng về trang đăng nhập sau khi đăng xuất
                    window.location.href = "login.php";
                }
            });
        }
    </script>
</head>

<body>
    <div class="container-fluid" style="margin: 0">
        <div class="row">
            <div class="col-md-8">
                <div class="img-logo">
                    <a class="navbar-brand" href="home.php"><img src="image/logo.jpg " alt="Logo"></a>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="header">
                    <div class="hotnum">
                        <span class="hotline">HotLine:</span>
                        <span class="numberphone">093 4583 480</span>
                        <br>
                        <span class="hotline">Email:</span>
                        <span class="numberphone">nnnthanh1149@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg bg-danger-subtle text-danger-emphasis">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#"><img src="./image/logo.jpg " alt="Logo"></a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-left">
                    <li class="nav-item ">
                        <a class="nav-link" href="home.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">EXPERIENCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">EVENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ENTERTAINMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">RESTAURANT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            MORE
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="map.php">MAP</a></li>
                            <li><a class="dropdown-item" href="#">GALLERY</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-right">
                    <li class="nav-item">
                        <?php
                        $query = "SELECT name FROM users WHERE `name` = '$name'";
                        $result = mysqli_query($conn, $query);
                        if($result){
                            $row = mysqli_fetch_assoc($result);
                            echo "Hello, " . $row['name'];
                        }else{
                            echo "Error: " . mysqli_error($conn); 
                        }   
                        ?>
                    </li>
                    <button class="btn btn-link text-black" style="text-decoration: none" onclick="logout()">Exit</button>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ticket main -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                        <h2 class="text-center">Shopping Cart Date</h2>
                        <div class="col-md-12">
                            <div class="row">
                                <?php
                                    $query = "SELECT * FROM ticket";
                                    if ($result = mysqli_query($conn, $query)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <div class="col-md-4">
                                                    <form method="get" action="buy-ticket.php?id=<?= $row['id'] ?>">
                                                        <img src="/ticket/ <? $row['ticket_img'] ?>" style='height:150px;'>
                                                        <h5 class="text-center"><?= $row['ticket_name'] ?></h5>
                                                        <h5 class="text-center"><?= number_format($row['ticket_price'],3) ?></h5>
                                                    </form>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "Không có dữ liệu hiển thị.";
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Lỗi truy vấn: " . mysqli_error($conn);
                                    }                      
                        ?>
                        </div>
                        </div>
                </div>
                <div class="col-md-6">
                        <h2 class="text-center">Iteam Selected</h2>
                </div>
            </div>
        </div>
    </div>


    <?php include('./nav+footer/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</body>

</html>
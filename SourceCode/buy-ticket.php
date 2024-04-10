<?php
session_start();
require_once 'function.php';
init_connection();

if (!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id'];
$name = $_SESSION['name'];

// cart

if(isset($_POST["add"])){
    $ticket_id = $_GET["id"];
    $ticket_name = $_POST["ticket_name"];
    $price = $_POST["ticket_price"];
    $quantity = $_POST["quantity"];
    $date = $_POST["datepicker"];

    $sql = "INSERT INTO `ticket-cart`(`name`, `price`,`quantity`,`date`,`user_id`) VALUES ('$ticket_name','$price','$quantity','$date','$id');";
    mysqli_query($conn, $sql);
    
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
    <link rel="stylesheet" href="css/buy-ticket.css" />
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
    <nav class="navbar sticky-top navbar-expand-lg ">
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
                        <a class="nav-link" href="about-us.php">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="experience.php">EXPERIENCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.php">EVENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="entertainment.php">ENTERTAINMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restaurant.php">RESTAURANT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            MORE
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="map.php">MAP</a></li>
                            <li><a class="dropdown-item" href="gallery.php">GALLERY</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-right">
                    <li class="nav-item">
                        <?php
                            if (isset($_SESSION['name'])) {
                                echo "Hello, " . $_SESSION['name'];
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link log" href="logout.php"><i class="fas fa-sign-in-alt"></i>Exit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ticket infor -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center" style="padding-top:10px;">Ticket List</h2>
                <div class="row" id="ticket-list">
                    <?php
                    $query = "SELECT * FROM ticket ORDER BY id ASC";
                    if ($result = mysqli_query($conn, $query)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <div class="col-md-4">
                                    <form method="post" action="buy-ticket.php?action=add&id=<?= $row['id'] ?>" class="ticket-form">
                                        <img src="<?php echo $row['ticket_img'] ?>" class="ticket-image">
                                        <h5 class="text-center ticket-name"><?= $row['ticket_name'] ?></h5>
                                        <h5 class="text-center ticket-price"><?= number_format($row['ticket_price'], 3) ?></h5>
                                        <input type="hidden" name="ticket_name" value="<?= $row['ticket_name'] ?>">
                                        <input type="hidden" name="ticket_price" value="<?= $row['ticket_price'] ?>">
                                        <input type="number" name="quantity" value="1" class="form-control ticket-quantity">
                                        <input type="date"  name="datepicker" class="form-control" required>
                                        
                                        <input type="submit" name="add" class="btn btn-warning btn-block my-2 ticket-submit" value="Add to cart">
                                    </form>
                                </div>
                    <?php
                            }
                        } else {
                            echo "<div class='col-md-12'><p class='text-center'>Không có dữ liệu hiển thị.</p></div>";
                        }
                        mysqli_free_result($result);
                    } else {
                        echo "<div class='col-md-12'><p class='text-center'>Lỗi truy vấn: " . mysqli_error($conn) . "</p></div>";
                    }
                    ?>
                </div>
                <div class="text-center">
                    <a href="buy-ticket.php" class="btn btn-primary">Ticket type</a>
                    <a href="ticket-cart.php" class="btn btn-success">Ticket Cart</a>
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
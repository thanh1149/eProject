<?php
require_once 'function.php';
session_start();
init_connection();

if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    header("Location: login.php");
    exit(); 
}
// cart
if(isset($_GET["action"]) && $_GET["action"] == "delete"){
    $ticket = $_GET["name"];
    $deleteQuery = "DELETE FROM `ticket-cart` WHERE `name` = '$ticket' AND `user_id` = '$user_id'";
    mysqli_query($conn, $deleteQuery);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="css/buy-ticket.css" />
    <script>
        function logout() {
            $.ajax({
                url: 'logout.php', 
                type: 'POST',
                success: function(response) {
                    window.location.href = "login.php";
                }
            });
        }

    //     $(document).ready(function() {
    //         $('#exampleModal').on('hidden.bs.modal', function () {
    //     window.location.href = "buy-ticket.php"; 
    //     });
    // });


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
    <!-- ticket cart -->
    <div class="table_container">
        <table>
            <tr>
                <th>Ticket Name</th>
                <th>Ticket Price</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Total Price</th>
                <th>Remove Item</th>
            </tr>
            <?php
            $query = "SELECT * FROM `ticket-cart` WHERE `user_id` = '$user_id' ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            $total = 0;
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["price"];?></td>
                        <td><?php echo $row["quantity"];?></td>
                        <td><?php echo $row["date"];?></td>
                        <td><?php echo number_format($row["quantity"]*$row["price"],2);?></td>
                        <td><a href="ticket-cart.php?action=delete&name=<?php echo $row["name"];?>"><span>Remove Item</span></a></td>
                        <?php
                        $total = $total + ($row["quantity"]*$row["price"]);
                    }
                }
                ?>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo number_format($total, 2);?></td>
                    <td></td>
                </tr>
        </table>
    </div>
    <div class="text-center">
        <a href="buy-ticket.php" class="btn btn-primary">Ticket type</a>
        <a href="ticket-cart.php" class="btn btn-success">Ticket Cart</a>
    </div>
    
    <div class="text-center">
        <button type="button" class="btn btn-primary" id="doneBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom:10 px;">Done</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                The tickets will be paid for directly upon arrival at the park. Please purchase the tickets in the correct quantity and avoid placing multiple orders
                </div>
                <div class="modal-footer">
                    <a href="buy-ticket.php">Close</a>
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
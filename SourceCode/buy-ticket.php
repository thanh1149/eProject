<?php
require_once 'function.php';
init_connection();
// check_login();
$sql_select_tickets = "SELECT * FROM ticket";
$result = $conn->query($sql_select_tickets);

$tickets = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row; 
    }
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
            window.location.href = "login.php";
        }

        $(document).ready(function () {
        $('.ticket-info-toggle').click(function () {
            var inforText = $(this).parents('.card-body').find('.ticket-infor').text();
            $('#ticketInfoContent').text(inforText);
        });
    });
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
                        $query = "SELECT name FROM users LIMIT 1";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Hello, " . $row['name'];
                        ?>
                    </li>
                    <button class="btn btn-link text-black" style="text-decoration: none" onclick="logout()">Exit</button>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ticket main -->
    <div class="container mt-5">
    <div class="row">
        <?php foreach ($tickets as $ticket) { ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $ticket['ticket_img']; ?>" class="card-img-top" alt="Ticket Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ticket['ticket_name']; ?></h5>
                        <p class="card-text ticket-infor"><?php echo $ticket['ticket_infor']; ?></p>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-info btn-sm ticket-info-toggle" data-toggle="modal" data-target="#ticketModal">!</button>
                            </div>
                            <div class="col-6 text-right">
                                <p class="card-text"><strong><?php echo $ticket['ticket_price']; ?></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticketModalLabel">Ticket Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="ticketInfoContent"></p>
            </div>
        </div>
    </div>
</div>


    <?php include('./nav+footer/footer.php'); ?>
</body>

</html>
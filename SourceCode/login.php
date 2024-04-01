<?php
require_once 'function.php';
init_connection();
// function login($name,$password){
//     global $conn;
//     $sql = "SELECT id FROM users WHERE `name` = ? AND `password`= ?";
// 	$stmt = $conn->prepare($sql);
// 	$stmt->bind_param('ss', $name, $password);
// 	$stmt->execute();
// 	$result = $stmt->get_result();
// 	$users = $result->fetch_all();
// 	return $users ? true : false;
// }
//     $name = $_POST["name"] ?? '';
//     $password = $_POST["password"] ?? '';

//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         init_connection();
//         $success = login($name, $password);
//         if ($success) {
//             $_SESSION['logged'] = true;
//             header("Location:buy-ticket.php");
//         } else {
//             echo '<script>alert("Wrong username or password!");</script>';
//         }
//     }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $password = $_POST["password"];
    $check_query = "SELECT * FROM users WHERE `name` = ? AND `password`=?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $name,$password);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if($result->num_rows>0){
        echo '<script>alert("Login succesfull!");</script>';
        echo '<script>window.location.href = "buy-ticket.php";</script>';
        exit;
    }else{
        echo '<script>alert("Wrong username or password!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="css/fe-style.css" />
</head>
<body>
    <?php include('nav+footer/navbar.php'); ?>
    <!-- login form -->
    <div class="container-fluid product-main register-form bg-body-tertiary" id="product">
        <div class="container">
            <div class="con-title " style="padding-top: 20px">
                USER LOGIN
                <div class="con-title-i"></div>
            </div>
            <div class="cart-main">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="item-login" style="padding-top: 20px">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" class="form-control" placeholder="Your username" name="name" required>
                                    <?php if (isset($error['name'])) : ?>
                                        <p class="text-danger"><?php echo ($error['name']); ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Password:</label>
                                    <input type="password" class="form-control" placeholder="*******" name="password" required>
                                    <?php if (isset($error['password'])) : ?>
                                        <p class="text-danger"><?php echo ($error['password']); ?></p>
                                    <?php endif ?>
                                </div>

                                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Login Here</button> <br>
                                <hr>
                                <span> Don't have an account? <a href="register.php">Register here</a></span><br><br>
                                <span>Forget your password? <a href="reset-password.php">Reset here</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('nav+footer/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
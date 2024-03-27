<?php
require_once __DIR__ . "/../function.php";
init_connection();
$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $check_query = "SELECT * FROM user WHERE `name` = ? AND `password`=?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $name,$current_password);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if($result->num_rows > 0){
        $update_query = "UPDATE user SET `password` = ? WHERE `name` = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("ss",$new_password,$name);
        $update_stmt->execute();
        if($update_stmt->affected_rows > 0){
            echo '<script>alert("Change password succesfull!");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit;
        }
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
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="../css/fe-style.css" />
    <link rel="icon" href="logo.jpg"/>
</head>
<body>
    <?php include('../navbar.php'); ?>
    <!-- Change password form -->
    <div class="container-fluid product-main register-form bg-body-tertiary" id="product">
        <div class="container">
            <div class="con-title " style="padding-top: 20px">
                CHANGE PASSWORD
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
                                    <label for="">Current Password:</label>
                                    <input type="password" class="form-control" placeholder="*******" name="current_password" required>
                                    <?php if (isset($error['current_password'])) : ?>
                                        <p class="text-danger"><?php echo ($error['current_password']); ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for=""> New Password:</label>
                                    <input type="password" class="form-control" placeholder="*******" name="new_password" required>
                                    <?php if (isset($error['new_password'])) : ?>
                                        <p class="text-danger"><?php echo ($error['new_password']); ?></p>
                                    <?php endif ?>
                                </div>

                                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Change Password</button> <br>
                                <hr>
                                <span>Already have an account? <a href="login.php">Login here</a></span><br><br>
                                <span> Don't have an account? <a href="register.php">Register here</a></span><br><br>
                                <span> Forget password? <a href="reset-password.php">Reset password here</a></span><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
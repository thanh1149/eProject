<?php
require_once 'function.php';
init_connection();
generateRandomPassword();
$GLOBALS['message'] = '';

function resetPassword($name, $phone, $conn) {
    $sql = "SELECT * FROM user WHERE `name` ='$name' AND phone ='$phone'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $new_password = generateRandomPassword();
        $update_sql = "UPDATE user SET `password` ='$new_password' WHERE `name` ='$name'";
        if ($conn->query($update_sql) === TRUE) {
            $GLOBALS['message'] = "Your new password is " . $new_password  . ". Please save this password so you can change password after!!!";
        }else{
            echo " Loi khi cap nhat mat khau" .$conn->error;
        }
    }else {
        $GLOBALS['message'] = "No user or phone number found.";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    resetPassword($name, $phone, $conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="css/fe-style.css" />
</head>
<body>
    <?php include('navbar.php'); ?>
    <!-- Reset password form -->
    <?php
        if ($GLOBALS['message']){
            echo $GLOBALS['message'] ;
        }
    ?>
    <div class="container-fluid product-main register-form bg-body-tertiary" id="product">
        <div class="container">
            <div class="con-title " style="padding-top: 20px">
                RESET PASSWORD
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
                                    <label for="">Phone number:</label>
                                    <input type="number" class="form-control" placeholder="Your phone number" name="phone" required>
                                    <?php if (isset($error['phone'])) : ?>
                                        <p class="text-danger"><?php echo ($error['phone']); ?></p>
                                    <?php endif ?>
                                </div>

                                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Reset Here</button> <br>
                                <hr>
                                <span>Already have an account? <a href="login.php">Login here</a></span><br><br>
                                <span> Don't have an account? <a href="register.php">Register here</a></span><br><br>
                                <span> Change password after reset? <a href="change-password.php">Change password here</a></span><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
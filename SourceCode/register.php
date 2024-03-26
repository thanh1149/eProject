<?php
require_once 'function.php';
init_connection();
$message ='';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    
    $check_query = "SELECT * FROM user WHERE `name` = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $name);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if($result->num_rows>0){
        echo "Username exist";
    }else{
        $sql = "INSERT INTO user (`name`, email, phone,`password`) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        // if (!$stmt) {
        //     die("Error: " . mysqli_error($conn));
        // }
        $stmt->bind_param('ssss',$name, $email, $phone,$password);
        $stmt->execute();
        ?>
        <script>
            alert("Đăng ký thành công!");
            setTimeout(function() {
                window.location.href = "login.php";
            }, 1000);
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="css/fe-style.css" />
</head>
<body>
    <?php include('navbar.php'); ?>
    <!-- register form -->
    <div class="container-fluid product-main register-form bg-body-tertiary" id="product">
        <div class="container">
            <div class="con-title " style="padding-top: 20px">
                USER REGISTER
                <div class="con-title-i"></div>
            </div>
            <div class="cart-main">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="item-login" style="padding-top: 20px">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" class="form-control" placeholder="Nguyen Ngoc Thanh" name="name" required>
                                    <?php if (isset($error['name'])) : ?>
                                        <p class="text-danger"><?php echo ($error['name']); ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" placeholder="abc@gmail.com" name="email" required>
                                    <?php if (isset($error['email'])) : ?>
                                        <p class="text-danger"><?php echo ($error['email']); ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Phone number:</label>
                                    <input type="number" class="form-control" placeholder="0123454563" name="phone" required>
                                    <?php if (isset($error['phone'])) : ?>
                                        <p class="text-danger"><?php echo ($error['phone']); ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Password:</label>
                                    <input type="password" class="form-control" placeholder="*******" name="password" required>
                                    <?php if (isset($error['password'])) : ?>
                                        <p class="text-danger"><?php echo ($error['password']); ?></p>
                                    <?php endif ?>
                                </div>

                                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Register Here</button> <br>
                                <hr>
                                <span>Already have an account? <a href="login.php">Log in here</a></span>
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
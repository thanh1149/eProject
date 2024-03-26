<?php
require_once 'function.php';
init_connection();

$data =
    [
        "name" => addslashes(htmlspecialchars(postInput("name"))),
        "email" => addslashes(htmlspecialchars(postInput("email"))),
        "phone" => addslashes(htmlspecialchars(postInput("phone"))),
        "password" => addslashes(htmlspecialchars(password_hash(postInput("password"), PASSWORD_DEFAULT))),
        "address" => addslashes(htmlspecialchars(postInput("address")))
    ];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Bắt lỗi để trống
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = "Vui lòng nhập họ và tên";
    }
    if (postInput('email') == '') {
        $error['email'] = "Vui lòng nhập email";
    } else {
        $is_check = $db->fetchOne("user", "email = '" . $data['email'] . "' ");
        if ($is_check != NULL) {
            $error['email'] = "Email đã tồn tại !";
        }
    }
    if (postInput('phone') == '') {
        $error['phone'] = "Vui lòng nhập số điện thoại";
    }
    if (postInput('password') == '') {
        $error['password'] = "Vui lòng nhập mật khẩu";
    }
    if (postInput('address') == '') {
        $error['address'] = "Vui lòng nhập địa chỉ";
    }

    //Khi input không trống
    if (empty($error)) {
        $id_insert = $db->insert("user", $data);
        if ($id_insert) {
            $_SESSION['success'] = "Đăng ký thành công,mời bạn đăng nhập ";
            header("Location:login.php");
        } else {    
            $_SESSION['success'] = "Đăng ký thất bại";
        }
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
                                <span>Already have an account? <a href="#">Log in here</a></span>
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
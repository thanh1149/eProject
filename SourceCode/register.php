<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css" />
    <link rel="stylesheet" href="footer.css" />
    <link rel="stylesheet" href="register.css" />
</head>

<body>
    <?php include('navbar.php'); ?>
    <!-- register form -->
    <div class="container-fluid product-main" id="product">
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

                                <button type="submit" class="btn btn-success">Register Here</button> <br>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
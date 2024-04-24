<?php
require_once 'function.php';
init_connection();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $sql = "INSERT INTO contact (`name`,phone,`message`) VALUES ( ?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    if (!$stmt) {
            die("Error: " . mysqli_error($conn));
        }
    $stmt->bind_param('sss',$name, $phone, $message);
    $stmt->execute();
    ?>
    <script>
        alert("Message send !!!");
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merciado Amusement park</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="css/fe-style.css" />
</head>

<body>
    <?php include('nav+footer/navbar.php'); ?>      
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>

    <div class="container-fluid product-main register-form bg-body-tertiary" id="product">
        <div class="container">
            <div class="con-title " style="padding-top: 20px">
                CONTACT US
                <div class="con-title-i"></div>
            </div>
            <div class="cart-main">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="item-login" style="padding-top: 20px">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" class="form-control" placeholder="Your name" name="name" required>
                                    <?php if (isset($error['name'])) : ?>
                                        <p class="text-danger"><?php echo ($error['name']); ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" class="form-control" placeholder="Your phone number (ex: 092 xxxx xxx)" name="phone" required>
                                    <?php if (isset($error['phone'])) : ?>
                                        <p class="text-danger"><?php echo ($error['phone']); ?></p>
                                    <?php endif ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Message:</label>
                                    <textarea name="" id="" cols="30" rows="10" style ="width : 100%;"> 
                                    <?php if (isset($error['message'])) : ?>
                                        <p class="text-danger"><?php echo ($error['message']); ?></p>
                                    <?php endif ?>
                                    </textarea>
                                    <!-- <input type="text" class="form-control" name="message" required style="height: 100px;"> -->
                                    
                                    
                                </div>
                                <button type="submit" class="btn btn-success" style="margin-top: 10px;">SEND</button> <br>
                                
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
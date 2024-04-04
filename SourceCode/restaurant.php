<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/fe-style.css">
</head>

<body>
    <?php include('nav+footer/navbar.php'); ?>
    <div class="container">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Restaurant</li>
            </ol>
        </nav>
        <br>
        <div class="card-container">
            <div class="card">
                <img src="image/restaurant/1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Souvenir shops</h5>
                    <p class="card-text">Souvenir shops that offer little gifts with the logo of Sun World Danang Wonders will enrich your memory of this “Delightful Asia” vacation.</p>
                    <a href="restaurant 1.php" class="btn btn-primary">More</a>
                </div>
            </div>
            <div class="card">
                <img src="image/restaurant/3.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Panda Restaurant</h5>
                    <p class="card-text">SUSPENDED – Description: The restaurant is quintessentially Chinese. Its vintage setting duly fits for events. Services include buffet and à la carte...</p>
                    <a href="restaurant 2.php" class="btn btn-primary">More</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <?php include('nav+footer/footer.php'); ?>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merciado Amusement Park</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/fe-style.css">
    <style>
        .gallery-img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <?php include('nav+footer/navbar.php'); ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Gallery</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="image/gallery/1.jpeg" class="card-img-top gallery-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="image/gallery/2.jpeg" class="card-img-top gallery-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="image/gallery/3.jpeg" class="card-img-top gallery-img" alt="...">
                </div>
            </div>
            <!-- Add more cards for additional images -->
        </div>
    </div>

    <?php include('nav+footer/footer.php'); ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

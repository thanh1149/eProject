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
</head>

<body>
    <?php include('nav+footer/navbar.php'); ?>
    <div class="container">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Event</li>
            </ol>
        </nav>
        <br>
        <div class="card-container">
            <div class="card">
                <img src="image/home/home 5.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">LION DANCE – DRAGON DANCE</h5>
                    <p class="card-text">Mesmerizing Traditional Lion Dance – Dragon Dance from 19:30 – 20:00 every Saturday</p>
                    <a href="#" class="btn btn-primary">More</a>
                </div>
            </div>

            <div class="card">
                <img src="image/home/home 6.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">RANDOM DANCE KPOP</h5>
                    <p class="card-text">Energetic Random Dance from 19:30-20:00 every Saturday.</p>
                    <a href="#" class="btn btn-primary">More</a>
                </div>
            </div>

            <div class="card">
                <img src="image/home/home 7.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">RANDOM DANCE KPOP</h5>
                    <p class="card-text">Energetic Random Dance from 19:30-20:00 every Saturday.</p>
                    <a href="#" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
        <br><br>
        <?php include('nav+footer/footer.php'); ?>
        <!-- Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

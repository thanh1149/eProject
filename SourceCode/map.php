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
            <li class="breadcrumb-item active" aria-current="page">Map</li>
        </ol>
    </nav>
    <hr class="hr-map">
    <div class="container body-page">
        <br>
        <!-- MAP -->
        <div class="container">
            <div class="row justify-content-center">
                <!--google map short link -->
                <div class="mapouter">
                    <div class="gg-map">
                        <iframe width="600" height="500" id="gg-map"
                            src="https://bit.ly/4cF1Yj4"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>                        
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <h3>Merciado Amusent Park</h3>
            <h5>THE BEST PARK IN THE CITY</h5>
            <i class="fas fa-map-marker-alt"></i> Location
            <p> 285 Doi Can Street, Ba Dinh District, Hanoi</p>
        </div>
        <br>
    </div>

    <?php include('nav+footer/footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
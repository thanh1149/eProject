<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merciado Amusement Park</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/fe-style.css">
</head>

<body>
    <?php include('nav+footer/navbar.php'); ?>
    <div class="container">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center bg-transparent border-bottom-0">
                <li class="breadcrumb-item"><a href="home.php" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
        <br>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/home/home 1.jpeg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="image/home/home 2.jpeg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="image/home/home 3.jpeg" class="d-block w-100" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="image/home/home 4.jpeg" class="d-block w-100" alt="Slide 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        <div>
            <div id="clock-container"></div>
        </div>

        <script>
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                hours = (hours < 10) ? '0' + hours : hours;
                minutes = (minutes < 10) ? '0' + minutes : minutes;
                seconds = (seconds < 10) ? '0' + seconds : seconds;

                var timeString = hours + ':' + minutes + ':' + seconds;
                document.getElementById('clock-container').innerText = timeString;
            }
            setInterval(updateClock, 1000);
            updateClock();
        </script>

        <div class="nav-wrap">
            <section class="box-nature-park bg-light">
                <div class="box-bg-nature">
                    <h1 class="title"><b>Asia Park</b></h1>
                    <a href="map.php" class="d-flex align-items-center text-dark text-decoration-none">
                        <i class="icon-location fas fa-map-marker-alt"></i>
                        <span class="icon-location">
                            <h5>Location</h5>
                        </span>
                    </a>
                </div>
            </section>
        </div>

        <div class="card-container">
            <div class="card">
                <img src="image/home/home 5.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">THE ICONIC WATER PUPPET SHOW RETURNS TO ASIA PARK</h5>
                    <p class="card-text">Water puppetry – the perfect combination of singing, dancing, acting and the masterful control of various puppets, along with an array of effects has created a replica of the Vietnamese culture, where the traditional values harmonize with modern creativity. And Asia Park is bringing this show back to the Dragon Boat stage from December 31st, …</p>
                    <a href="home 1.php" class="btn btn-primary">More</a>
                </div>
            </div>

            <div class="card">
                <img src="image/home/home 6.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">ASIA PARK’S OPERATION SCHEDULE & TICKET PRICE POLICY IN 2024</h5>
                    <p class="card-text">We welcome you to the “Grand Wonder” expedition at Asia Park. Asia Park would like to announce our new operation schedule from January 1, 2024 as follows: Asia Park welcomes visitors from 15h00 – 22h00 everyday from Monday to Sunday. The Sun Wheel operates from 16h30 – 22h00. The outdoor game zone:15h00 – 21h30. The indoor …</p>
                    <a href="home 2.php" class="btn btn-primary">More</a>
                </div>
            </div>

            <div class="card">
                <img src="image/home/home 7.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">EXCITING WEEKEND EVENTS AT ASIA PARK</h5>
                    <p class="card-text">Welcome to the enchanting journey of “Brilliant Wonders” right here at Asia Park. Asia Park is delighted to offer FREE ENTRY to visitors for unlimited exploration and check-ins every day from 3 PM to 10 PM. At Asia Park, you’re invited to capture sweet moments with vibrant flower carpets and distinctive architectures inspired by various …</p>
                    <a href="home 3.php" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
        <br>
        <p class="mb-4">Date: October 31st, 2024</p>
        <p class="mb-4">Time: 7:00 PM - 12:00 AM</p>
        <p class="mb-4">Location: Asia Park, Da Nang, Vietnam</p>
        <p class="mb-4">Tickets are available for purchase online or at the venue. Don't miss out on this thrilling Halloween experience!</p>
        <br>
    </div>
    <br><br>
    <?php include('nav+footer/footer.php'); ?>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

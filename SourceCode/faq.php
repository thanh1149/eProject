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
    <?php include('navbar.php'); ?>

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
        </ol>
    </nav>

    <!-- picture -->
    <div class="container-fluid  d-flex justify-content-center">
        <a class="faq-pic"><img src="./image/faq.jpg"></a>
    </div>

    <!-- general question -->
    <h2 style="padding-left: 20px;;">General Questions</h2>
    <div class="accordion" id="general-question">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <b>At what age are children required to have an admission ticket?</b>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#general-question">
                <div class="accordion-body">
                    Children under the age of 3 do not require an admission ticket.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <b>How do I book a group visit to the park</b>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#general-question">
                <div class="accordion-body">
                Currently we have 3 type of ticket (adults,kids,family). You can view detail when you buy ticket.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <b>Am i permitted to bring my own food and beverages into the park?</b>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#general-question">
                <div class="accordion-body">
                No outsite food, beverages or coolers are allowed to be brought into park. Exceptions are made for Guests with special dietary needs to include food allergies and baby food and formula.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <b>Do you allow pets at Merciado Park?</b>
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#general-question">
                <div class="accordion-body">
                    Only service animals are permitted in the park. Merciado Park dose not have pet care facilities on site.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <b>Are there places in the park to store my belongings</b>
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#general-question">
                <div class="accordion-body">
                Lockers are available for rent in different areas of the main park and in Soak City. The park is not responsibel for lost or stolen iteams.
                </div>
            </div>
        </div>
    </div>

    <!-- food & beverage -->
    <h2 style="padding-left: 20px; margin-top:30px;">Food & Beverage</h2>
    <div class="accordion" id="food-beverage">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                    <b>Where can I have food</b>
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse " data-bs-parent="food-beverage">
                <div class="accordion-body">
                    There are plenty of restaurants in the Food area with great price. You can see more detail in Restaurant.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                <b>Can i book a place for events inside the park?</b>
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="food-beverage">
                <div class="accordion-body">
                Yes, if you want to book place for big events like weeding,.. please contact us via hotline: 093.4583.480 or email:nnnthanh1149@gmail.com for more detail.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                <b>How much does the food cost here?</b>
                </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="food-beverage">
                <div class="accordion-body">
                The prices for food here vary depending on the type and size, ranging from $5 to $15.
                </div>
            </div>
        </div>
    </div>
    <br>
    <span style="padding-left:20px"> Have more question? <a href="contact-us.php">Send your question here</a></span><br><br>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
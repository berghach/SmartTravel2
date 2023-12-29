<!DOCTYPE html>

<html>

<head>
    <title>SmartTravel - HOME</title>
    <meta name="description" content="An website for reserving the tickets.">
    <meta name="keywords" content="ticket, bus, ctm, travel, morocco, reservation">
    <meta charset="UTF-8">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/home.css">

</head>


<body>


<!-- HEADING -->
    <header>


    <!-- Nav Bar -->
    <?php
        include 'nav-bar.php';
    ?>
    <!-- Nav Bar -->


    <!-- Background image -->
    <div
        class="p-5 text-center bg-image"
        style="
        background-image: url('https://lp-cms-production.imgix.net/image_browser/european-city-break-by-bus.jpg?auto=format&q=75');
        background-repeat: no-repeat;
        background-size: cover;
        height: 700px;
        "
    >
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">SmartTravel</h1>
                    <h4 class="mb-3">Your Gateway to Seamless Journeys and Intelligent Adventures</h4>
                    <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button"
                        >Explore Now</a
                    >
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->


    </header>
<!-- HEADING -->


<div class="container mt-5">
  <div class="row">

        <div class="row">
        <div class="col-md-4 d-flex">
        <div class="card flex-fill">
            <img src="https://pc.kosokubus.com/include/ib/img/seats_page/nh.jpg" class="card-img-top" alt="Spacious Interior">
            <div class="card-body">
            <h5 class="card-title">Spacious</h5>
            <p class="card-text">Ample interior space for a comfortable journey.</p>
            </div>
        </div>
        </div>

        <div class="col-md-4 d-flex">
        <div class="card flex-fill">
            <img src="https://t3.ftcdn.net/jpg/04/12/13/26/360_F_412132684_f52Eb3d84CUbIu76j2vOGVJ8XuEwiAkD.jpg" class="card-img-top" alt="Comfortable Seating">
            <div class="card-body">
            <h5 class="card-title">Comfortable</h5>
            <p class="card-text">Plush and comfortable seating for a relaxing travel experience.</p>
            </div>
        </div>
        </div>

        <div class="col-md-4 d-flex">
        <div class="card flex-fill">
            <img src="https://images.inc.com/uploaded_files/image/1920x1080/getty_680286484_200013332000928076_381534.jpg" class="card-img-top" alt="Trustworthy Service">
            <div class="card-body">
            <h5 class="card-title">Trustworthy</h5>
            <p class="card-text">Reliable and trustworthy service for a secure travel experience.</p>
            </div>
        </div>
        </div>
        </div>

        

  </div>
</div>






<!-- Footer -->
<?php
    include 'footer.php';

    echo "Hello";
?>
<!-- Footer -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
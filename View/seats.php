<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/seats.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<form method="post" action="index.php?action=confirmReservation">
        <div class="d-flex flex-row">
            <label>Choose Seat</label>
            <div class="bus seat2-2 border-0 p-0">
                <?php
                $i = 1;
                $x = 1;
                while ($i <= $capacities) { ?>
                    <div class="seat-row-<?php echo $x; ?>">
                        <ol class="seats">
                            <?php
                            $y = 0;
                            while ($i <= $capacities && $y < 4) { ?>
                                <li class="seat">
                                    <input role="input-passenger-seat" name="selectedSeat" id="seat-radio-1-<?php echo $i; ?>" value="<?php echo $i; ?>" required="" type="radio">
                                    <label for="seat-radio-1-<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </label>
                                </li>
                                <?php
                                $y++;
                                $i++;
                            }
                            $x++;
                            ?>
                        </ol>
                    </div>
                <?php } ?>
            </div>

            <div class="text-left mt-2">
                <button class="btn btn-primary btn-xs mb-2">Available</button>
                <button class="btn btn-success btn-xs mb-2">Choosen</button>
                <button class="btn btn-danger btn-xs mb-2">Booked</button>
            </div>

            <div>
              <input placeholder="email" name="email_inputed"></input>
              <input placeholder="email" name="user_inputed"></input>
                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
            </div>
        </div>
    </form>
          </div>


</div>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<script>
    function updateSelectedSeat(seatNumber) {
        console.log('Updating selected seat:', seatNumber);
        document.getElementById('selectedSeat').value = seatNumber;
    }
</script>


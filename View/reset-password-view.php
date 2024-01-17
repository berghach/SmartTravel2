<?php

$userIsExist = 0;
// $id = "84646";
$id = $_GET["token"];
foreach($users as $user) {
  // print_r($user->getName());
  if($user->getId() == $id) {
    $userIsExist = 1;
  }
}

if(!$userIsExist) {
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartTravel - Reset password</title>
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
</head>
<body style="background-color:#E390B9;">
  <section class="vh-110">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://plus.unsplash.com/premium_photo-1677194562330-2210f33e2576?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="login form" class="img-fluid h-100 w-100" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="index.php?action=resetpassword&token=<?= $id ?>" method="post">

                  <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset your password!</h3>

                  <div class="form-outline mb-4">
                    <input type="password" name = "new_password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">New password</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name = "confirm_password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Confirm password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" >Save password</button>
                  </div>

                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
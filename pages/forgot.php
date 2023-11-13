<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forgot Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="../assets/img/favicon.png" rel="icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body style="background: url(../assets/img/background.png);background-position: center;
  background-size: cover;">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/apple-touch-icon.png" style="width: 100px;" alt="college logo">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Online Tutoring</h5>
                    <p class="text-center small">Online Tutoring</p>
                  </div>

                  <?php
                  if (isset($_SESSION['error'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php
                      echo $_SESSION['error'];
                      ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['error']);
                  } elseif (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success">
                      <?php
                      echo $_SESSION['status'];
                      ?>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                  }
                  ?>

                  <form role="form" action="../controllers/auth.php" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="ID" class="form-label">Email ID</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="ID" value="<?php if(isset($_SESSION['email'])) { echo($_SESSION['email']); } ?>" <?php if(isset($_SESSION['email'])) { echo('readonly'); } ?> required>
                        <div class="invalid-feedback">Please enter your Email ID</div>
                      </div>
                    </div>
                    <?php if(isset($_SESSION['email'])) {?>
                    <div class="col-12">
                      <label for="otp" class="form-label">Otp</label>
                      <input type="text" name="otp" class="form-control" id="otp" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>

                    <div class="col-12">
                      <label for="cpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" style="background-color: #5fcf80; border: #5fcf80;"
                        name="forgot_verify_btn" type="submit">Submit</button>
                    </div>
                    <?php 
                  unset($_SESSION['email']);
                  } else {?>
                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" style="background-color: #5fcf80; border: #5fcf80;"
                        name="forgot_btn" type="submit">Submit</button>
                    </div>
                    <?php }?>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
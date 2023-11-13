<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign up</title>
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
                  <img src="../assets/img/apple-touch-icon.png" style="width: 50px;" alt="college logo">
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style='color:#5fcf80;'>Online Tutoring</h5>
                    <p class="text-center small">Online Tutoring</p>
                  </div>

                  <?php
                  if (isset($_SESSION['error']) && !isset($_SESSION['reg'])) {
                    ?>
                    <div class="alert alert-danger">
                      <?php
                      echo $_SESSION['error'];
                      ?>
                    </div>
                    <?php
                    unset($_SESSION['error']);
                  } elseif (isset($_SESSION['reg'])) {
                    ?>
                    <div class="alert alert-success">
                      Your registration successful
                      Please verify your email ID
                      <br>
                      <?php
                      echo "User ID : {$_SESSION['user_id']} <br> Name : {$_SESSION['Name']} <br> Email ID : {$_SESSION['email']}";
                      ?>
                      <?php
                      unset($_SESSION['user_id']);
                      unset($_SESSION['Name']);
                      unset($_SESSION['email']);
                      ?>
                    </div>
                    <?php
                    unset($_SESSION['reg']);
                    unset($_SESSION['error']);
                  }
                  ?>

                  <form role="form" action="../controllers/auth.php" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <!-- <label for="ID" class="form-label">Email id</label> -->
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="email" name="email" placeholder="Email id" class="form-control" id="ID" required>
                        <div class="invalid-feedback">Please enter your Faculty ID</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <!-- <label for="password" class="form-label">First Name</label> -->
                      <input type="text" name="fname" class="form-control" id="fname" placeholder="First name" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>

                    <div class="col-12">
                      <!-- <label for="password" class="form-label">Last Name</label> -->
                      <input type="text" name="lname" class="form-control" id="lname" placeholder="Last name" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>

                    <div class="col-12">
                      <!-- <label for="role" class="form-label">Role</label> -->
                      <div class="input-group has-validation">
                        <select name="role" id="role" class="form-select" aria-label="select role" required>
                          <option selected="">Select role</option>
                          <option value="student">Student</option>
                          <option value="instructor">Instructor</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <!-- <label for="password" class="form-label">Password</label> -->
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a
                            href="conditions.php">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" style="background-color: #5fcf80; border: #5fcf80;"
                        name="register_btn" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
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
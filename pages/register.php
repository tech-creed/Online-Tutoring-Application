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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

              <!-- <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/apple-touch-icon.png" style="width: 50px;" alt="college logo">
                </a>
              </div>End Logo -->

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
                      ?>sasfas
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php
                    unset($_SESSION['error']);
                  }
                  ?>

                  <form role="form" action="../controllers/auth.php" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="ID" class="form-label">Email id</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="email" placeholder="Enter your Email id" class="form-control" id="ID" required>
                        <div class="invalid-feedback">Please enter your Faculty ID</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>

                    <div class="col-12">
                      <label for="role" class="form-label">Role</label>
                      <div class="input-group has-validation">
                        <select name="role" id="role" class="form-select" aria-label="select role">
                          <option selected="">Select role</option>
                          <option value="faculty">faculty</option>
                          <option value="admin">admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" style="background-color: #5fcf80; border: #5fcf80;" name="register_btn" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
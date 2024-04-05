<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Friends Pharma</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login Employee Account</h5>
                    <p class="text-center small">Enter your phone & password to login</p>
                  </div>
                  <?php 
                    if(!empty($_SESSION['messages']) && !empty($_SESSION['class_name'])){
                      echo '<script type="module"> 
                        var myModal = new bootstrap.Modal(document.getElementById("statusErrorsModal"), {});
                        document.onreadystatechange = function () {
                          myModal.show();
                        }; 
                      </script>';
                      require_once ('messages.php');
                      session_destroy();
                    }
                  ?>
                  <form class="row g-3" action="controllers/Login.php" method="POST">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Phone</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">+880</span>
                        <input type="number" name="phone" class="form-control" id="yourUsername">
                        <div class="invalid-feedback">Please enter your phone.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <input class="btn btn-success w-100" name="submit" type="submit" value="Login">
                    </div>
                  </form>
                </div>
              </div>
              <div class="credits">
                Development by <span class="text-success">CSE-23</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

<?php include_once("includes/js.php") ?>

</body>

</html>
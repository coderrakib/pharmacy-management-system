<?php
 require_once ('config.php');

  $user = $_SESSION['front_user'];

  $users = new Employee;
  $users->getEmployee(['phone', '=', $user]);
  $query = $users->query;

  $result   = $query->fetch_assoc();
  $get_id   = $result['id'];
  $fname    = $result['f_name'];
  $lname    = $result['l_name'];
  $gender   = $result['gender'];
  $birthday = $result['birthday'];
  $phone    = $result['phone'];
  $email    = $result['email'];
  $oldpass  = $result['password'];
  $address  = $result['address'];
  $image    = $result['photo'];
  $designation  = $result['designation'];
  $joining_date = $result['joining_date'];
  $biography    = $result['biography'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile Settings</h1>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="files/photo/<?php echo $image; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $fname." ".$lname; ?></h2>
              <h3><?php echo $designation; ?></h3>
            </div>
          </div>
        </div>

        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $biography; ?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fname." ".$lname; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Birthday</div>
                    <div class="col-lg-9 col-md-8"><?php echo $birthday; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Joining Date</div>
                    <div class="col-lg-9 col-md-8"><?php echo $joining_date; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">Bangladesh</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $address; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo "0".$phone; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email; ?></div>
                  </div>
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
                  unset($_SESSION['messages'],$_SESSION['class_name']);
                }
              ?>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form action="controllers/Employee.php?action=update" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="files/photo/<?php echo $image; ?>" alt="Profile">
                        <div class="pt-2">
                          <label for="Last_Name" class="form-label">Upload Photo<span class="text-danger">*</span></label>
                          <input name="photo" type="file" class="form-control" id="Last_Name">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name<span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="f_name" type="text" class="form-control" id="fullName" value="<?php echo $fname; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name<span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="l_name" type="text" class="form-control" id="fullName" value="<?php echo $lname; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Biography<span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="biography" class="form-control" id="about" style="height: 100px"><?php echo strip_tags($biography); ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Date of Birth<span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="birthday" type="date" class="form-control" id="company" value="<?php echo strip_tags($birthday); ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email<span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Job" value="<?php echo $email; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address<span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?php echo $address; ?>">
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="hidden" name="userID" class="btn btn-success rounded-1" value="<?php echo $get_id; ?>">
                      <input type="hidden" name="dbImage" class="btn btn-success rounded-1" value="<?php echo $image; ?>">
                      <input type="submit" name="submit" class="btn btn-success rounded-1" value="Save Changes">
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="controllers/Employee.php?action=updatePassword" method="POST">
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-5 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-7">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-5 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-7">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-5 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-7">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="hidden" name="userID" class="btn btn-success rounded-1" value="<?php echo $get_id; ?>">
                      <input type="hidden" name="oldPass" class="btn btn-success rounded-1" value="<?php echo $oldpass; ?>">
                      <input type="submit" name="changePass" class="btn btn-success rounded-1" value="Change Password">
                    </div>
                  </form><!-- End Change Password Form -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <?php include_once("includes/footer.php") ?>
  <?php include_once("includes/js.php") ?>
</body>
</html>
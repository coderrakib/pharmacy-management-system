<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
  <div class="row">
    <div class="col-md-7">
      <div class="pagetitle">
        <h1>Income</h1>
      </div><!-- End Page Title -->
    </div>
  </div>
     <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-md-6">
              <div class="card info-card sales-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body ">
                  <h5 class="card-title">Today's Income <span> </span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$10,945</h6>
                      <span class="text-success small pt-1 fw-bold">4.63% vs. Yesterday</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <div class="col-md-6 ">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Income<span>| This Week </span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">2.34% vs. last week</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
            <!-- Customers Card -->
            <div class="col-md-6">
              <div class="card info-card customers-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title"> Income <span>| This Month</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$20,847</h6>
                      <span class="text-danger small pt-1 fw-bold">4.63% vs. last Month</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->
            <!-- Revenue Card -->
            <div class="col-md-6">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title"> Income<span>| This Year Income</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">1.34% vs. last Year</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
            
          <section class="section mt-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body pt-3">
                  <div class="col-md-7">
              <div class="pagetitle">
                <h1>Income List</h1>
              </div><!-- End Page Title -->
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-bordered datatable">
                <thead>

                  <tr>
                  <th></th>
                    <th>
                      <b>Category</b>
                    </th>
                    <th>Invoice ID</th>
                    <th data-type="date" data-format="YYYY/DD/MM"> Date</th>
                    <th>Income Head</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Tablet</td>
                    <td>#746F5K2</td>
                    <td>23 Jan 2019</td>
                    <td>Sales Rate</td>
                    <td>$2300.00</td>
                  </tr>
                  <tr>
                  <td><input type="checkbox" /></td>
                    <td>Cyrup</td>
                    <td>#746h5K4</td>
                    <td>15 Jan 2020</td>
                    <td>Parking charges</td>
                    <td>$500.00</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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
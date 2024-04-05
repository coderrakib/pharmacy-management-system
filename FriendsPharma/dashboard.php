<?php require_once("config.php"); ?>
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
          <h1>Dashboard</h1>
          <p style="font-size: 14px;color: #899bbd;"> Welcome to Friends Pharma Dashboard. </p>
        </div><!-- End Page Title -->
      </div>
    </div>
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <?php 
              $invoice = new OrderBy;
              $invoice->OrderBy('','id','DESC');
              $query   = $invoice->query;
              $rowcount = mysqli_num_rows($query);    
            ?>
            <div class="col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total Sales</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $rowcount; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <div class="col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                    <?php

                        $invoice =  new Invoice;
                        $invoice->getInvoice();
                        $query = $invoice->query;

                        $total_rev = array();

                        $num = 0;

                        while ($row = $query->fetch_assoc()) {

                          $total_rev[] = $row['grand_total'];
                          $num++;
                        }
                      ?>
                      <h6>&#x09F3;<?php echo array_sum($total_rev); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
            <!-- Customers Card -->
            <div class="col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Month</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $rowcount; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->
            <!-- Revenue Card -->
            <div class="col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title"> Total Expense <span>| This Month</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cash"></i>
                    </div>
                    <div class="ps-3">
                    <?php

                      $expense =  new Expense;
                      $expense->getExpense();
                      $query = $expense->query;

                      $total_expense = array();

                      $num = 0;

                      while ($row = $query->fetch_assoc()) {

                        $total_expense[] = $row['amount'];
                        $num++;
                      }
                      ?>
                      <h6>&#x09F3;<?php echo array_sum($total_expense); ?></h6>
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
              <h3 class="ml-3">Recent Sales</h3>
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th class="text-center" style="font-size:14px;" scope="col">Invoice ID</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Date</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Product</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Amount</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Status</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Action</th>
                  </tr>
                </thead>
                  <?php 
                    $invoice = new OrderBy;
                    $invoice->OrderBy('','id','DESC');
                    $query   = $invoice->query;
                    while ($result = $query->fetch_assoc()) {
                      $id          = $result['id'];
                      $invoice_no  = $result['invoice_no'];
                      $medicine  = $result['medicine'];
                      $date_issue  = $result['date_issue'];
                      $grand_total = $result['grand_total'];
                      $status      = $result['status'];
                    
                  ?>
                  <tr class="text-center">
                    <td style="font-size:15px;"><?php echo $invoice_no; ?></td>
                    <td style="font-size:15px;"><?php echo $date_issue ?></td>
                    <td style="font-size:15px;"><?php echo $medicine ?></td>
                    <td style="font-size:15px;"><?php echo $grand_total." BDT";?></td>
                    <td style="font-size:15px;">
                        <?php
                          if($status == "1"){
                            echo "<p class='text-success'><i class='bi bi-circle-fill'></i> Complete</p>";
                          }
                          if($status == "2"){
                            echo "<p class='text-warning'><i class='bi bi-circle-fill'></i> Pending</p>";
                          }
                          if($status == "3"){
                            echo "<p class='text-danger'><i class='bi bi-circle-fill'></i> Cancelled</p>";
                          }
                        ?>
                    </td>

                    <td style="font-size:15px;" class="text-center">
                          <div class="btn-group" role="group">
                            <button class="btn border-danger btn-sm rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="invoice-details.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-eye"></i> View Details </a></li>
                              <li><a href="change-status.php?id=<?php echo $id; ?>&&value=2&&table=invoice" class="dropdown-item" type="button"><i class="bi bi-arrow-counterclockwise"></i> Pending </a></li>
                              <li><a href="change-status.php?id=<?php echo $id; ?>&&value=3&&table=invoice" class="dropdown-item" type="button"><i class="bi bi-trash"></i> Cancelled </a></li>
                              <li><a href="change-status.php?id=<?php echo $id; ?>&&value=1&&table=invoice" class="dropdown-item" type="button"><i class="bi bi-check2"></i> Complete </a></li>
                            </ul>
                          </div>
                      </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
            <div class="col-12">
              <div class="card">
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
                  <h5 class="card-title">Reports <span>/Today</span></h5>
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->
                </div>
              </div>
            </div><!-- End Reports -->
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
  </main><!-- End #main -->
  
  <?php include_once("includes/footer.php") ?>
  <?php include_once("includes/js.php") ?>
</body>
</html>
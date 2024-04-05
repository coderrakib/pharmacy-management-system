<?php require_once ("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>

<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>

<main id="main" class="main">

  <div class="pagetitle">
      <h1><b>Sales Report</b></h1>
      <p style="font-size: 14px;color: #899bbd;"> Here is the sales report of this Month. </p>
  </div><!-- End Page Title -->
  <div class="row">
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
        <div class="col-md-6">
          <div class="chart-box">
            <h3 class="mb-3">Total Sales</h3>
            <h1 class="mb-3">&#x09F3;<?php echo array_sum($total_rev); ?></h1>
            <h6 class="mb-3">&#x09F3;<?php echo array_sum($total_rev); ?> in last month</h6>
            <!-- Live Chart -->
            <canvas id="liveChart" width="300" height="100"></canvas>
          </div>
        </div>
        <div class="col-md-6">
          <div class="chart-box">
            <h3 class="mb-3">Top Medicines Percentage</h3>
            <!-- Percentage Chart -->
            <canvas id="topMedicineChart" width="400" height="300"></canvas>
          </div>
        </div>
  </div>
    <script>
      // Sample data for area chart
      var liveChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun" ,],
        datasets: [
          {
            label: "Total Sales",
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            data: [65, 59, 80, 81, 56, 55],
            fill: true,
          },
        ],
      };

      // Sample data for top medicines
      var topMedicineData = {
        labels: ["Zimax", "Oxidin", "Ceevit", "Med4" ,"Napa"],
        datasets: [
          {
            data: [30, 50, 20, 25,95],
            backgroundColor: [
              "rgba(255, 99, 132, 0.8)",
              "rgba(54, 162, 235, 0.8)",
              "rgba(255, 206, 86, 0.8)",
              "rgba(75, 192, 192, 0.8)",
              "rgba(54, 162, 235, 0.8)",
            ],
          },
        ],
      };

      // Get the context of the canvas elements
      var liveChartContext = document
        .getElementById("liveChart")
        .getContext("2d");
      var topMedicineChartContext = document
        .getElementById("topMedicineChart")
        .getContext("2d");

      // Create area chart for live data
      var liveChart = new Chart(liveChartContext, {
        type: "line",
        data: liveChartData,
        options: {
          scales: {
            xAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });

      // Create vertical bar chart for top medicines
      var topMedicineChart = new Chart(topMedicineChartContext, {
        type: "bar",
        data: topMedicineData,
        options: {
          scales: {
            xAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    </script>
  <section class="section mt-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <h3 class="ml-3">Total Sales</h3>
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

</main><!-- End #main -->
  <?php include_once("includes/footer.php") ?>
  <?php include_once("includes/js.php") ?>
</body>

</html>
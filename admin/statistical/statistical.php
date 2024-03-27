<main>
    <!-- /* -------------------------------- GET DATA -------------------------------- */ -->
    <?php 
    $db = require '../config/database.php';
    $statisticalController = new Statistical_Controller($db);
    ?>
    <!-- /* -------------------------------- GET DATA -------------------------------- */ -->
    <!-- Đơn hàng, người dùng, sản phẩm, doanh thu -->
    <div class="statistical">
        <div class="box-statis">
          <div class="ic-statis">
          <i class="fa-solid fa-money-bills" style="color: green;"></i>
          </div>
          <div class="statis-right">
            <div class="title-statis">
             Doanh thu
            </div>
            <div class="num-statis">
              <?php
              $total = $statisticalController->statiscalRevenue();
              echo ($total > 0) ? number_format($total) . ' VNĐ' : "0";
              ?>
            </div>
          </div>
        </div>
        <div class="box-statis">
          <div class="ic-statis">
            <i class="fa-solid fa-boxes-stacked"></i>
          </div>
          <div class="statis-right">
            <div class="title-statis">
              Đơn hàng
            </div>
            <div class="num-statis">
              <?= $statisticalController->statistical('orders') ?>
            </div>
          </div>
        </div>
        <div class="box-statis">
          <div class="ic-statis">
            <i class="fa-solid fa-comments" style="color: gray;"></i>
          </div>
          <div class="statis-right">
            <div class="title-statis">
              Đánh giá
            </div>
            <div class="num-statis">
              <?= $statisticalController->statistical('comments') ?>
            </div>
          </div>
        </div>
        <div class="box-statis">
          <div class="ic-statis">
            <i class="fa-solid fa-users"></i>
          </div>
          <div class="statis-right">
            <div class="title-statis">
              Người dùng
            </div>
            <div class="num-statis">
              <?= $statisticalController->statistical('users') ?>
            </div>
          </div>
        </div>
    </div>
</main>
<!-- /* --------------------------------- ORDER -------------------------------- */ -->
<canvas id="orders"></canvas>
<script>
  const order = document.getElementById('orders');
  new Chart(order, {
    type: 'line',
    data: {
      labels: <?= json_encode($data['date']) ?>,
      datasets: [{
        label: 'Đơn hàng',
        fill: false,
        data: <?= json_encode($data['orderTotal']) ?>,
        borderWidth: 1,
        borderColor: 'rgba(75, 192, 192, 1)', // Màu sắc của đường
        pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Màu nền của điểm
        pointBorderColor: 'rgba(75, 192, 192, 1)', // Màu đường viền điểm
        pointRadius: 5, // Kích thước của điểm
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- /* --------------------------------- ORDER -------------------------------- */ -->
<br>
<!-- /* --------------------------------- REVENUE -------------------------------- */ -->
<canvas id="revenue"></canvas>
<script>
  const revenue = document.getElementById('revenue');
  new Chart(revenue, {
    type: 'line',
    data: {
      labels: <?= json_encode($data['date']) ?>,
      datasets: [{
        label: 'Doanh thu',
        fill: false,
        data: <?= json_encode($data['total']) ?>,
        borderWidth: 1,
        borderColor: 'green', // Màu sắc của đường
        pointBackgroundColor: 'green', // Màu nền của điểm
        pointBorderColor: 'green', // Màu đường viền điểm
        pointRadius: 5, // Kích thước của điểm
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- /* --------------------------------- REVENUE -------------------------------- */ -->
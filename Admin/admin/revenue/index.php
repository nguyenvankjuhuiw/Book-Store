<!-- tổng số đơn hàng theo năm, doanh thu theo năm -->
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div >
                        <br>
                            <br>
                            <h4>Tổng số đơn hàng theo năm</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="ordersOfYear"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div >
                        <br>
                            <br>
                            <h4>Doanh thu theo năm</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="moneyOfYear"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <?php
        $sql ="SELECT MONTH(orderdate) AS Month, COUNT(*) AS Number, SUM(Total) AS Money 
        FROM bookstore.order
        GROUP BY MONTH(orderdate);";
        $datas = Database::GetData($sql);
        $ordersOfYearValue = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $moneyOfYearValue = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($datas as $data) {
            $ordersOfYearValue[$data['Month'] - 1] = $data['Number'];
            $moneyOfYearValue[$data['Month'] - 1] = $data['Money'];
        }
    ?>
    <script>
    const data = {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
        datasets: [{
            label: 'Tổng số đơn hàng theo năm',
            data: <?=json_encode($ordersOfYearValue)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)'
            ],
            borderWidth: 1
        }]
    };

    const data1 = {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
        datasets: [{
            label: 'Doanh thu theo năm',
            data: <?=json_encode($moneyOfYearValue)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    const config1 = {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var myChart = new Chart(document.getElementById("ordersOfYear"), config);
    var myChart1 = new Chart(document.getElementById("moneyOfYear"), config1);
    </script>
</div>
<?php include '../footer.php'?>

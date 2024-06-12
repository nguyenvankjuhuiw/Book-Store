
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div >
                            <div></div>
                            <br>
                            <br>
                            <h4>top 5 sản phẩm bán chạy nhất</h4>
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
                            <h4>top 5 sản phẩm bán chậm nhất</h4>
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
        $sql = 'SELECT b.bookname, SUM(c.quantity) AS total 
        FROM book b
        JOIN orderdetail c ON b.bookid = c.bookid
        GROUP BY b.bookname
        ORDER BY total DESC';
        
        $datas = Database::GetData($sql);
        
        $bookNames = [];
        $bookTotals = [];
        foreach ($datas as $data) {
            $bookNames[] = $data['bookname'];
            $bookTotals[] = $data['total'];
        }
    ?>
    <script>
    const data = {
        labels: <?=json_encode(array_slice($bookNames, 0, 5))?>,
    datasets: [{
        label: 'Top 5 mặt hàng bán chạy',
        data: <?=json_encode(array_slice($bookTotals, 0, 5))?>,
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
        labels: <?=json_encode(array_slice($bookNames, -5))?>,
        datasets: [{
            label: 'Bottom 5 mặt hàng bán chậm',
            data: <?=json_encode(array_slice($bookTotals, -5))?>,
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
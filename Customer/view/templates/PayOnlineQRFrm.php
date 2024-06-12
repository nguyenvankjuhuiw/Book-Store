<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="view/static/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="view/static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="view/static/css/style.css" rel="stylesheet">
    <style>
        .error_span {
            color: red;
            font-size: 11px;
        }

    </style>
</head>
<body>
    <?php require 'view/templates/header.php'; ?>
    <!-- <div style="height: 150px;"></div> -->
    <div class="container-fluid fruite py-5">  
        <div class="container py-5">
            <br>
            <h2>Thanh toán bằng mã QR <span id="countdown">Loading...</span></h2>
            
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="border rounded">
                    <img src="<?php echo $image_url ?>" alt="QR Code" with='300' height='400'>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="mb-3">Tổng tiền sách: <?php echo  number_format($totalbook) . " đ" ?></p>
                    <p class="mb-3">Phí vận chuyển: <?php echo  number_format($priceship) . " đ" ?></p>
                    <p class="mb-3">Tổng tiền: <?php echo  number_format($amount) . " đ" ?></p>
                    <a href="?route=home" class="btn btn-primary" style="width:15vw;">Hủy</a>
                </div>

            </div>
            
        </div>
    </div>


<script type="text/javascript">
    const currentDate = new Date().toISOString().split('T')[0];
    const apiKey = "AK_CS.f0aa5510152611efb59ad709086e66d7.80HycLCzHtd9j08bGuYd86zXxSbQm311ioJ7OL42TXDxwRuxa5EFSJ6YpuDAUHiCy3mmwgyc";
    const aptGetPaid = "https://oauth.casso.vn/v2/transactions?fromDate=${currentDate}&page=1&pageSize=1&sort=DESC";
    const paidPrice = <?php echo $bank->AMOUNT ?>;
    const paidDes = <?php echo json_encode($bank->DESCRIPTION) ?>;
    console.log(paidPrice);
    console.log(paidDes);
    

    let isSuccess = false;

    async function checkPaid(price, des) {
        fetch(`https://oauth.casso.vn/v2/transactions?fromDate=${currentDate}&page=1&pageSize=1&sort=DESC`, {
            method: 'GET',
            headers: {
                'Authorization': `Apikey ${apiKey}`,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(transactions => {
            console.log(transactions);
            console.log(des);
            // Kiểm tra nếu dữ liệu tồn tại và có ít nhất một bản ghi
            if (transactions.data && transactions.data.records && transactions.data.records.length > 0) {
                const transactionDes = transactions.data.records[0].description;
                const transactionAmount = transactions.data.records[0].amount;
                console.log(transactionDes);

                if (transactionAmount >= price && transactionDes.includes(des)) {
                    console.log("co");
                    isSuccess = true;
                } else {
                    console.log("khong");
                }
            } else {
                console.log('No transactions found or data format incorrect');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    }



    const intervalId = setInterval(async () => {
        if (!isSuccess) {
            await checkPaid(paidPrice, paidDes);
        } else {
            clearInterval(intervalId);  // Dừng setInterval khi thanh toán thành công
            window.location.href = '?route=addorderpayonlineqr';  // Điều hướng đến trang chủ
        }
    }, 1000);

    setTimeout(() => {
        clearInterval(intervalId);
        window.location.href = '?route=payonlineqrreturn&error=1';
    }, 1800000);  // 30 phút = 1800000 mili giây


    function startCountdown(duration, display) {
    let timer = duration, hours, minutes, seconds;
    setInterval(() => {
        hours = Math.floor(timer / 3600);
        minutes = Math.floor((timer % 3600) / 60);
        seconds = Math.floor(timer % 60);

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = hours + ":" + minutes + ":" + seconds;

        if (--timer < 0) {
            clearInterval(this); // Dừng đếm ngược khi hết giờ
        }
    }, 1000);
}

window.onload = function () {
    // Thời gian đếm ngược tính bằng giây (ví dụ: 1 giờ)
    let duration = 60*30; // 1 giờ = 3600 giây
    let display = document.querySelector('#countdown');
    startCountdown(duration, display);
};


</script>

    
    <?php require 'view/templates/footer.php'; ?>

</body>
</html>
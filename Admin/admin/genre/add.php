<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>

<?php
    if (isset($_POST['action']) && $_POST['action'] == 'exit'){
        header("Location: list.php");
    }
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $cateid = isset($_POST['cateid']) ? $_POST['cateid'] : '';

    if (!empty($name)) {
        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");

        $sql = "SELECT MAX(genreid)  AS max_genreid FROM genre";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $result = $row['max_genreid'];
        $result +=1;
        $sql = "INSERT INTO genre VALUES ('$result', '$cateid', '$name')";

        if (!$connection) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }
        if (mysqli_query($connection, $sql)) {
            header("Location: list.php");
            echo "Thêm thể loại thành công.";
        } else {
            echo "Thêm thể loại thất bại " . mysqli_error($connection);
        }
        mysqli_close($connection);
    }

}
?>
<section class="content">
    <?php include '../alert.php'?>
    <?php
            $cate = [];
            $sql = "SELECT * FROM category ";
            $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $cate[] = $row;
            }
    ?>
    <form class="modal-content" method="POST">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Thêm thể loại</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Catergory</label>
                            <select name="cateid">
                                 <?php
                                    foreach ($cate as $row) {
                                        echo '<option name="cateid" value="' . $row['cateid'] . '">' . $row['catename'] . '</option>';
                                    }
                                ?>                           
                            </select>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="action" value="exit" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                        <button name="action" value="add" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include '../footer.php'?>

<script>
$(document).ready(function() {
    function GetParameterValues(param) {
        var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < url.length; i++) {
            var urlparam = url[i].split('=');
            if (urlparam[0] == param) {
                return urlparam[1];
            }
        }
    }

    if (GetParameterValues('edit-id') != undefined) {
        document.querySelector("[data-target='#modal-edit']").click();
    }
});
</script>

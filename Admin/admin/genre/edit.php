<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>

<?php
        if (isset($_POST['action']) && $_POST['action'] == 'exit'){
            header("Location: list.php");
        }
        if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';

        if (!empty($name)) {
            $sql = "UPDATE genre SET genrename = '$name' WHERE genreid = $id";
            $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
            if (!$connection) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }
            if (mysqli_query($connection, $sql)) {
                echo "Sửa thể loại thành công.";
                header("Location: ./list.php");
            } else {
                echo "Sửa thể loại thất bại" . mysqli_error($connection);
            }
        }
        else{
            echo "Tên thể loại không được để trống" . mysqli_error($connection);
        }
            
            mysqli_close($connection);

    }
?>
<section class="content">
    <?php include '../alert.php'?>
    <?php
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $cate = [];
            if ($id != '') {
                $sql = "SELECT * FROM genre WHERE genreid = $id";
                $cate = Database::GetData($sql, ['row' => 0]);
            }
        ?>
        <!-- <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true"> -->
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <form class="modal-content" method="POST">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Sửa thể loại</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mã thể loại</label>
                            <input type="text" name="id" value="<?=$cate['genreid']?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input type="text" name="name" value="<?=$cate['genrename']?>" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="action" value="exit" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                        <button name="action" value="edit" class="btn btn-success">Sửa</button>
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

function removeRow(id) {
    if (confirm('Bạn có chắc chắn muốn xoá không?')) {
        window.location = '?del-id=' + id;
    }
}
</script>
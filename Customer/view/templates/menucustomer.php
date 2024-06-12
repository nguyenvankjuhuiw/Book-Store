

<div class="col-lg-12">
    <div class="mb-4">
        <ul class="list-unstyled fruite-categorie">
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=historyorder">Lịch sử mua hàng</a>
                </div>
            </li>
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=ordercancelview">Đơn hàng đã hủy</a>
                </div>
            </li>
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=profile">Tài khoản của bạn</a>
                </div>
            </li>
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=notificationview">Thông báo</a>
                </div>
            </li>
            <?php if(!filter_var($user->getUserName(), FILTER_VALIDATE_EMAIL)): ?>
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=changepassword">Đổi mật khẩu</a>
                </div>
            </li>
            <?php endif ?>
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=logout">Thoát tài khoản</a>
                </div>
            </li>
        </ul>
    </div>
</div>
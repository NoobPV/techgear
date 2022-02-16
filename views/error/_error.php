<h1>oops!</h1>
<h2><?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?></h2>
<?php echo "<a href=\"javascript:history.go(-1)\">Quay lại</a>"; ?> &nbsp;
<?php echo $exception->getCode() == 403 ? "<a href=\login>Đăng nhập</a>" : ''; ?>
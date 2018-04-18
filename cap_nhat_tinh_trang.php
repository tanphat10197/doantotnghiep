<?php
	require_once('Controller/c_khach_hang.php');
	$san_pham = new C_khach_hang();
	$san_pham->cap_nhat_tinh_trang();
?>
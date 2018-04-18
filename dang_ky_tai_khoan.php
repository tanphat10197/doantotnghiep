<?php
	require_once('Controller/c_nguoi_dung.php');
	$tai_khoan = new C_nguoi_dung();
	$tai_khoan->dang_ky_tai_khoan_moi();
?>
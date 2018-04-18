<?php
	require_once('Controller/c_nguoi_dung.php');
	$nguoi_dung=new C_nguoi_dung();

	$nguoi_dung->danh_sach_tai_khoan();
?>
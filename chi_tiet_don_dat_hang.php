<?php
	require_once('Controller/c_khach_hang.php');
	$san_pham = new C_khach_hang();
	$san_pham->chi_tiet_don_dat_hang();
?>
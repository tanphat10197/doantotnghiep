<?php
	require_once('Controller/c_khach_hang.php');
	$khach_hang=new C_khach_hang();

	$khach_hang->xem_thong_tin_don_dat_hang();
?>
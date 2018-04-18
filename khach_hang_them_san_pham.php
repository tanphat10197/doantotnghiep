<?php
	require_once('Controller/c_khach_hang.php');
	$khach_hang=new C_khach_hang();
	if(!isset($_POST['so_luong']) || !isset($_POST['ma_san_pham']))
	{
		echo '0';
		return;	
	}

	$khach_hang->them_san_pham();
?>
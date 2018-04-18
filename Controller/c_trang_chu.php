<?php
require_once('Controller/smarty_ung_dung.php');
require_once('Model/m_san_pham.php');
include_once('Library/Gio_hang.php');
class C_trang_chu
{

	public function index()
	{	
		$sanpham = new M_san_pham();
		$gio_hang= new Gio_hang();
		
		$sanphamhot = $sanpham->san_pham_hot();
		$san_pham_laptop = $sanpham->san_pham_laptop();
		$san_pham_tra_gop = $sanpham->san_pham_tra_gop();

		$smarty=new Smarty_ung_dung();
		$smarty->assign('sanpham', $sanphamhot);
		$smarty->assign('sanphamlaptop', $san_pham_laptop);
		$smarty->assign('sanphamtragop', $san_pham_tra_gop);

		$so_luong = $gio_hang->TongSoLuong();
			$smarty->assign('so_luong', $so_luong);
		$smarty->display('v_trang_chu.tpl');
	}
}
?>
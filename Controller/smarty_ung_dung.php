<?php
session_start();
chdir(dirname(__DIR__));
define('path','http://localhost:81/QL_Ban_Hang_06/');
require_once('smarty/libs/Smarty.class.php');
require_once('Model/m_loai_san_pham.php');
include_once('Library/Gio_hang.php');
include_once('Model/m_khach_hang.php');
class Smarty_ung_dung extends Smarty
{
	public function __construct()
	{
		parent::__construct();
		$this->setCacheDir('View/cache');
		$this->setConfigDir('View/config');
		$this->setTemplateDir('View/template');
		$this->setCompileDir('View/template_c');
		$this->assign('path_smarty',path);
		
		
		$m_loai_san_pham = new M_loai_san_pham();
		$DSLoaiSanPham = $m_loai_san_pham->LoaiSanPhamCha();
		
		$this->assign('DSLoaiSanPham', $DSLoaiSanPham);
		
		$gio_hang = new Gio_hang();
		$so_luong = $gio_hang->TongSoLuong();
		$this->assign('so_luong', $so_luong);

		if(isset($_SESSION['nguoi_dung']['ho_ten']))
		{
			$ten = $_SESSION['nguoi_dung']['ho_ten'];
			$this->assign('ten', $ten);	
		}
	}
}
?>
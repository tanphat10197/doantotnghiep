<?php
require_once('Controller/smarty_ung_dung.php');
require_once('Model/m_nguoi_dung.php');
require_once('Library/Pager.php');
class C_nguoi_dung
{
	public function dang_nhap()
	{
		$smarty=new Smarty_ung_dung();
		if(isset($_SESSION['nguoi_dung']))
		{
			header("location:".path);
		}
		else
		{
			if(isset($_POST['ten_dn']))
			{
				$tendn = $_POST['ten_dn'];
				$matkhau = $_POST['mat_khau'];
				if(!empty($tendn) && !empty($matkhau))
				{
					$m_nguoi_dung = new M_nguoi_dung();
					$nguoi_dung = $m_nguoi_dung->getNguoiDungDangNhap($tendn,$matkhau);
					if($nguoi_dung)
					{
						$_SESSION['nguoi_dung'] = array('ho_ten'=>$nguoi_dung['ho_ten'], 
										'role'=>$nguoi_dung['ma_loai_nguoi_dung'], 'ma_nguoi_dung'=>$nguoi_dung['ma_nguoi_dung']);
						if($_SESSION['nguoi_dung']['role'] == 1)
						{
							$_SESSION['ten'] = $_SESSION['nguoi_dung']['ho_ten'];
							$smarty->assign('ten',$_SESSION['ten']); 
							header("location:".path.'quan-tri/he-thong.html');
						}
						else
						{
							/*if($_SESSION['nguoi_dung'])
							{ 
							  $smarty->assign('nguoi_dung',$_SESSION['nguoi_dung']); 

							  $_SESSION['nguoi_dung'] = false; 

							}*/
							$_SESSION['ten'] = $_SESSION['nguoi_dung']['ho_ten'];
							$smarty->assign('ten',$_SESSION['ten']); 
							header("location:".path);
						}
						
					}
					else
					{
						$smarty->assign('err', 'Đăng nhập không thành công!');	
					}
				}
				else
				{
					$smarty->assign('err', 'Vui lòng điền đầy đủ thông tin!');
				}
			}
		}

		$smarty->display('nguoi_dung/v_dang_nhap.tpl');
	}

	public function he_thong()
	{
		$smarty=new Smarty_ung_dung();
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else if(isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] == 1)
		{
			$ten = $_SESSION['nguoi_dung']['ho_ten'];
			$smarty->assign('ten', $ten);	
			$smarty->display('nguoi_dung/v_he_thong.tpl');
		}

	}

	public function test()
	{
		echo date('d-m-Y H:i:s');
	}

	public function dang_xuat()
	{
		unset($_SESSION['nguoi_dung']);
		unset($_SESSION['gio_hang']);
		unset($_SESSION['TongSoLuong']);
		header("location:".path);
	}
	
	public function dang_ky_tai_khoan_moi()
	{
		if(isset($_SESSION['nguoi_dung']))
			header("location:".path);
		$data=array(
			'ma_loai_nguoi_dung'=>'',
			'ho_ten'=>'',
			'ten_dang_nhap'=>'',
			'mat_khau'=>'',
			'email'=>'',
			'dien_thoai'=>'',
			'ngay_dang_ky'=>'',
			'ngay_dang_nhap_cuoi'=>'',
			'active'=>'');
			
		$dataErr=array(
			'ho_ten'=>'*',
			'ten_dang_nhap'=>'*',
			'mat_khau'=>'*',
			'email'=>'*',
			'dien_thoai'=>'*'
			);
		
		
		if(isset($_POST['ten_dn']))
		{
			$data=array(
				'ma_loai_nguoi_dung'=>1,
				'ho_ten'=>$_POST['ho_ten'],
				'ten_dang_nhap'=>$_POST['ten_dn'],
				'mat_khau'=>$_POST['mat_khau'],
				'email'=>$_POST['email'],
				'dien_thoai'=>$_POST['dien_thoai'],
				'ngay_dang_ky'=>date('Y-m-d'),
				'ngay_dang_nhap_cuoi'=>date('Y-m-d'),
				'active'=>0);
			
			if($this->KiemTraDuLieu($data))
			{
				$m_nguoi_dung =new M_nguoi_dung();
				$kq=$m_nguoi_dung->ThemTaiKhoan($data);
				
				if($kq)
				{
					$dataErr['err']='<span style="color:#0000ff">Thêm thành công</span>';
				}
				else
				{
					$dataErr['err']='<span style="color:#ff0000">Thêm không thành công</span>';
					var_dump($dataErr['err']);exit;
				}
			
			}
			else
			{
				 $dataErr['err']='<span style="color:#ff0000">Vui lòng nhập dữ liệu đầy đủ</span>';
			}
		}
		
		$smarty = new Smarty_ung_dung();
		$smarty->assign('data',$data);    
        $smarty->assign('dataErr',$dataErr); 
		$smarty->display('nguoi_dung/v_dang_ky_tai_khoan.tpl');
		
		
	}
	
	public function KiemTraDuLieu($data)
	{

		$kq=true;
		if(empty($data['ho_ten']))
			$kq=false;
		if(empty($data['ten_dang_nhap']))
			$kq=false;
		if(empty($data['mat_khau']))
			$kq=false;
		if(empty($data['email']))
			$kq=false;
		if(empty($data['dien_thoai']) && !is_numeric($data['dien_thoai']))
			$kq=false;
		return $kq;
	}
	
	public function danh_sach_tai_khoan()
	{	

		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$page = new Pager();
			$m_nguoi_dung = new M_nguoi_dung();
			$limit = 12;
			$start = $page->findStart($limit);
			
			$count = $m_nguoi_dung->tong_tai_khoan();
			$numPages = $page->findPages($count, $limit);
			$DSNguoiDung = $m_nguoi_dung->danh_sach_nguoi_dung_phan_trang($start, $limit);
			$linkPages = $page->pageList($_GET['page'],$numPages);
			
			$smarty = new Smarty_ung_dung();
			
			$smarty->assign('linkPage', $linkPages);
			$smarty->assign('DSNguoiDung', $DSNguoiDung);
			
			$smarty->display('nguoi_dung/v_danh_sach_nguoi_dung.tpl');
		}
	}	


	public function them_tai_khoan()
	{
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			$smarty=new Smarty_ung_dung();
			$data=array('ma_loai_nguoi_dung'=>'', 'ho_ten'=>'','ten_dang_nhap'=>'', 'mat_khau'=>'', 'email'=>'', 'dien_thoai'=>'');
       	   	$dataErr=array('ma_loai_nguoi_dung'=>'*', 'ho_ten'=>'*','ten_dang_nhap'=>'*', 'mat_khau'=>'*', 'email'=>'*', 'dien_thoai'=>'*', 'err'=>'');

	        if(isset($_POST['btnThem']))
	        {
	            $data=array(
	                'ho_ten'=>$_POST['ho_ten'], 
	                'ten_dang_nhap'=>$_POST['ten_dang_nhap'], 
	                'ma_loai_nguoi_dung'=>$_POST['slMa_loai'], 
	                'mat_khau'=>$_POST['mat_khau'], 
	                'email'=>$_POST['email'], 
	                'dien_thoai'=>$_POST['dien_thoai']
	            );
	            if($this->KiemTraDuLieu($data))
	            {
	                    $m_nguoi_dung = new M_nguoi_dung();
						$KT1 = $m_nguoi_dung->KTNguoiDungTenDN($data['ten_dang_nhap']);
						$KT2 = $m_nguoi_dung->KTNguoiDungEmail($data['email']);
						if($KT1 == 0 && $KT2 == 0)
						{
		                    $kq=$m_nguoi_dung->ThemTaiKhoan($data);
		                    if($kq)
		                        $dataErr['err']='<span style="color:#0000ff">Thêm thành công</span>';
		                    else
		                        $dataErr['err']='<span style="color:#ff0000">Thêm không thành công</span>';
		                }
		                else if($KT1 == true)
		                {
		                	 $dataErr['err']='<span style="color:#0000ff">Tên đăng nhập đã tồn tại</span>';
		                }
		                else if($KT2 == true)
		                {
		                	 $dataErr['err']='<span style="color:#0000ff">Email đã tồn tại</span>';
		                }
	            }
	            else
	                 $dataErr['err']='<span style="color:#ff0000">Vui lòng nhập dữ liệu đầy đủ</span>';
	        }


				$smarty->assign('data',$data);    
				$smarty->assign('dataErr',$dataErr);  
				$m_loai_nguoi_dung = new M_nguoi_dung();  
	    
				$DSNguoiDung = $m_loai_nguoi_dung->getLoaiNguoiDung();

				$smarty->assign('DSNguoiDung',$DSNguoiDung);
				$smarty->display('nguoi_dung/v_them_tai_khoan.tpl');
		}
	}

	public function sua_tai_khoan()
	{
		$matk = $_GET['matk'];
		$smarty=new Smarty_ung_dung();

		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			
			$data=array('ma_loai_nguoi_dung'=>'', 'ho_ten'=>'','ten_dang_nhap'=>'', 'mat_khau'=>'', 'email'=>'', 'dien_thoai'=>'');
       	   	$dataErr=array('ma_loai_nguoi_dung'=>'*', 'ho_ten'=>'*','ten_dang_nhap'=>'*', 'mat_khau'=>'*', 'email'=>'*', 'dien_thoai'=>'*', 'err'=>'');

	        if(isset($_POST['btnSua']))
	        {
	            $data=array(
	                'ho_ten'=>$_POST['ho_ten'], 
	                'ten_dang_nhap'=>$_POST['ten_dang_nhap'], 
	                'ma_loai_nguoi_dung'=>$_POST['slMa_loai'], 
	                'mat_khau'=>$_POST['mat_khau'], 
	                'email'=>$_POST['email'], 
	                'dien_thoai'=>$_POST['dien_thoai']
	            );
	            if($this->KiemTraDuLieu($data))
	            {
	                    $m_nguoi_dung =new M_nguoi_dung();
	                    $KT1 = $m_nguoi_dung->KTNguoiDungTenDN($data['ten_dang_nhap']);
						$KT2 = $m_nguoi_dung->KTNguoiDungEmail($data['email']);
						if($KT1 == 0 && $KT2 == 0)
						{
		                    $kq=$m_nguoi_dung->SuaTaiKhoan($data, $matk);
		                    if($kq)
		                        $dataErr['err']='<span style="color:#0000ff">Sửa thành công</span>';
		                    else
		                        $dataErr['err']='<span style="color:#ff0000">Sửa không thành công</span>';
		                }
		                else if($KT1 == true)
		                {
		                	 $dataErr['err']='<span style="color:#0000ff">Tên đăng nhập đã tồn tại</span>';
		                }
		                else if($KT2 == true)
		                {
		                	 $dataErr['err']='<span style="color:#0000ff">Email đã tồn tại</span>';
		                }

	            }
	            else
	                 $dataErr['err']='<span style="color:#ff0000">Vui lòng nhập dữ liệu đầy đủ</span>';
	        }
	        else
	        {
	        	  $m_nguoi_dung =new M_nguoi_dung();
	        	  $nguoi_dung = $m_nguoi_dung ->getNguoiDungTheoMa($matk);

	        	  $data=array(
	                'ho_ten'=>  $nguoi_dung['ho_ten'], 
	                'ten_dang_nhap'=>  $nguoi_dung['ten_dang_nhap'], 
	                'ma_loai_nguoi_dung'=>  $nguoi_dung['ma_loai_nguoi_dung'], 
	                'mat_khau'=>  $nguoi_dung['mat_khau'], 
	                'email'=>  $nguoi_dung['email'], 
	                'dien_thoai'=>  $nguoi_dung['dien_thoai']
	            );
	        }

				$smarty->assign('data',$data);    
				$smarty->assign('dataErr',$dataErr);  
				$smarty->assign('matk',$matk);  
				$m_loai_nguoi_dung = new M_nguoi_dung();  
	    
				$DSNguoiDung = $m_loai_nguoi_dung->getLoaiNguoiDung();

				$smarty->assign('DSNguoiDung',$DSNguoiDung);
				$smarty->display('nguoi_dung/v_sua_tai_khoan.tpl');
		}
	}

	public function xoa_tai_khoan()
	{

		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{

			$matk = $_GET['matk'];
			$m_nguoi_dung = new M_nguoi_dung();
			$nguoi_dung = $m_nguoi_dung->XoaNguoiDung($matk);

			
			if($sanpham)
			{
				echo '<script type="text/javascript">';
				echo 'alert("Xóa thành công")';
				echo '</script>';
			}
			else
			{
				echo '<script type="text/javascript">';
				echo 'alert("Xóa không thành công")';
				echo '</script>';
			}

			header("location:".path.'quan-tri/danh-sach-tai-khoan.html');	
		}
	}

	public function thong_tin_nguoi_dung()
	{
		echo $_SESSION['nguoi_dung']['ma_nguoi_dung'];
	}

	
}
?>
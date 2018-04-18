<?php
require_once('Controller/smarty_ung_dung.php');
require_once('Model/m_bai_viet.php');
include_once('Model/m_san_pham.php');
include_once('Library/Pager.php');
class C_bai_viet
{
	public function danh_sach_bai_viet()
	{	
		$bai_viet = new M_bai_viet();
		
		$page = new Pager();
		$limit = 4;
		$start = $page->findStart($limit);
		$count = $bai_viet->tong_so_bai_viet();
		$numpage = $page->findPages($count, $limit);
		$linkPage = $page->pageList($_GET['page'],$numpage);
		
		
		$DSBV = $bai_viet->danh_sach_bai_viet_phan_trang($limit,$start);
		$smarty=new Smarty_ung_dung();
		
		$smarty->assign('DSBV',$DSBV);
		$smarty->assign('linkPage',$linkPage);
			
		$smarty->display('baiviet/v_danh_sach_bai_viet.tpl');
	}

	public function chi_tiet_bai_viet()
	{	
		if(!isset($_GET['key']))
			header('location:'.path);
		$chuoi = $_GET['key'];
	
		$arrchuoi = explode('-',$chuoi);
		$id = $arrchuoi[count($arrchuoi) - 1];
		
		$m_bai_viet = new M_bai_viet();
		$bai_viet = $m_bai_viet->bai_viet_theo_ma($id);
		if(!$bai_viet)
			header('location:'.path);


		$cap_nhat_luot_xem = $m_bai_viet->cap_nhat_luot_xem($id);
		


		$smarty=new Smarty_ung_dung();
		$smarty->assign('bai_viet',$bai_viet);

		$smarty->display('baiviet/v_chi_tiet_bai_viet.tpl');
	}

	public function danh_sach_bai_viet_ad()
	{	
		$bai_viet = new M_bai_viet();
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$page = new Pager();
			$limit = 4;
			$start = $page->findStart($limit);
			$count = $bai_viet->tong_so_bai_viet();
			$numpage = $page->findPages($count, $limit);
			$linkPage = $page->pageList($_GET['page'],$numpage);
			
			
			$DSBV = $bai_viet->danh_sach_bai_viet_phan_trang($limit,$start);
			$smarty=new Smarty_ung_dung();
			
			$smarty->assign('DSBV',$DSBV);
			$smarty->assign('linkPage',$linkPage);
				
			$smarty->display('baiviet/v_danh_sach_bai_viet_ad.tpl');
		}
	}

	public function KiemTraDuLieu($data)
    {
        $kq=true;
        if(empty($data['tieu_de']))
            $kq=false;
        if(empty($data['tieu_de_bai_viet_url']))
            $kq=false;
        if(empty($data['noi_dung_tom_tat']))
            $kq=false;
        if(empty($data['noi_dung_chi_tiet']))
            $kq=false;
        return $kq;
    }
    public function KiemTraHinhAnh()
    {
        $hinh=$_FILES['hinh'];
        if($hinh['error']==0)
        {
            $arrayType=array('image/jpeg','image/jpg','image/png','image/gif');
            if(array_search($hinh['type'],$arrayType)!==false)
            {
                if($hinh['size']<=3000000)
                {
                    return 1;
                }
                else
                    return 'Vui lòng chọn hình ảnh < 2MB';
            }
            else
                return 'Vui lòng chỉ chọn File hình';
        }   
        else
        {
            return 'Vui lòng chọn hình';
        }
    }

	public function them_bai_viet()
	{
		$smarty=new Smarty_ung_dung();
		
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			$data=array('ma_loai_bai_viet'=>'', 'tieu_de'=>'','tieu_de_bai_viet_url'=>'', 'noi_dung_tom_tat'=>'', 'noi_dung_chi_tiet'=>'', 
				'hinh'=>'');
       	   $dataErr=array('tieu_de'=>'*', 'tieu_de_bai_viet_url'=>'*', 'noi_dung_tom_tat'=>'*', 'noi_dung_chi_tiet'=>'*','hinh'=>'*','err'=>'');

	        if(isset($_POST['btnThem']))
	        {
	            $data=array(
	                'tieu_de'=>$_POST['tieu_de'], 
	                'tieu_de_bai_viet_url'=>$_POST['tieu_de_bai_viet_url'], 
	                'ma_loai_bai_viet'=>$_POST['slMa_loai'], 
	                'noi_dung_tom_tat'=>$_POST['noi_dung_tom_tat'],
	                'noi_dung_chi_tiet'=>$_POST['noi_dung_chi_tiet']
	            );
	            if($this->KiemTraDuLieu($data))
	            {
	                $kq=$this->KiemTraHinhAnh();
	                if($kq===1)
	                {
	                    //upload hinh
	                    $hinh=$_FILES['hinh'];
	                    $nameHinh=time().'-'.$hinh['name'];
	                    move_uploaded_file($hinh['tmp_name'],'./Public/images/bai_viet/'.$nameHinh);
	                    $data['hinh']=$nameHinh;

	                    $m_bai_viet =new M_bai_viet();
	                    $kq=$m_bai_viet->ThemBaiViet($data);
	                    if($kq)
	                        $dataErr['err']='<span style="color:#0000ff">Thêm thành công</span>';
	                    else
	                        $dataErr['err']='<span style="color:#ff0000">Thêm không thành công</span>';

	                }
	                else
	                {
	                    $dataErr['err']=$kq;
	                }
	            }
	            else
	                 $dataErr['err']='<span style="color:#ff0000">Vui lòng nhập dữ liệu đầy đủ</span>';
	        }


				$smarty->assign('data',$data);    
				$smarty->assign('dataErr',$dataErr);  
				$m_bai_viet = new M_bai_viet();  
	    
				$LoaiBV = $m_bai_viet->getLoaiBaiViet();
				$smarty->assign('LoaiBV',$LoaiBV);
				$smarty->display('baiviet/v_them_bai_viet.tpl');
		}
	}

	public function sua_bai_viet()
	{
		$smarty=new Smarty_ung_dung();
		$mabv = $_GET['mabv'];
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			$data=array('ma_loai_bai_viet'=>'', 'tieu_de'=>'','tieu_de_bai_viet_url'=>'', 'noi_dung_tom_tat'=>'', 'noi_dung_chi_tiet'=>'', 
				'hinh'=>'');
       	   $dataErr=array('tieu_de'=>'*', 'tieu_de_bai_viet_url'=>'*', 'noi_dung_tom_tat'=>'*', 'noi_dung_chi_tiet'=>'*','hinh'=>'*','err'=>'');

	        if(isset($_POST['btnSua']))
	        {
	            $data=array(
	                'tieu_de'=>$_POST['tieu_de'], 
	                'tieu_de_bai_viet_url'=>$_POST['tieu_de_bai_viet_url'], 
	                'ma_loai_bai_viet'=>$_POST['slMa_loai'], 
	                'noi_dung_tom_tat'=>$_POST['noi_dung_tom_tat'],
	                'noi_dung_chi_tiet'=>$_POST['noi_dung_chi_tiet']
	            );
	            if($this->KiemTraDuLieu($data))
	            {
	                $kq=$this->KiemTraHinhAnh();
	                if($kq===1)
	                {
	                    //upload hinh
	                    $hinh=$_FILES['hinh'];
	                    $nameHinh=time().'-'.$hinh['name'];
	                    move_uploaded_file($hinh['tmp_name'],'./Public/images/bai_viet/'.$nameHinh);
	                    $data['hinh']=$nameHinh;

	                    $m_bai_viet =new M_bai_viet();
	                    $kq=$m_bai_viet->SuaBaiViet($data, $mabv);
	                    if($kq)
	                        $dataErr['err']='<span style="color:#0000ff">Sửa thành công</span>';
	                    else
	                        $dataErr['err']='<span style="color:#ff0000">Sửa không thành công</span>';

	                }
	                else
	                {
	                    $dataErr['err']=$kq;
	                }
	            }
	            else
	                 $dataErr['err']='<span style="color:#ff0000">Vui lòng nhập dữ liệu đầy đủ</span>';
	        }
	        else
	        {
	        	$m_bai_viet =new M_bai_viet();
	            $bai_viet=$m_bai_viet->bai_viet_theo_ma($mabv);

	        	$data=array(
	                'tieu_de'=>$bai_viet['tieu_de'], 
	                'tieu_de_bai_viet_url'=>$bai_viet['tieu_de_bai_viet_url'], 
	                'ma_loai_bai_viet'=>$bai_viet['ma_loai_bai_viet'], 
	                'noi_dung_tom_tat'=>$bai_viet['noi_dung_tom_tat'],
	                'noi_dung_chi_tiet'=>$bai_viet['noi_dung_chi_tiet']
	            );
	        }


				$smarty->assign('data',$data);    
				$smarty->assign('dataErr',$dataErr);  
				$smarty->assign('mabv',$mabv);  
				$m_bai_viet = new M_bai_viet();  
	    
				$LoaiBV = $m_bai_viet->getLoaiBaiViet();
				$smarty->assign('LoaiBV',$LoaiBV);
				$smarty->display('baiviet/v_sua_bai_viet.tpl');
		}
	}

	public function xoa_bai_viet()
	{

		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{

			$mabv = $_GET['mabv'];
			$m_bai_viet = new M_bai_viet();
			$bai_viet = $m_bai_viet->XoaBaiViet($mabv);

			
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

			header("location:".path.'quan-tri/danh-sach-bai-viet.html');	
		}
	}

}
?>
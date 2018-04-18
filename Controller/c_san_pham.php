<?php
require_once('Controller/smarty_ung_dung.php');
include_once('Model/m_san_pham.php');
include_once('Library/Pager.php');
class C_san_pham
{
	public function chi_tiet_san_pham()
	{	
		if(!isset($_GET['key']))
			header('location:'.path);
		$chuoi = $_GET['key'];
	
		$arrchuoi = explode('-',$chuoi);
		$id = $arrchuoi[count($arrchuoi) - 1];
		
		$san_pham = new M_san_pham();
		$chi_tiet_san_pham = $san_pham->san_pham_theo_ma($id);
		if(!$chi_tiet_san_pham)
			header('location:'.path);

		$san_pham_theo_loai = $san_pham->san_pham_theo_loai($chi_tiet_san_pham['ma_loai'], $id);
		$cap_nhat_luot_xem = $san_pham->cap_nhat_luot_xem($id);
		

		$smarty=new Smarty_ung_dung();
		
		$smarty->assign('san_pham',$chi_tiet_san_pham);
		$smarty->assign('sanpham',$san_pham_theo_loai);

		$smarty->display('sanpham/v_chi_tiet_san_pham.tpl');
	}
	
	public function danh_sach_san_pham()
	{	
		$page = new Pager();
		$m_san_pham = new M_san_pham();
		$limit = 12;
		$start = $page->findStart($limit);
		
		$count = $m_san_pham->tong_so_san_pham();
		$numPages = $page->findPages($count, $limit);
		$DSSanPham = $m_san_pham->danh_sach_san_pham_phan_trang($start, $limit);
		$linkPages = $page->pageList($_GET['page'],$numPages);
		
		$smarty = new Smarty_ung_dung();
		
		$smarty->assign('linkPage', $linkPages);
		$smarty->assign('DSSanPham', $DSSanPham);
		
		$smarty->display('sanpham/v_danh_sach_san_pham.tpl');
		
	}
	
	
	public function danh_sach_san_pham_theo_loai()
	{	
		if(!isset($_GET['ma_loai']))
			header('location:'.path);
		$chuoi = $_GET['ma_loai'];
	
		$arrchuoi = explode('-',$chuoi);
		$ma_loai = $arrchuoi[count($arrchuoi) - 1];
		
		$page = new Pager();
		$m_san_pham = new M_san_pham();
		$limit = 12;
		$start = $page->findStart($limit);
		
		$count = $m_san_pham->tong_so_san_pham();
		$numPages = $page->findPages($count, $limit);
		$DSSanPham = $m_san_pham->danh_sach_san_pham_theo_loai_phan_trang($ma_loai, $start, $limit);
		$linkPages = $page->pageList($_GET['page'],$numPages);
		
		$smarty = new Smarty_ung_dung();
		
		$smarty->assign('linkPage', $linkPages);
		$smarty->assign('DSSanPham', $DSSanPham);
		
		$smarty->display('sanpham/v_danh_sach_san_pham_theo_loai.tpl');
		
	}
	
	public function san_pham_tim_kiem()
	{

		$smarty = new Smarty_ung_dung();
		$m_san_pham = new M_san_pham();

		if(isset($_POST['btnsearch']))
		{
			$tenspsearch = $_POST['txtsearch'];

			$sanpham = $m_san_pham->san_pham_theo_ten($tenspsearch);
			if(!empty($tenspsearch))
			{
				if($sanpham)
				{
					$smarty->assign('sanpham', $sanpham);
				}
				else
				{
					$smarty->assign('err', 'Rất tiếc, Shop không tìm thấy sản phẩm này');	
				}
			}
			else
			{
				$smarty->assign('err', 'Kết quả tìm rỗng');	
			}
		}
		
		$smarty->display('sanpham/v_tim_kiem_san_pham.tpl');
	}
	

	public function them_san_pham()
	{
		$smarty=new Smarty_ung_dung();
		
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			$data=array('ten_san_pham'=>'', 'ten_san_pham_url'=>'','ma_loai'=>'', 'mo_ta_tom_tat'=>'', 'mo_ta_chi_tiet'=>'', 'don_gia'=>''
				, 'hinh'=>'', 'so_lan_xem'=>'', 'san_pham_moi'=>'', 'ngay_tao'=>'');
       	   $dataErr=array('ten_san_pham'=>'*', 'ten_san_pham_url'=>'*', 'mo_ta_tom_tat'=>'*', 'mo_ta_chi_tiet'=>'*', 'don_gia'=>'*'
       	   		, 'hinh'=>'*', 'err'=>'');

	        if(isset($_POST['btnThem']))
	        {
	            $data=array(
	                'ten_san_pham'=>$_POST['ten_san_pham'], 
	                'ten_san_pham_url'=>$_POST['ten_san_pham_url'], 
	                'ma_loai'=>$_POST['slMa_loai'], 
	                'mo_ta_tom_tat'=>$_POST['mo_ta_tom_tat'], 
	                'mo_ta_chi_tiet'=>$_POST['mo_ta_chi_tiet'], 
	                'don_gia'=>$_POST['don_gia'],
	                'so_lan_xem'=>0,
	                'san_pham_moi'=>1,
	                'ngay_tao'=>date('Y-m-d')
	            );
	            if($this->KiemTraDuLieu($data))
	            {
	                $kq=$this->KiemTraHinhAnh();
	                if($kq===1)
	                {
	                    //upload hinh
	                    $hinh=$_FILES['hinh'];
	                    $nameHinh=time().'-'.$hinh['name'];
	                    move_uploaded_file($hinh['tmp_name'],'./Public/images/hinh_san_pham/'.$nameHinh);
	                    $data['hinh']=$nameHinh;

	                    $m_san_pham =new M_san_pham();
	                    $kq=$m_san_pham->ThemSanPham($data);
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
				$m_loai_san_pham = new M_loai_san_pham();  
	    
				$DSLoaiMonAn = $m_loai_san_pham->LoaiSanPhamCha();
				$smarty->assign('DSLoaiMonAn',$DSLoaiMonAn);
				$smarty->display('sanpham/v_them_san_pham.tpl');
		}
	}

	public function KiemTraDuLieu($data)
    {
        $kq=true;
        if(empty($data['ten_san_pham']))
            $kq=false;
        if(empty($data['ten_san_pham_url']))
            $kq=false;
        if(empty($data['mo_ta_tom_tat']))
            $kq=false;
        if(empty($data['mo_ta_chi_tiet']))
            $kq=false;
        if(empty($data['don_gia']))
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

    public function danh_sach_san_pham_ad()
	{	
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$page = new Pager();
			$m_san_pham = new M_san_pham();
			$limit = 12;
			$start = $page->findStart($limit);
			
			$count = $m_san_pham->tong_so_san_pham();
			$numPages = $page->findPages($count, $limit);
			$DSSanPham = $m_san_pham->danh_sach_san_pham_phan_trang($start, $limit);
			$linkPages = $page->pageList($_GET['page'],$numPages);
			
			$smarty = new Smarty_ung_dung();
			
			$smarty->assign('linkPage', $linkPages);
			$smarty->assign('DSSanPham', $DSSanPham);
			
			$smarty->display('sanpham/v_danh_sach_san_pham_ad.tpl');
		}
	}

	public function sua_san_pham()
	{

		$masp = $_GET['masp'];


		$smarty=new Smarty_ung_dung();
		
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			$data=array('ten_san_pham'=>'', 'ten_san_pham_url'=>'','ma_loai'=>'', 'mo_ta_tom_tat'=>'', 'mo_ta_chi_tiet'=>'', 'don_gia'=>''
				, 'hinh'=>'', 'so_lan_xem'=>'', 'san_pham_moi'=>'', 'ngay_tao'=>'');
       	   $dataErr=array('ten_san_pham'=>'*', 'ten_san_pham_url'=>'*', 'mo_ta_tom_tat'=>'*', 'mo_ta_chi_tiet'=>'*', 'don_gia'=>'*'
       	   		, 'hinh'=>'*', 'err'=>'');

	        if(isset($_POST['btnSua']))
	        {
	            $data=array(
	                'ten_san_pham'=>$_POST['ten_san_pham'], 
	                'ten_san_pham_url'=>$_POST['ten_san_pham_url'], 
	                'ma_loai'=>$_POST['slMa_loai'], 
	                'mo_ta_tom_tat'=>$_POST['mo_ta_tom_tat'], 
	                'mo_ta_chi_tiet'=>$_POST['mo_ta_chi_tiet'], 
	                'don_gia'=>$_POST['don_gia']
	            );
	            if($this->KiemTraDuLieu($data))
	            {
	                $kq=$this->KiemTraHinhAnh();
	                if($kq===1)
	                {
	                    //upload hinh
	                    $hinh=$_FILES['hinh'];
	                    $nameHinh=time().'-'.$hinh['name'];
	                    move_uploaded_file($hinh['tmp_name'],'./Public/images/hinh_san_pham/'.$nameHinh);
	                    $data['hinh']=$nameHinh;

	                    $m_san_pham =new M_san_pham();
	                    $kq=$m_san_pham->SuaSanPham($data, $masp);
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
	        	$m_san_pham = new M_san_pham();
	        	$san_pham = $m_san_pham->san_pham_theo_ma($masp);

	        	$data=array(
	                'ten_san_pham'=>$san_pham['ten_san_pham'], 
	                'ten_san_pham_url'=>$san_pham['ten_san_pham_url'], 
	                'ma_loai'=>$san_pham['ma_loai'], 
	                'mo_ta_tom_tat'=>$san_pham['mo_ta_tom_tat'], 
	                'mo_ta_chi_tiet'=>$san_pham['mo_ta_chi_tiet'], 
	                'don_gia'=>$san_pham['don_gia']
	            );


	        }

				$smarty->assign('data',$data);    
				$smarty->assign('dataErr',$dataErr);  
				$smarty->assign('masp',$masp);  
				$m_loai_san_pham = new M_loai_san_pham();  
	    
				$DSLoaiMonAn = $m_loai_san_pham->LoaiSanPhamCha();
				$smarty->assign('DSLoaiMonAn',$DSLoaiMonAn);
				$smarty->display('sanpham/v_sua_san_pham.tpl');
		}
	}

	public function xoa_san_pham()
	{

		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{

			$masp = $_GET['masp'];
			$m_san_pham = new m_san_pham();
			$san_pham = $m_san_pham->XoaSanPham($masp);

			
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

			header("location:".path.'quan-tri/danh-sach-san-pham.html');	
		}
	}

	public function danh_sach_loai_san_pham()
	{
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$page = new Pager();
			$m_san_pham = new m_san_pham();
			$limit = 12;
			$start = $page->findStart($limit);
			
			$count = $m_san_pham->tong_so_loai_san_pham();
			$numPages = $page->findPages($count, $limit);
			$DSLoaiSanPham = $m_san_pham->danh_sach_loai_san_pham_phan_trang($start, $limit);
			$linkPages = $page->pageList($_GET['page'],$numPages);
			
			$smarty = new Smarty_ung_dung();
			
			$smarty->assign('linkPage', $linkPages);
			$smarty->assign('DSLoaiSanPham', $DSLoaiSanPham);
			
			$smarty->display('sanpham/v_danh_sach_loai_san_pham.tpl');
		}
	}

	public function them_loai_san_pham()
	{
		$smarty=new Smarty_ung_dung();
		
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
		  $data=array('ten_loai'=>'', 'ten_loai_url'=>'','mo_ta'=>'', 'ma_loai_cha'=>'', 'hinh'=>'');
       	   $dataErr=array('ten_loai'=>'*', 'ten_loai_url'=>'*','hinh'=>'', 'err'=>'');

	        if(isset($_POST['btnThem']))
	        {
	            $data=array(
	                'ten_loai'=>$_POST['ten_loai'], 
	                'ten_loai_url'=>$_POST['ten_loai_url'], 
	                'mo_ta'=>$_POST['mo_ta'], 
	                'ma_loai_cha'=>$_POST['slMa_loai']
	            );
	            if($this->KiemTraDuLieuLoaiSp($data))
	            {
	                $kq=$this->KiemTraHinhAnh();
	                if($kq===1)
	                {
	                    //upload hinh
	                    $hinh=$_FILES['hinh'];
	                    $nameHinh=time().'-'.$hinh['name'];
	                    move_uploaded_file($hinh['tmp_name'],'./Public/images/tam/'.$nameHinh);
	                    $data['hinh']=$nameHinh;

	                    $m_san_pham =new M_san_pham();
	                    $kq=$m_san_pham->ThemLoaiSanPham($data);
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
				$m_loai_san_pham = new M_loai_san_pham();  
	    
				$DSLoaiSp = $m_loai_san_pham->getLoaiCha();
				$smarty->assign('DSLoaiSp',$DSLoaiSp);

				$smarty->display('sanpham/v_them_loai_san_pham.tpl');
		}
	}

	public function KiemTraDuLieuLoaiSp($data)
    {
        $kq=true;
        if(empty($data['ten_loai']))
            $kq=false;
        if(empty($data['ten_loai_url']))
            $kq=false;
        return $kq;
    }

    public function sua_loai_san_pham()
    {
    	$maloai = $_GET['maloai'];

    	$smarty=new Smarty_ung_dung();
		
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		
		else
		{
			 $data=array('ten_loai'=>'', 'ten_loai_url'=>'','mo_ta'=>'', 'ma_loai_cha'=>'', 'hinh'=>'');
       	  	 $dataErr=array('ten_loai'=>'*', 'ten_loai_url'=>'*','hinh'=>'', 'err'=>'');

	        if(isset($_POST['btnSua']))
	        {
	            $data=array(
	                'ten_loai'=>$_POST['ten_loai'], 
	                'ten_loai_url'=>$_POST['ten_loai_url'], 
	                'mo_ta'=>$_POST['mo_ta'], 
	                'ma_loai_cha'=>$_POST['slMa_loai']
	            );
	            if($this->KiemTraDuLieuLoaiSp($data))
	            {
	                $kq=$this->KiemTraHinhAnh();
	                if($kq===1)
	                {
	                    //upload hinh
	                    $hinh=$_FILES['hinh'];
	                    $nameHinh=time().'-'.$hinh['name'];
	                    move_uploaded_file($hinh['tmp_name'],'./Public/images/tam/'.$nameHinh);
	                    $data['hinh']=$nameHinh;

	                    $m_san_pham =new M_san_pham();
	                    $kq=$m_san_pham->SuaLoaiSanPham($data, $maloai);

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
	        	$m_san_pham = new M_san_pham();
	        	$san_pham = $m_san_pham->loaisptheoma($maloai);

	        	$data=array(
	                'ten_loai'=>$san_pham['ten_loai'], 
	                'ten_loai_url'=>$san_pham['ten_loai_url'], 
	                'mo_ta'=>$san_pham['mo_ta'], 
	                'ma_loai_cha'=>$san_pham['ma_loai_cha']
	            );


	        }

				$smarty->assign('data',$data);    
				$smarty->assign('dataErr',$dataErr);  
				$smarty->assign('maloai',$maloai);  
				$m_loai_san_pham = new M_loai_san_pham();  
	    
				$DSLoaiSp = $m_loai_san_pham->getLoaiCha();
				$smarty->assign('DSLoaiSp',$DSLoaiSp);
				$smarty->display('sanpham/v_sua_loai_san_pham.tpl');
		}
    }

    public function xoa_loai_san_pham()
	{

		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{

			$maloai = $_GET['maloai'];
			$m_san_pham = new M_san_pham();
			$san_pham = $m_san_pham->XoaLoaiSanPham($maloai);

			
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

			header("location:".path.'quan-tri/danh-sach-loai-san-pham.html');	
		}
	}

	 public function san_pham_tra_gop()
	 {
	 	$masp = $_GET['masp'];

    	$smarty=new Smarty_ung_dung();
		$m_san_pham = new M_san_pham();
		
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$data=array('ma_san_pham'=>'','tu_ngay'=>'','den_ngay'=>'', 'thong_tin_tra_gop'=>'');
			$err='';
	        if(isset($_POST['btnThem']))
	        {
	        	$ktsp = $m_san_pham->getSanPhamTraGop($masp);
	        	if($ktsp)
	        	{
	        		 $err='<span style="color:#0000ff">Sản phẩm này đã có trả góp rồi!</span>';
	        	}
	        	else
	        	{
		            $data=array(
		            	'ma_san_pham'=>$masp,
		                'tu_ngay'=>$_POST['tu_ngay'], 
		                'den_ngay'=>$_POST['den_ngay'], 
		                'thong_tin_tra_gop'=>$_POST['thong_tin_tra_gop'], 
		            );
		            
		                    $kq=$m_san_pham->SanPhamTraGop($data);

		                    if($kq)
		                        $err='<span style="color:#0000ff">Thêm thành công</span>';
		                    else
		                        $err='<span style="color:#ff0000">Thêm không thành công</span>';

		         }
	        }
	        else
	        {

	        	$data=array(
	                'tu_ngay'=>date('Y-m-d'), 
	                'den_ngay'=>date('Y-m-d', strtotime("+30 days")), 
	            );

	        }

				$smarty->assign('data',$data);    
				$smarty->assign('masp',$masp);  
				$smarty->assign('err',$err);  

				$smarty->display('sanpham/v_san_pham_tra_gop.tpl');
		}

	 }
}
?>
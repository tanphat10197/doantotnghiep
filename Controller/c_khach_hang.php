<?php
require_once('Controller/smarty_ung_dung.php');
require_once('Controller/c_san_pham.php');
include_once('Library/Gio_hang.php');
include_once('Model/m_khach_hang.php');
class C_khach_hang
{
	public function them_san_pham()
	{	
		$ma_san_pham=$_POST['ma_san_pham'];
		$so_luong=$_POST['so_luong'];
		$m_san_pham=new M_san_pham();
		$san_pham=$m_san_pham->san_pham_theo_ma($ma_san_pham);
		if ($ma_san_pham)
		{
			$gio_hang= new Gio_hang();
			$smarty=new Smarty_ung_dung();
			$don_gia_ban=$san_pham['don_gia'];
			$gio_hang->Them($ma_san_pham,$san_pham['ten_san_pham'],$don_gia_ban,$so_luong);

			$so_luong = $gio_hang->TongSoLuong();
			$smarty->assign('so_luong', $so_luong);
			$smarty->display('v_trang_chu.tpl');
			echo '1';
		}
		else
			echo '0';
	}

	public function xem_gio_hang()
	{
		$smarty=new Smarty_ung_dung();
		$gio_hang= new Gio_hang(); 
		$ttGioHang=$gio_hang->ThongTinGioHang();
		$tong_tien=$gio_hang->TongSoTien();
		
		
		$smarty->assign('ttGioHang',$ttGioHang);
		$smarty->assign('tong_tien',$tong_tien);
		
		
		$smarty->display('khach_hang/v_thong_tin_gio_hang.tpl');
	}

	public function cap_nhat_gio_hang()
	{
		$gio_hang= new Gio_hang();
		
		$ttGioHang=$gio_hang->ThongTinGioHang();
		if($ttGioHang)
		{
			foreach($ttGioHang as $id=>$arrtt)
			{
				$slMoi=$_POST['sl_'.$id];
				if($slMoi!=$arrtt[1])
				{
					$gio_hang->CapNhatGioHang($id,$slMoi);
				}
			}
		}
		header('location:'.path.'khach-hang/gio-hang.html');
	}

	public function huy_gio_hang()
	{
		$gio_hang= new Gio_hang();
		$gio_hang->HuyGioHang();
		header('location:'.path.'khach-hang/gio-hang.html');
	}
	
	public function dat_hang()
	{
		$dataKhachHang=array('ten_khach_hang'=>'', 'phai'=>0,'ngay_sinh'=>'', 'dia_chi'=>'', 'dien_thoai'=>'', 'email'=>'');
		$dataErr=array('ten_khach_hang'=>'', 'phai'=>0, 'ngay_sinh'=>'', 'dia_chi'=>'', 'dien_thoai'=>'', 'email'=>'');
		if(!isset($_SESSION['nguoi_dung']))
		{
			if(isset($_POST['dangky']))
			{
				$dataKhachHang=array(
					'ten_khach_hang'=>$_POST['ten_khach_hang'],
					'phai'=>$_POST['phai'], 
					'ngay_sinh'=>$_POST['ngay_sinh'], 
					'dia_chi'=>$_POST['dia_chi'], 
					'dien_thoai'=>$_POST['dien_thoai'], 
					'email'=>$_POST['email'], 
					);
				$res=1;
				$dataErr=$this->KiemTraDuLieu($dataKhachHang,$res);
				if($res==1)
				{
					$m_khach_hang = new M_khach_hang();
					$maKH=$m_khach_hang->ThemKhachHang($dataKhachHang);

					if($maKH)
					{
						$giohang = new Gio_hang();
						
						$dataHoaDon = array('ngay_hd'=>date('Y-m-d'),
										'ma_khach_hang'=>$maKH,
										'tri_gia'=>$giohang->TongSoTien());
						
						$soHD = $m_khach_hang->ThemDonDatHang($dataHoaDon);
						
						foreach($giohang->ThongTinGioHang() as $id=>$ttMH)
						{
							$dataChiTietHoaDOn = array('so_hoa_don'=>$soHD,
												'ma_san_pham'=>$id,
												'so_luong'=>$ttMH[1],
												'don_gia'=>$ttMH[0]);
							$m_khach_hang->ThemChiTietHoaDon($dataChiTietHoaDOn);

							$giohang->HuyGioHang();
							header('location:'.path.'khach-hang/thong-tin-don-dat-hang/'.$soHD);
						}

					}
					else
						$dataErr['mss']='Thêm không thành công';
				}
			}
			$smarty=new Smarty_ung_dung();
			$smarty->assign('data',$dataKhachHang);
			$smarty->assign('dataErr',$dataErr);
			$smarty->display('khach_hang/v_dang_ky_mua_hang.tpl');
		}
		else
		{
			$dataKhachHang=array('ten_khach_hang'=>'', 'phai'=>0,'ngay_sinh'=>'', 'dia_chi'=>'', 'dien_thoai'=>'', 'email'=>'');
			
			$m_khach_hang = new M_khach_hang();
			$khach_hang = $m_khach_hang->getKhachHangDangNhap($_SESSION['nguoi_dung']['ma_nguoi_dung']);
			$ten_khach_hang = $khach_hang['ten_khach_hang'];
			$phai = $khach_hang['phai'];
			$email = $khach_hang['email'];
			$ngay_sinh = $khach_hang['ngay_sinh'];
			$dia_chi = $khach_hang['dia_chi'];
			$sdt = $khach_hang['dien_thoai'];


			if(isset($_POST['dangky']))
			{
				$dataKhachHang=array(
					'ten_khach_hang'=>$ten_khach_hang,
					'phai'=>$phai, 
					'ngay_sinh'=>$ngay_sinh, 
					'dia_chi'=>$dia_chi, 
					'dien_thoai'=>$sdt, 
					'email'=>$email, 
					);
				$res=1;
				$dataErr=$this->KiemTraDuLieu($dataKhachHang,$res);
				if($res==1)
				{
					$m_khach_hang = new M_khach_hang();
					$maKH=$m_khach_hang->ThemKhachHang($dataKhachHang);

					if($maKH)
					{
						$giohang = new Gio_hang();
						
						$dataHoaDon = array('ngay_hd'=>date('Y-m-d'),
										'ma_khach_hang'=>$maKH,
										'tri_gia'=>$giohang->TongSoTien());
						
						$soHD = $m_khach_hang->ThemDonDatHang($dataHoaDon);
						
						foreach($giohang->ThongTinGioHang() as $id=>$ttMH)
						{
							$dataChiTietHoaDOn = array('so_hoa_don'=>$soHD,
												'ma_san_pham'=>$id,
												'so_luong'=>$ttMH[1],
												'don_gia'=>$ttMH[0]);
							$m_khach_hang->ThemChiTietHoaDon($dataChiTietHoaDOn);

							$giohang->HuyGioHang();
							header('location:'.path.'khach-hang/thong-tin-don-dat-hang/'.$soHD);
						}

					}
					else
						$dataErr['mss']='Thêm không thành công';
				}
			}


			$smarty=new Smarty_ung_dung();
			$smarty->assign('ten_khach_hang',$ten_khach_hang);
			$smarty->assign('phai',$phai);
			$smarty->assign('email',$email);
			$smarty->assign('ngay_sinh',$ngay_sinh);
			$smarty->assign('dia_chi',$dia_chi);
			$smarty->assign('sdt',$sdt);
			$smarty->display('khach_hang/v_dang_ky_mua_hang.tpl');
		}


	
	}

	public function KiemTraDuLieu($data, &$res)	
	{
		$dataErr=array('ten_khach_hang'=>'', 'phai'=>0,'ngay_sinh'=>'', 'dia_chi'=>'', 'dien_thoai'=>'', 'email'=>'');
		if(empty($data['ten_khach_hang']))
		{
			$res=0;
			$dataErr['ten_khach_hang']='*';
		}
		if(empty($data['email']))
		{
			$res=0;
			$dataErr['email']='*';
		}
		if(empty($data['dia_chi']))
		{
			$res=0;
			$dataErr['dia_chi']='*';
		}
		if(empty($data['dien_thoai']))
		{
			$res=0;
			$dataErr['dien_thoai']='*';
		}
		if(empty($data['ngay_sinh']))
		{
			$res=0;
			$dataErr['ngay_sinh']='*';
		}
		return $dataErr;
	}
	
	public function xem_thong_tin_don_dat_hang()
	{
		if(!isset($_GET['id']))
			header('location:'.path);
		$soHD=$_GET['id'];
		$m_khach_hang = new M_khach_hang();
		$TTDOnDatHang=$m_khach_hang->DonDatHang($soHD);
		$this->guiMail($TTDOnDatHang);
		$smarty=new Smarty_ung_dung();
		$smarty->assign('DonDatHang',$TTDOnDatHang);
		$smarty->display('khach_hang/v_thong_tin_don_dat_hang.tpl');
	}
	
	public function guiMail($HoaDon)
    {
        require 'Library/PHPMailer/PHPMailerAutoload.php';        
        $mail = new PHPMailer;      
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;        
        $mail->Debugoutput = 'html';     
        $mail->SMTPSecure='ssl';  
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;        
        $mail->SMTPAuth = true;        
        $mail->Username = "hltphat10197@gmail.com";        
        $mail->Password = "CNTTkhoahoc123#";        
        $mail->setFrom('hltphat10197@gmail.com', 'CONG TY TNHH DT GEAR');                       
        $mail->addAddress($HoaDon[0]['email'], $HoaDon[0]['ten_khach_hang']);       
        $mail->Subject = 'THONG TIN DON DAT HANG';                       
        $mail->msgHTML($this->noi_dung_gui_mail($HoaDon));       
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
    public function noi_dung_gui_mail($hoadon)
    {
        $noi_dung='
        <table align="center" cellspacing="10px" border="0" style="border:1px solid #00F;" width="90%">
            <tr>
                <td style="padding-left:20px">Mã khách hàng</td>
                <td width="250px">'.$hoadon[0]['ma_khach_hang'].'</td>
                <td>Tên khách hàng</td>
                <td>'.$hoadon[0]['ten_khach_hang'].'</td>
            </tr>
                <tr>
                <td style="padding-left:20px">Địa chỉ</td>
                <td>'.$hoadon[0]['dia_chi'].'</td>
                <td>Điện thoại</td>
                <td>'.$hoadon[0]['dien_thoai'].'</td>
            </tr>
                <tr>
                <td style="padding-left:20px">Số hóa đơn</td>
                <td>'.$hoadon[0]['so_hoa_don'].'</td>
                <td>Ngày đặt</td>
                <td>'.$hoadon[0]['ngay_hd'].'</td>
            </tr>
            <tr>
            <td colspan="4">
                <table align="center" cellspacing="10px" border="0" width="100%">
                    <tr bgcolor="#999999"><td>STT</td><td>Mã sản phẩm</td><td>Tên sản phẩm</td><td>Đơn giá</td><td>Số lượng</td><td>Thành tiền</td></tr>';
            $i=1;$tt=0;
            foreach($hoadon as $item)
            {
                $noi_dung.='<tr>';
                $noi_dung.= '<td>'.$i.'</td>';
                $noi_dung.= '<td>'.$item['ma_san_pham'].'</td>';
                $noi_dung.= '<td>'.$item['ten_san_pham'].'</td>';
                $noi_dung.= '<td>'.$item['don_gia'].'</td>';
                $noi_dung.= '<td>'.$item['so_luong'].'</td>';
                $noi_dung.= '<td>'.number_format($item['don_gia']*$item['so_luong']).'</td>';
                $noi_dung.='</tr>';
                $tt=$tt+$item['so_luong']*$item['don_gia'];
                $i++;
            }
            $noi_dung.='<tr><td colspan="5">Tổng trị giá hóa đơn</td><td>'.number_format($tt).'</td></tr>';    
          $noi_dung.='</table>        
            </td>
            </tr>
        </table>        
        ';
        return $noi_dung;
    }
	
	public function lien_he_chung_toi()
	{
		$smarty = new Smarty_ung_dung();
		$smarty->display('lien_he/v_lien_he.tpl');
	}
	
	public function don_dat_hang()
	{
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$smarty = new Smarty_ung_dung();

			$m_khach_hang = new M_khach_hang();
			$DSDonHang = $m_khach_hang->getDonDatHang();


			$smarty->assign('DSDonHang',$DSDonHang);

			$smarty->display('khach_hang/v_don_dat_hang.tpl');
		}
	}

	public function chi_tiet_don_dat_hang()
	{
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{
			$mahd = $_GET['mahd'];

			$smarty = new Smarty_ung_dung();

			$m_khach_hang = new M_khach_hang();
			$CTDonHang = $m_khach_hang->chi_tiet_hoa_don($mahd);


			$smarty->assign('CTDonHang',$CTDonHang);
			$smarty->assign('mahd',$mahd);

			$smarty->display('khach_hang/v_chi_tiet_don_dat_hang.tpl');
		}
	}

	public function cap_nhat_tinh_trang()
	{
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{

			$mahd = $_GET['mahd'];
			$m_khach_hang = new M_khach_hang();
			$khach_hang = $m_khach_hang->CapNhatTinhTrang($mahd);

			header("location:".path.'quan-tri/don-dat-hang.html');	
		}
	}

	public function xoa_hoa_don()
	{
		if(!isset($_SESSION['nguoi_dung']) || $_SESSION['nguoi_dung']['role'] != 1)
		{
			header("location:".path);
		}
		else
		{

			$mahd = $_GET['mahd'];
			$m_khach_hang = new M_khach_hang();
			$khach_hang = $m_khach_hang->xoa_don_hang($mahd);

			header("location:".path.'quan-tri/don-dat-hang.html');	
		}
	}
	
	
	
	
	
	
}
?>
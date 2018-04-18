<?php
require_once('database.php');
class M_nguoi_dung extends Database
{
	public function getNguoiDungDangNhap($tendn, $mk)
	{
		$query="Select * from nguoi_dung where ten_dang_nhap=? and mat_khau=?";
		$this->setQuery($query);
		return $this->loadRow(array($tendn, $mk));
	}
	
	
	public function ThemTaiKhoan($data)
    {
			$chuoiSQL='insert into nguoi_dung(ma_loai_nguoi_dung, ho_ten, ten_dang_nhap, mat_khau, email, dien_thoai ,ngay_dang_ky, active) values(?,?,?,?,?,?,?,?)';
			$this->setQuery($chuoiSQL);
			return $this->execute(array($data['ma_loai_nguoi_dung'],$data['ho_ten'], $data['ten_dang_nhap'], $data['mat_khau'], $data['email'], $data['dien_thoai'], date('Y-m-d'), 0));
    }

    public function tong_tai_khoan()
	{
		$this->setQuery("select * from nguoi_dung");
		return $this->CountAll();
	}

	public function danh_sach_nguoi_dung_phan_trang($start,$limit)
	{
		$query="Select * from nguoi_dung limit $start,$limit";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function getLoaiNguoiDung()
	{
		$query="Select ma_loai_nguoi_dung, ten_loai_nguoi_dung from loai_nguoi_dung ";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function getNguoiDungTheoMa($ma_nguoi_dung)
	{
		$query="Select * from nguoi_dung where ma_nguoi_dung = ? ";
		$this->setQuery($query);
		return $this->loadRow(array($ma_nguoi_dung));
	}

	public function SuaTaiKhoan($data, $ma_nguoi_dung)
    {
			$chuoiSQL='update nguoi_dung set ho_ten = ?, ten_dang_nhap=?, mat_khau=?,ma_loai_nguoi_dung=?, email=?, dien_thoai=? where ma_nguoi_dung=?';
			$this->setQuery($chuoiSQL);
			return $this->execute(array($data['ho_ten'], $data['ten_dang_nhap'], $data['mat_khau'],$data['ma_loai_nguoi_dung'], $data['email'], $data['dien_thoai'],$ma_nguoi_dung));
    }

    public function XoaNguoiDung($ma_nguoi_dung)
    {
   		 $chuoiSQL = "delete from nguoi_dung where ma_nguoi_dung = ?";
    	 $this->setQuery($chuoiSQL);
    	 return $this->execute(array($ma_nguoi_dung));
    }

    public function KTNguoiDungTenDN($ten_dang_nhap)
    {
    	$query="Select * from nguoi_dung where ten_dang_nhap = ? ";
		$this->setQuery($query);
		return $this->loadRow(array($ten_dang_nhap));
    }

     public function KTNguoiDungEmail($email)
    {
    	$query="Select * from nguoi_dung where email = ? ";
		$this->setQuery($query);
		return $this->loadRow(array($email));
    }
}
?>
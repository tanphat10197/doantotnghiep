<?php
require_once('database.php');
class M_khach_hang extends Database
{
	public function ThemKhachHang($data)
	{
		$sql='insert into khach_hang(`ten_khach_hang`, `phai`, `ngay_sinh`, `dia_chi`, `dien_thoai`, `email`) values(?,?,?,?,?,?)';
		$this->setQuery($sql);
		$this->execute(array($data['ten_khach_hang'], $data['phai'], $data['ngay_sinh'], $data['dia_chi'], $data['dien_thoai'], 
			$data['email']));
		return $this->lastInsertId();
	}

	public function ThemDonDatHang($data)
    {
        $this->setQuery('insert into hoa_don(`ngay_hd`, `ma_khach_hang`, `tri_gia`) values(?,?,?)');
        $this->execute(array($data['ngay_hd'], $data['ma_khach_hang'], $data['tri_gia']));
        return $this->lastInsertId();
    }

      public function ThemChiTietHoaDon($data)
	  {
	        $this->setQuery('insert into ct_hoa_don(`so_hoa_don`, `ma_san_pham`, `so_luong`, `don_gia`) values(?,?,?,?)');
	        return $this->execute(array($data['so_hoa_don'], $data['ma_san_pham'], $data['so_luong'], $data['don_gia']));
	  }

	   public function DonDatHang($SoHD)
	    {
	        $chuoiSQL='SELECT `khach_hang`.`ma_khach_hang`, `ten_khach_hang`, `phai`, `email`, `dia_chi`, `dien_thoai`,`hoa_don`.`so_hoa_don`, `ngay_hd`, `tri_gia`,`ct_hoa_don`.`ma_san_pham`, `ct_hoa_don`.`so_luong`, `ct_hoa_don`.`don_gia` from khach_hang, ct_hoa_don, hoa_don where khach_hang.ma_khach_hang = hoa_don.ma_khach_hang and hoa_don.so_hoa_don = ct_hoa_don.so_hoa_don and hoa_don.so_hoa_don=?';
	        $this->setQuery($chuoiSQL);
	        $DonDatHang=$this->loadAllRows(array($SoHD));
	        if(count($DonDatHang)>0)
	        {
	           for($i=0;$i<count($DonDatHang);$i++)
	           {
	                    $DonDatHang[$i]['ten_san_pham']=$this->LayTenSanPham($DonDatHang[$i]['ma_san_pham']);
	           }
	           return $DonDatHang;
	        }
	        else
	            return false;
	    }
	     public function LayTenSanPham($ma_san_pham)
	    {
	        $this->setQuery('select * from san_pham where ma_san_pham=?');
	        $sanpham=$this->loadRow(array($ma_san_pham));
	        if($sanpham)
	            return $sanpham['ten_san_pham'];
	        return false;
	    }

	    public function getKhachHangDangNhap($ma_khach_hang)
	    {
			$query="Select * from khach_hang where ma_khach_hang = ?";
			$this->setQuery($query);
			return $this->loadRow(array($ma_khach_hang));
		}

		public function getDonDatHang()
		{
			$query="SELECT `hoa_don`.`so_hoa_don`, hoa_don.ngay_hd, khach_hang.ten_khach_hang, khach_hang.dien_thoai, ct_hoa_don.tinh_trang, hoa_don.tri_gia FROM `hoa_don`, ct_hoa_don, khach_hang WHERE hoa_don.ma_khach_hang = khach_hang.ma_khach_hang and ct_hoa_don.so_hoa_don = hoa_don.so_hoa_don GROUP by `hoa_don`.`so_hoa_don`, hoa_don.ngay_hd, khach_hang.ten_khach_hang, khach_hang.dien_thoai, ct_hoa_don.tinh_trang,hoa_don.tri_gia
ORDER by ngay_hd DESC";
			$this->setQuery($query);
			return $this->loadAllRows();
		}

		public function chi_tiet_hoa_don($ma_hd)
		{
			$query="SELECT ct_hoa_don.*, khach_hang.ten_khach_hang, khach_hang.dien_thoai, san_pham.ten_san_pham FROM `ct_hoa_don`, hoa_don, khach_hang, san_pham WHERE ct_hoa_don.ma_san_pham = san_pham.ma_san_pham and hoa_don.so_hoa_don = ct_hoa_don.so_hoa_don and hoa_don.ma_khach_hang = khach_hang.ma_khach_hang and ct_hoa_don.so_hoa_don = ?";
			$this->setQuery($query);
			return $this->loadAllRows(array($ma_hd));
		}

		public function CapNhatTinhTrang($so_hoa_don)
		{
	        $chuoiSQL='update ct_hoa_don set tinh_trang = 1 where so_hoa_don = ?';
	        $this->setQuery($chuoiSQL);
	        return $this->execute(array($so_hoa_don));
		}

		public function xoa_don_hang($so_hoa_don)
		{
			 $chuoiSQL='delete from ct_hoa_don where so_hoa_don = ?';
	        $this->setQuery($chuoiSQL);
	        return $this->execute(array($so_hoa_don));
		}

}
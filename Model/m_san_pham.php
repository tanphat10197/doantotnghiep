<?php
require_once('database.php');
class M_san_pham extends Database
{
	
	public function san_pham_hot()
	{
		$query="Select * from san_pham order by so_lan_xem limit 0,8";
		$this->setQuery($query);
		return $this->loadAllRows();
	}


	public function san_pham_laptop()
	{
		$query="Select san_pham.* from san_pham, loai_san_pham where san_pham.ma_loai = loai_san_pham.ma_loai and loai_san_pham.ma_loai_cha=16 limit 0,3";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function san_pham_tra_gop()
	{
		$query="SELECT san_pham.* FROM san_pham, san_pham_tra_gop WHERE san_pham.ma_san_pham = san_pham_tra_gop.ma_san_pham limit 0,3";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function san_pham_theo_loai($ma_loai, $ma_san_pham)
	{
		$query="Select * from san_pham where ma_loai=? and ma_san_pham != ? LIMIT 0,8";
		$this->setQuery($query);
		return $this->loadAllRows(array($ma_loai, $ma_san_pham));
	}
	
	public function danh_sach_san_pham_theo_loai_phan_trang($ma_loai,$start,$limit)
	{
		$query="Select * from san_pham where ma_loai=? limit $start,$limit";
		$this->setQuery($query);
		return $this->loadAllRows(array($ma_loai));
	}
	
	
	public function san_pham_theo_ma($ma_san_pham)
	{
		$query="Select * from san_pham where ma_san_pham=?";
		$this->setQuery($query);
		return $this->loadRow(array($ma_san_pham));
	}

	public function cap_nhat_luot_xem($ma_san_pham)
	{
		$query="update san_pham set so_lan_xem = so_lan_xem + 1 where ma_san_pham=?";
		$this->setQuery($query);
		return $this->execute(array($ma_san_pham));
	}
	
	public function danh_sach_san_pham_phan_trang($start,$limit)
	{
		$query="Select * from san_pham limit $start,$limit";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function danh_sach_san_pham_phan_trang_ad($start,$limit)
	{
		$query="Select * from san_pham limit $start,$limit";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function danh_sach_loai_san_pham_phan_trang($start,$limit)
	{
		$query="Select * from loai_san_pham limit $start,$limit";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	
	public function tong_so_san_pham()
	{
		$this->setQuery("select * from san_pham");
		return $this->CountAll();
	}

	public function tong_so_loai_san_pham()
	{
		$this->setQuery("select * from loai_san_pham");
		return $this->CountAll();
	}

	public function san_pham_theo_ten($ten)
	{
		$query="Select * from san_pham where ten_san_pham like '%$ten%' ";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function ThemSanPham($data)
    {
        $chuoiSQL='insert into san_pham(`ma_loai`, `ten_san_pham`, `ten_san_pham_url`, `mo_ta_tom_tat`, `mo_ta_chi_tiet`, `don_gia`, 
        	`hinh`, `san_pham_moi`, `so_lan_xem`, `ngay_tao`) values(?,?,?,?,?,?,?,?,?,?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ma_loai'], $data['ten_san_pham'], $data['ten_san_pham_url'], $data['mo_ta_tom_tat'], $data['mo_ta_chi_tiet'], $data['don_gia'], $data['hinh'], $data['san_pham_moi'], $data['so_lan_xem'],$data['ngay_tao']));
    }

    public function SuaSanPham($data, $ma_san_pham)
    {
        $chuoiSQL='update san_pham set ma_loai = ?, ten_san_pham = ?, ten_san_pham_url = ?, mo_ta_tom_tat = ?, mo_ta_chi_tiet = ?
        	,don_gia = ?, hinh = ? where ma_san_pham = ?';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ma_loai'], $data['ten_san_pham'], $data['ten_san_pham_url'], $data['mo_ta_tom_tat'], $data['mo_ta_chi_tiet'], $data['don_gia'], $data['hinh'], $ma_san_pham));
    }

    public function XoaSanPham($ma_san_pham)
    {
    	$chuoiSQL = "delete from san_pham where ma_san_pham = ?";
    	$this->setQuery($chuoiSQL);
    	return $this->execute(array($ma_san_pham));
    }

    public function ThemLoaiSanPham($data)
    {
        $chuoiSQL='insert into loai_san_pham(`ten_loai`, `ten_loai_url`, `mo_ta`, `ma_loai_cha`, `hinh`) values(?,?,?,?,?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_url'], $data['mo_ta'], $data['ma_loai_cha'], $data['hinh']));
    }

    public function loaisptheoma($maloai)
    {
    	$query="Select * from loai_san_pham where ma_loai=?";
		$this->setQuery($query);
		return $this->loadRow(array($maloai));
    }

    public function SuaLoaiSanPham($data, $maloai)
    {
        $chuoiSQL='update loai_san_pham set ten_loai = ?, ten_loai_url = ?, mo_ta = ?, ma_loai_cha = ?, hinh = ? where ma_loai = ?';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_url'], $data['mo_ta'], $data['ma_loai_cha'], $data['hinh'], $maloai));
    }

    public function XoaLoaiSanPham($ma_loai)
    {
    	$chuoiSQL = "delete from loai_san_pham where ma_loai = ?";
    	$this->setQuery($chuoiSQL);
    	return $this->execute(array($ma_loai));
    }

    public function SanPhamTraGop($data)
    {
    	$chuoiSQL='insert into san_pham_tra_gop(`ma_san_pham`, `tu_ngay`, `den_ngay`, `thong_tin_tra_gop`) values(?,?,?,?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ma_san_pham'], $data['tu_ngay'], $data['den_ngay'], $data['thong_tin_tra_gop']));
    }

    public function getSanPhamTraGop($ma_san_pham)
    {
    	$query="Select ma_san_pham from san_pham_tra_gop where ma_san_pham=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($ma_san_pham));
    }
}
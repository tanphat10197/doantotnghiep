<?php
require_once('database.php');
class M_bai_viet extends Database
{
	public function danh_sach_bai_viet()
	{
		$query="SELECT bai_viet.*, loai_bai_viet.ten_loai_bai_viet FROM bai_viet, loai_bai_viet WHERE bai_viet.ma_loai_bai_viet = loai_bai_viet.ma_loai_bai_viet order by ngay_xuat_ban desc";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function danh_sach_bai_viet_phan_trang($limit, $start)
	{
		$query="SELECT bai_viet.*, loai_bai_viet.ten_loai_bai_viet FROM bai_viet, loai_bai_viet WHERE bai_viet.ma_loai_bai_viet = loai_bai_viet.ma_loai_bai_viet order by ngay_xuat_ban desc limit $start, $limit";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function tong_so_bai_viet()
	{
		$this->setQuery('select * from bai_viet');
		return $this->CountAll();	
	}

	public function bai_viet_theo_ma($ma_bai_viet)
	{
		$query="SELECT bai_viet.*, loai_bai_viet.ten_loai_bai_viet FROM bai_viet, loai_bai_viet WHERE bai_viet.ma_loai_bai_viet = loai_bai_viet.ma_loai_bai_viet and ma_bai_viet=?";
		$this->setQuery($query);
		return $this->loadRow(array($ma_bai_viet));
	}

	public function cap_nhat_luot_xem($ma_bai_viet)
	{
		$query="update bai_viet set so_lan_xem = so_lan_xem + 1 where ma_bai_viet=?";
		$this->setQuery($query);
		return $this->execute(array($ma_bai_viet));
	}

	public function getLoaiBaiViet()
	{
		$query="SELECT * from loai_bai_viet";
		$this->setQuery($query);
		return $this->loadAllRows();
	}

	public function ThemBaiViet($data)
    {
        $chuoiSQL='insert into bai_viet(`ma_loai_bai_viet`, `tieu_de`, `tieu_de_bai_viet_url`, `noi_dung_tom_tat`, `noi_dung_chi_tiet`, `ngay_xuat_ban`, 
        	`so_lan_xem`, `xuat_ban`, `hinh`) values(?,?,?,?,?,?,?,?,?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ma_loai_bai_viet'], $data['tieu_de'], $data['tieu_de_bai_viet_url'], $data['noi_dung_tom_tat'], $data['noi_dung_chi_tiet'], date('Y-m-d'),0, 1, $data['hinh']));
    }

    public function SuaBaiViet($data, $ma_bv)
    {
        $chuoiSQL='update bai_viet set ma_loai_bai_viet = ?, tieu_de=?,tieu_de_bai_viet_url=?,noi_dung_tom_tat=?,noi_dung_chi_tiet=?, hinh=? where ma_bai_viet=?';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ma_loai_bai_viet'], $data['tieu_de'], $data['tieu_de_bai_viet_url'], $data['noi_dung_tom_tat'], $data['noi_dung_chi_tiet'], $data['hinh'], $ma_bv));
    }

    public function XoaBaiViet($ma_bv)
    {
    	$query="delete from bai_viet where ma_bai_viet=?";
		$this->setQuery($query);
		return $this->execute(array($ma_bv));
    }

}
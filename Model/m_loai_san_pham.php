<?php
include_once('Model/Database.php');
class M_loai_san_pham extends Database
{
    public function LoaiSanPhamCha()
    {
        $this->setQuery('select * from loai_san_pham where ma_loai_cha=0');
        $DSLoaiCha=$this->loadAllRows();
        $DSLoaiMonAn=array();
        if($DSLoaiCha)
        {
            foreach($DSLoaiCha as $item)
            {
                $DSLoaiMonAn[]=array($item,$this->LoaiSanPhamCon($item['ma_loai']));
            }
        }
        return $DSLoaiMonAn;
    }
    public function LoaiSanPhamCon($maloaicha)
    {
        $this->setQuery('select * from loai_san_pham where ma_loai_cha=?');
        return $this->loadAllRows(array($maloaicha));
    }

    public function getLoaiCha()
    {
        $this->setQuery('SELECT `ma_loai`,`ten_loai` FROM `loai_san_pham` WHERE `ma_loai_cha` = 0');
        return $this->loadAllRows();
    }
}
?>
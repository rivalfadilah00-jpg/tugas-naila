<?php 

// Class induk (Parent)
class kendaraan
{

    public $merk;
    public function __construct($merk)
    {

        $this->merk = $merk;
    }
    public function berjalan()    
    {

         return $this->merk . " sedang melaju...";
    }
}
// class anak (Child) mewarisi class kendaraan
class mobil extends kendaraan
{
    public $jumlahPintu = 4;
    public function bukapintu()
    {

        return "Membuka " . $this->jumlahPintu . " pintu mobil " . $this->merk;
    }
}     

$mobilRPL = new Mobil("Toyota");
echo $mobilRPL->berjalan(); //menggunakan method warisan dari parent
echo "<br>";
echo $mobilRPL->bukapintu(); //menggunakan metho
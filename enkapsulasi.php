<?php
class siswa {
    // property private, tidak bisa diubah langsung dari luar class
    private $nama;
    private $nilaiPBO;

    // method public untuk mengisi data (setter)
    public function setData($namaBaru, $nilaiBaru) {
$this->nama = $namaBaru;
// validasi: nilai tidak boleh lebih dari 100
if ($nilaiBaru <= 100) {
$this-> nilaiPBO = $nilaiBaru;
} else {
$this -> nilaiPBO =100;
}
}// method public untuk ngambil data (Getter)

public function getInfo() {

     return "siswa:" . $this -> nama . ",nilaiPBO:" . $this -> nilaiPBO;

}

}

$siswa1 = new siswa ();
// $siswa1 -> nilaiPBO = 150; // INI AKAN ERROR karena private!
$siswa1 -> setData ("Budi" , 85);
echo $siswa1 -> getInfo ();
?>
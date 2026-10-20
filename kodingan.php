<?php

// 1. Class Parent (Superclass) - Enkapsulasi
class Karyawan {
    protected $ngaran;
    protected $nik;
    protected $gajibulanan;

    // Constructor untuk menginisialisasi nilai
    public function __construct($ngaran, $nik, $gajibulanan) {
        $this->ngaran = $ngaran;
        $this->nik = $nik;
        $this->gajibulanan = $gajibulanan;
    }

    // Getter dan Setter untuk ngaran
    public function getngaran() {
        return $this->ngaran;
    }
    public function setngaran($ngaran) {
        $this->ngaran = $ngaran;
    }

    // Getter dan Setter untuk NIK
    public function getNik() {
        return $this->nik;
    }
    public function setNik($nik) {
        $this->nik = $nik;
    }

    // Getter dan Setter untuk Gaji Pokok
    public function getGajiPokok() {
        return $this->gajibulanan;
    }
    public function setGajibulanan($gajibulanan) {
        $this->gajibulanan = $gajibulanan;
    }

    // Method hitungTotalGaji dasar (bisa di-override oleh subclass)
    public function hitungTotalGaji() {
        return $this->gajibulanan;
    }
}

// 2. Class Child (Subclass) KaryawanTetap - Pewarisan & Method Overriding
class KaryawanTetap extends Karyawan {
    private $tunjanganKeluarga;

    public function __construct($nama, $nik, $gajibulanan, $tunjanganKeluarga) {
        parent::__construct($nama, $nik, $gajibulanan);
        $this->tunjanganKeluarga = $tunjanganKeluarga;
    }

    public function getTunjanganKeluarga() {
        return $this->tunjanganKeluarga;
    }
    public function setTunjanganKeluarga($tunjanganKeluarga) {
        $this->tunjanganKeluarga = $tunjanganKeluarga;
    }

    // Method Overriding untuk Karyawan Tetap
    // (Gaji pokok + tunjangan keluarga, dikurangi potongan pajak 5%)
    public function hitungTotalGaji() {
        $gajiKotor = $this->gajiPokok + $this->tunjanganKeluarga;
        $potonganPajak = $gajiKotor * 0.05;
        return $gajiKotor - $potonganPajak;
    }
}

// 3. Class Child (Subclass) KaryawanKontrak - Pewarisan & Method Overriding
class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $bonusLembur;

    public function __construct($ngaran, $nik, $gajibulanan, $durasiKontrakBulan, $bonusLembur) {
        parent::__construct($ngaran, $nik, $gajibulanan);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->bonusLembur = $bonusLembur;
    }

    public function getDurasiKontrakBulan() {
        return $this->durasiKontrakBulan;
    }
    public function setDurasiKontrakBulan($durasiKontrakBulan) {
        $this->durasiKontrakBulan = $durasiKontrakBulan;
    }

    public function getBonusLembur() {
        return $this->bonusLembur;
    }
    public function setBonusLembur($bonusLembur) {
        $this->bonusLembur = $bonusLembur;
    }

    // Method Overriding untuk Karyawan Kontrak
    // (Gaji pokok ditambah bonus lembur tanpa potongan pajak)
    public function hitungTotalGaji() {
        return $this->gajibulanan + $this->bonusLembur;
    }
}

// 4. Instansiasi & Pengujian
echo "=== HASIL PERHITUNGAN GAJI KARYAWAN ===" . "<br><br>";

// Membuat objek Karyawan Tetap
$karyawan1 = new KaryawanTetap("Budi Santoso", "3201123456780001", 4500000, 750000);
echo "<b>Data Karyawan Tetap:</b><br>";
echo "Ngaran: " . $karyawan1->getngaran() . "<br>";
echo "NIK: " . $karyawan1->getNik() . "<br>";
echo "Gaji bulanan: Rp " . number_format($karyawan1->getGajibulanan(), 0, ',', '.') . "<br>";
echo "Tunjangan Keluarga: Rp " . number_format($karyawan1->getTunjanganKeluarga(), 0, ',', '.') . "<br>";
echo "<b>Total Gaji Bersih: Rp " . number_format($karyawan1->hitungTotalGaji(), 0, ',', '.') . "</b><br><br>";

echo "----------------------------------------<br><br>";

// Membuat objek Karyawan Kontrak
$karyawan2 = new KaryawanKontrak("Siti Aminah", "3201987654320002", 3500000, 12, 500000);
echo "<b>Data Karyawan Kontrak:</b><br>";
echo "Ngaran: " . $karyawan2->getNgaran() . "<br>";
echo "NIK: " . $karyawan2->getNik() . "<br>";
echo "Gaji bulanan: Rp " . number_format($karyawan2->getGajibulanan(), 0, ',', '.') . "<br>";
echo "Durasi Kontrak: " . $karyawan2->getDurasiKontrakBulan() . " Bulan<br>";
echo "Bonus Lembur: Rp " . number_format($karyawan2->getBonusLembur(), 0, ',', '.') . "<br>";
echo "<b>Total Gaji Bersih: Rp " . number_format($karyawan2->hitungTotalGaji(), 0, ',', '.') . "</b><br>";

?>9
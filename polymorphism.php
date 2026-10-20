<?php

// class parent 
class profesi {
    public function bekerja() {
        return "melakukan pekerjaan umum...";
    }
}

// Class Child 1
class guru extends profesi {
    // Method Overriding (menimpa method parent)
    public function bekerja() {
        return "pergi ke kelas dan mengajar siswa SMK.";
    }
}

//Class Child 2
class programmer extends profesi {
    // method overriding
    public function bekerja() {
        return "Membuka VS code, mengetik kode php, dan meminum kopi.";
    }
}
$pakGuru = new Guru();
$anakRPL = new programmer();
echo $pakGuru->bekerja(); // Output: pergi ke kelas dan mengajar siswa smk.
echo "<br>";
echo $anakRPL->bekerja(); // Output: membuka VS code, mengetik kode php, dan meminum kopi.
?>
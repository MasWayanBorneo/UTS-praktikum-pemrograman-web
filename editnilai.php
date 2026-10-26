<?php
require_once __DIR__ . "/koneksi.php";

// halaman tujuan setelah edit (hanya yang diizinkan)
$kembali = 'viewdata.php';
if (isset($_POST['kembali']) && in_array($_POST['kembali'], ['viewdata.php', 'readnilai.php'])) {
    $kembali = $_POST['kembali'];
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['Nim'])) {
    header("Location: $kembali");
    exit;
}

$Nim = $_POST['Nim'];
$Nama_lengkap = trim($_POST['Nama_lengkap']);
$nilai_akhir = $_POST['nilai_akhir'];

if ($Nama_lengkap === '' || !is_numeric($nilai_akhir) || $nilai_akhir < 0 || $nilai_akhir > 100) {
    echo "<script>
            alert('Nama tidak boleh kosong dan nilai akhir harus 0 - 100');
            window.location.href = '$kembali';
          </script>";
    exit;
}

// hitung ulang nilai huruf & predikat dari nilai akhir yang baru
if ($nilai_akhir <= 34.50) {
    $nilai_huruf = 'E';
    $predikat = 'Tidak Lulus';
} elseif ($nilai_akhir <= 50.50) {
    $nilai_huruf = 'D';
    $predikat = 'Kurang Memuaskan';
} elseif ($nilai_akhir <= 60.50) {
    $nilai_huruf = 'C';
    $predikat = 'Cukup Memuaskan';
} elseif ($nilai_akhir <= 80.50) {
    $nilai_huruf = 'B';
    $predikat = 'Memuaskan';
} else {
    $nilai_huruf = 'A';
    $predikat = 'Sangat Memuaskan';
}

// ubah data berdasarkan NIM (prepared statement agar aman dari SQL injection)
$stmt = mysqli_prepare($conn, "UPDATE mahasiswa
                               SET Nama_lengkap = ?, nilai_akhir = ?, nilai_huruf = ?, predikat = ?, modified_at = NOW()
                               WHERE Nim = ?");
mysqli_stmt_bind_param($stmt, "sdsss", $Nama_lengkap, $nilai_akhir, $nilai_huruf, $predikat, $Nim);

if (mysqli_stmt_execute($stmt) && mysqli_stmt_affected_rows($stmt) > 0) {
    $pesan = "Data dengan NIM $Nim berhasil diubah";
} else {
    $pesan = "Data dengan NIM $Nim gagal diubah atau tidak ditemukan";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

echo "<script>
        alert(" . json_encode($pesan) . ");
        window.location.href = '$kembali';
      </script>";
?>

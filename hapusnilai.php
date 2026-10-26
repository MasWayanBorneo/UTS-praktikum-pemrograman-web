<?php
require_once __DIR__ . "/koneksi.php";

// halaman tujuan setelah hapus (hanya yang diizinkan)
$kembali = 'viewdata.php';
if (isset($_POST['kembali']) && in_array($_POST['kembali'], ['viewdata.php', 'readnilai.php'])) {
    $kembali = $_POST['kembali'];
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['Nim'])) {
    header("Location: $kembali");
    exit;
}

$Nim = $_POST['Nim'];

// hapus data berdasarkan NIM (prepared statement agar aman dari SQL injection)
$stmt = mysqli_prepare($conn, "DELETE FROM mahasiswa WHERE Nim = ?");
mysqli_stmt_bind_param($stmt, "s", $Nim);

if (mysqli_stmt_execute($stmt) && mysqli_stmt_affected_rows($stmt) > 0) {
    $pesan = "Data dengan NIM $Nim berhasil dihapus";
} else {
    $pesan = "Data dengan NIM $Nim gagal dihapus atau tidak ditemukan";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

echo "<script>
        alert(" . json_encode($pesan) . ");
        window.location.href = '$kembali';
      </script>";
?>

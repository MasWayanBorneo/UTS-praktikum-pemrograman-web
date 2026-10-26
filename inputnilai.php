<?php
require_once __DIR__ . "/koneksi.php";

$Nim = $_POST['Nim'];
$Nama_lengkap = $_POST['Nama_lengkap'];
$nilai_akhir = $_POST['nilai_akhir'];

if (0.00 <= $nilai_akhir && $nilai_akhir <= 34.50) {
    $nilai_huruf = 'E';
    $predikat = 'Tidak Lulus';
} elseif ($nilai_akhir > 34.50 && $nilai_akhir <= 50.50) {
    $nilai_huruf = 'D';
    $predikat = "Kurang Memuaskan";
} elseif ($nilai_akhir > 50.50 && $nilai_akhir <= 60.50) {
    $nilai_huruf = 'C';
    $predikat = 'Cukup Memuaskan';
} elseif ($nilai_akhir > 60.50 && $nilai_akhir <= 80.50) {
    $nilai_huruf = 'B';
    $predikat = 'Memuaskan';
} elseif ($nilai_akhir > 80.50 && $nilai_akhir <= 100.00) {
    $nilai_huruf = 'A';
    $predikat = 'Sangat Memuaskan';
}

// Upload foto profil (opsional), kalau tidak diisi kolom foto bernilai NULL
$foto = "NULL";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $target_dir = "img/profile/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $imageFileType = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $pesan_error = "";

    // Check point 1: file harus berupa gambar asli
    if ($_FILES['foto']['error'] != UPLOAD_ERR_OK || getimagesize($_FILES['foto']['tmp_name']) === false) {
        $pesan_error = "File yang diunggah bukan gambar.";
    // Check point 2: ukuran maksimal 1MB
    } elseif ($_FILES['foto']['size'] > 1000000) {
        $pesan_error = "Ukuran foto maksimal 1 MB.";
    // Check point 3: hanya format JPG, JPEG, PNG & GIF
    } elseif (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        $pesan_error = "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
    }

    if ($pesan_error != "") {
        echo "<script>
                alert('$pesan_error');
                window.history.back();
              </script>";
        exit;
    }

    // Nama file dibuat dari NIM + waktu agar unik dan tidak menimpa file lain
    $target_file = $target_dir . preg_replace('/[^A-Za-z0-9]/', '', $Nim) . "_" . time() . "." . $imageFileType;
    if (!move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        echo "<script>
                alert('Foto gagal diunggah.');
                window.history.back();
              </script>";
        exit;
    }
    $foto = "'$target_file'";
}

$sql = "INSERT INTO mahasiswa (Nim, Nama_lengkap, foto, nilai_akhir, nilai_huruf, predikat)
        VALUES ('$Nim', '$Nama_lengkap', $foto, $nilai_akhir, '$nilai_huruf', '$predikat')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('New record created successfully');
            window.location.href = 'formnilai.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// mysqli_close($conn);
header ('Location: viewdata.php');
?>
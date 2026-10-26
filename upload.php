<?php

// $namafile = $_FILES['photo']['name'];
// $tipefile = $_FILES['photo']['type'];
// $ukuranfile = $_FILES['photo']['size'];
//$temporaryfile = $_FILES['photo']['tmp_name'];
// $errfile = $_FILES['photo']['error'];

// echo "Nama File: " . $namafile . "<br>";
// echo "Tipe File: " . $tipefile . "<br>";
// echo "Ukuran File: " . $ukuranfile . "<br>";
//echo "Temporary File: " . $temporaryfile . "<br>";
// echo "Error: " . $errfile . "<br>";


// Menentukan direktori tujuan untuk menyimpan file yang diunggah
$target_dir = "img/";
// Menyimpan nama file yang diunggah ke dalam variabel $target_file
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
echo "Isi target file: " . $target_file . "<br>";
// inisialisasi
$uploadOk = 1;
// Mengkonversi ekstensi file menjadi huruf kecil untuk memudahkan pengecekan
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo "Isi image file type: " . $imageFileType . "<br>";
// Check point 1 (Autentikasi) 
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.<br>";
    $uploadOk = 0;
  }

// Check point 2 (Duplikasi)
// Memeriksa apakah nama file yang diunggah sudah ada di direktori tujuan/target
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check point 3 (Ukuran File)
// Memeriksa ukuran file yang diunggah, agar tidak melebihi batas yang ditentukan (misalnya 500KB)
if ($_FILES["photo"]["size"] > 1000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check point 4 (Format File)
// Memeriksa format file yang diunggah, hanya mengizinkan format tertentu (misalnya JPG, JPEG, PNG, GIF)

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Memeriksa apakah $uploadOK sudah true (1), jika 0 berarti ada error pada proses upload, sehingga file tidak diunggah
echo "Upload status: " . $uploadOk . "<br>";
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
    // Jika status sudah oke, lanjutkan unggah file ke direktori tujuan
} elseif (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    // Pindahkan fisik file dari temporary ke direktori tujuan    
    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
    // Aksi paralel, catat tabel ini di database
     // Koneksi ke database
    require_once __DIR__ . '/koneksi.php';

  // Query Statement
    $sql = "INSERT INTO photo (file_name) VALUES ('$target_file')";
        
// Cek apakah query berhasil dijalankan, jika ya tampilkan pesan sukses, jika tidak tampilkan pesan error
    if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data berhasil disimpan ke database!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
// Tutup koneksi
// mysqli_close($conn);
header("Location:readphoto.php");
} else {
    echo "Sorry, there was an error uploading your file.";
    
  }

 
}


?>
<?php
require_once __DIR__ . "/koneksi.php"; 

//membuat tombol untuk tambah photo
echo "<a href='form_upload.php'><button>Tambah Photo</button></a><br><br>";
$sql = "SELECT * from photo";    
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
    echo "<table border=1 cellpadding=5px";
    echo "<caption><strong>Daftar Foto</strong></caption>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Nama File</th>";
    echo "<th>Tanggal Unggah</th>";
    echo "<th>Pratinjau</th>";
    echo "</tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" .$row['id_photo']. "</td>";
    echo "<td>" .$row['file_name']. "</td>";
    echo "<td>" .$row['uploaded_date']. "</td>";
    echo "<td><img src=" .$row['file_name']. " width='100px' height='auto'></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
    echo "0 results - Data Not Found!";
}

mysqli_close($conn);

?>
<?php
require_once __DIR__ . "/koneksi.php";

//membuat tombol untuk tambah data
echo "<a href='formnilai.php'><button>Tambah Data</button></a><br><br>";
$sql = "SELECT * from mahasiswa order by nilai_akhir asc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
    echo "<table border=1 cellpadding=5px>";
    echo "<caption><strong>Data Nilai Mahasiswa</strong></caption>";
    echo "<tr>";
    echo "<th>NIM</th>";
    echo "<th>Nama Lengkap</th>";
    echo "<th>Nilai Akhir</th>";
    echo "<th>Nilai Huruf</th>";
    echo "<th>Predikat</th>";
    echo "<th>Tanggal Dibuat</th>";
    echo "<th>Tanggal Diubah</th>";
    echo "<th>Aksi</th>";
    echo "</tr>";
  while($row = mysqli_fetch_assoc($result)) {
    $nim = htmlspecialchars($row['Nim']);
    $nama = htmlspecialchars($row['Nama_lengkap']);
    $pesan = htmlspecialchars(json_encode("Yakin ingin menghapus data {$row['Nama_lengkap']} (NIM {$row['Nim']})?"));

    echo "<tr>";
    echo "<td>" .$nim. "</td>";
    echo "<td>" .$nama. "</td>";
    echo "<td>" .$row['nilai_akhir']. "</td>";
    echo "<td>" .$row['nilai_huruf']. "</td>";
    echo "<td>" .$row['predikat']. "</td>";
    echo "<td>" .$row['entry_date']. "</td>";
    echo "<td>" .$row['modified_at']. "</td>";
    //tombol hapus mengirim NIM baris ini ke hapusnilai.php
    echo "<td><a href='#'><button>Edit Data</button></a> |
    <form action='hapusnilai.php' method='post' style='display:inline'
          onsubmit=\"return confirm($pesan)\">
      <input type='hidden' name='Nim' value='$nim'>
      <input type='hidden' name='kembali' value='readnilai.php'>
      <button type='submit'>Hapus Data</button>
    </form></td>";

    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results - Data Not Found!";
}

mysqli_close($conn);

?>

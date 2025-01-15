<title>Data Siswa</title>
<h2>Data Siswa</h2>
<p>
    <a href="tambah.php">Tambah Siswa</a>
</p>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
// memanggil file koneksi
include "config.php";

// menyiapkan query
$query = "SELECT * FROM siswa";

// menjalankan dan menyimpan hasil query
$result = mysqli_query($koneksi,$query);

// melakukan looping untuk menampilkan data
$no=1;
while($data = mysqli_fetch_assoc($result)){
?>
        <tr>
            <td><?=$no?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['kelas']?></td>
            <td><?=$data['jurusan']?></td>
            <td>
                <a href="edit.php?id=<?=$data['id']?>"> Edit | </a>
                <a href="hapus.php?id=<?=$data['id']?>"> Hapus </a>
            </td>
        </tr>
<?php
$no++;
}
?>
    </tbody>
</table>

<style>
    table{
        border-collapse: collapse;
    }
    th, td{
        border: 1px solid black;
        padding:10px;
        text-align:center;
    }
    th{
        background:#ccc;
    }
    a{
        font-weight:bold;
        text-decoration:none;
    }
</style>

<?php
// memanggil file koneksi
// include "config.php";

// menyiapkan query
// $query = "SELECT * FROM siswa";

// menjalankan dan menyimpan hasil query
// $result = mysqli_query($koneksi,$query);

// melakukan looping untuk menampilkan data
// while($data = mysqli_fetch_assoc($result)){
//     echo "Nama : ".$data['nama']."<br>";
//     echo "Kelas : ".$data['kelas']."<br>";
//     echo "Jurusan : ".$data['jurusan']."<br>";
// }
?>
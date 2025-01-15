<?php
include "config.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    // var_dump($_POST);
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO siswa SET ";
    $query .= "nama  = '$nama', ";
    $query .= "kelas  = '$kelas', ";
    $query .= "jurusan  = '$jurusan'";

    $result = mysqli_query($koneksi,$query);

    if(!$result){
        echo "Gagal menambah data siswa";
    }else{
        echo "Berhasil menambah data siswa";
        echo "<meta http-equiv='refresh' content='1, index.php'>";
    }


}else{
    ?>
<title>Tambah Siswa</title>
<form action="" method="post">
    <fieldset style="width:20%">
        <legend>Tambah Siswa</legend>
        <p>Nama Siswa</p>
        <input type="text" name="nama" id="nama" required>
        
        <p>Kelas</p>
        <select name="kelas" id="kelas" required    >
            <option value=""> - Pilih kelas - </option>
            <option value="10"> 10 </option>
            <option value="11"> 11 </option>
            <option value="12"> 12 </option>
        </select>

        <p>Jurusan</p>
        <input type="radio" name="jurusan" id="jurusan" value="PPLG" required> PPLG
        <input type="radio" name="jurusan" id="jurusan" value="AKL" required> AKL

        <p>
        <input type="reset" value="Reset">
        <input type="submit" value="Simpan">
        </p>
    </fieldset>
</form>
<?php
}
?>



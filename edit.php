<?php
include "config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = "UPDATE siswa SET ";
    $query .= "nama = '$nama', ";
    $query .= "kelas = '$kelas', ";
    $query .= "jurusan = '$jurusan' ";
    $query .= "WHERE id = '$id'";

    $result = mysqli_query($koneksi,$query);
    if(mysqli_affected_rows($koneksi)>0){
        echo "Berhasil mengedit data siswa";
        echo "<meta http-equiv='refresh' content='1, url=index.php'>";
    }
}else{

// mengambil data
$query = "SELECT * FROM siswa WHERE id = '$id'";
$result = mysqli_query($koneksi,$query);
$data = mysqli_fetch_assoc($result);
?>

<form action="" method="post">
    <fieldset style="width:20%">
        <legend>Edit Siswa</legend>
        <input type="hidden" name="id" value="<?=$data['id']?>">
        <p>Nama Siswa</p>
        <input type="text" name="nama" id="nama" value="<?=$data['nama']?>" required>
        
        <p>Kelas</p>
        <select name="kelas" id="kelas" required    >
            <option value=""> - Pilih kelas - </option>
            <option value="10" <?php if($data['kelas']==10) echo "selected" ?> > 10 </option>
            <option value="11" <?php if($data['kelas']==11) echo "selected" ?> > 11 </option>
            <option value="12" <?php if($data['kelas']==12) echo "selected" ?> > 12 </option>
        </select>

        <p>Jurusan</p>
        <?php
        if($data['jurusan']=="PPLG"){
            $pplg = " checked";
            $akl = "";
        }else{
            $pplg = "";
            $akl = " checked";
        }
        ?>
        <input type="radio" name="jurusan" id="jurusan" value="PPLG" <?=$pplg?> required> PPLG
        <input type="radio" name="jurusan" id="jurusan" value="AKL" <?=$akl?> required> AKL

        <p>
        <input type="reset" value="Reset">
        <input type="submit" value="Simpan">
        </p>
    </fieldset>
</form>

<?php
}
?>
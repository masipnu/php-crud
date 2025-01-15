<?php
include "config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "DELETE FROM siswa WHERE id = '$id'";
    $result = mysqli_query($koneksi,$query);
    if(mysqli_affected_rows($koneksi)>0){
        echo "Berhasil menghapus siswa";
        echo "<meta http-equiv='refresh' content='1, url=index.php'>";
    }else{
        echo "Gagal menghapus siswa";
        echo "<meta http-equiv='refresh' content='1, url=hapus.php'>";
    }
}else{
    ?>

<fieldset style="width:20%">
    <legend>Hapus Siswa</legend>
    <form action="">
        <input type="number" name="id" id="id" required>
        <input type="submit" value="Hapus">
    </form>
</fieldset>

<?php
}
?>
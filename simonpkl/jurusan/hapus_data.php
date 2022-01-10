<?php
include '../setting/koneksi.php';
if(isset($_GET['id'])){
    //lakukan proses tambah data ke tabel jurusan
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "delete from tb_jurusan where id_jurusan = '$id'");
    if($exe){
        echo "<script>alert('Data jurusan berhasil di hapus!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada hapus data jurusan: ".mysqli_error($konek);
    }
}
?>
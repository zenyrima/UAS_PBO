<?php
include '../setting/koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];//3
    $exe = mysqli_query($konek, "delete from tb_kelas where id_kelas = '$id'");
    if($exe){
        echo "<script>alert('Data kelas berhasil di hapus!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada hapus data kelas: ".mysqli_error($konek);
    }
}

?>
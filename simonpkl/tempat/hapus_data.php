<?php
include '../setting/koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];//3
    $exe = mysqli_query($konek, "delete from tb_tempat_pkl where id_tempat = '$id'");
    if($exe){
        echo "<script>alert('Data tempat pkl berhasil di hapus!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada hapus data tempat pkl: ".mysqli_error($konek);
    }
}

?>
<?php
include '../setting/koneksi.php';
if(isset($_GET['nis'])){
    $nis = $_GET['nis'];
    $exe = mysqli_query($konek, "DELETE from tb_siswa where nis = '$nis'");
    if($exe){
        mysqli_query($konek, "DELETE FROM tb_user WHERE username = '$nis'");
        echo "<script>alert('Data siswa berhasil di hapus!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada hapus data kelas: ".mysqli_error($konek);
    }
}

?>

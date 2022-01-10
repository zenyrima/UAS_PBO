<?php
include '../setting/koneksi.php';
if(isset($_GET['nip'])){
    $nip = $_GET['nip'];
    $exe = mysqli_query($konek, "DELETE from tb_guru where nip = '$nip'");
    if($exe){
        mysqli_query($konek, "DELETE FROM tb_user WHERE username = '$nip'");
        echo "<script>alert('Data guru berhasil di hapus!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada hapus data guru: ".mysqli_error($konek);
    }
}

?>

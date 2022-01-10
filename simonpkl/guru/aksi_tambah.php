<?php
if(isset($_POST['simpan'])){
    include '../setting/koneksi.php';
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $password = md5(date('dmY', strtotime($tanggal)));
    $exe = mysqli_query($konek, "SELECT id_user from tb_user order by id_user desc");
    if(mysqli_num_rows($exe)>0){
        $exe = mysqli_fetch_array($exe);
        $idUser = $exe['id_user'] + 1; 
    }else{
        $idUser = 1; 
    }
    //memasukan data ke tabel siswa
    $sql= "INSERT into tb_user VALUES ('$idUser', '$nip', '$password', 'guru')";
    if(mysqli_query($konek, $sql)){//jika data berhasil masuk ke table user
        //masukan data tabel siswa
        $exe = mysqli_query($konek, "INSERT INTO tb_guru VALUES('', '$nip', '$nama',
        '$tempat', '$tanggal', '$alamat', '$telp', '$idUser')");
        echo "<script>alert('Data guru berhasil di tambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada simpan guru: ".mysqli_error($konek);
    }
}
?>
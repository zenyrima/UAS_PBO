<?php
if(isset($_POST['update'])){
    include '../setting/koneksi.php';
    $idsiswa = $_POST['id_siswa'];
    $iduser = $_POST['id_user'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $password = md5(date('dmy', strtotime($tanggal))); //membuat password dari tanggal lahir
    $sql = "UPDATE tb_user SET username='$nis', password='$password' WHERE id_user='$iduser'";
    if (mysqli_query($konek, $sql)) {//jika data berhasil masuk ke tabel user
        //masukan data ke tabel siswa
        $exe = mysqli_query($konek, "UPDATE tb_siswa SET nis='$nis', nama_siswa='$nama',
        id_kelas='$kelas', tempat_lahir='$tempat', tanggal_lahir='$tanggal',
        alamat='$alamat', no_telp='$telp' WHERE id_siswa='$idsiswa'");
        echo "<script>alert('Data siswa berhasil di perbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada data siswa kelas: ".mysqli_error($konek);
    }
}
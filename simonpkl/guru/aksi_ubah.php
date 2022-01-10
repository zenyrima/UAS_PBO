<?php
if(isset($_POST['update'])){
    include '../setting/koneksi.php';
    $idguru = $_POST['id_guru'];
    $iduser = $_POST['id_user'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $password = md5(date('dmy', strtotime($tanggal))); //membuat password dari tanggal lahir
    $sql = "UPDATE tb_user SET username='$nip', password='$password' WHERE id_user='$iduser'";
    if (mysqli_query($konek, $sql)) {//jika data berhasil masuk ke tabel user
        //masukan data ke tabel siswa
        $exe = mysqli_query($konek, "UPDATE tb_guru SET nip='$nip', nama_lengkap='$nama',
        tempat_lahir='$tempat', tanggal_lahir='$tanggal',
        alamat='$alamat', no_telp='$telp' WHERE id_guru='$idguru'");
        echo "<script>alert('Data guru berhasil di perbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada data guru: ".mysqli_error($konek);
    }
}
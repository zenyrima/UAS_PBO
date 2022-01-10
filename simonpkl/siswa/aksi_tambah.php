<?php
if(isset($_POST['simpan'])){
    include '../setting/koneksi.php';
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $password = md5(date('dmy', strtotime($tanggal))); //membuat password dari tanggal lahir
    $exe = mysqli_query($konek, "SELECT id_user FROM tb_user ORDER BY id_user desc");
    if (mysqli_num_rows($exe) > 0) {//mengecek data id_user di tabel user
        $exe = mysqli_fetch_array($exe);
        $idUser = $exe['id_user'] + 1; //ambil id_user terakhir, lalu tambahkan 1
    }else{
        $idUser = 1; //bila di tabel user tidak ada datanya, maka defaultnya 1
    }
    //memasukan data ke tabel siswa
    $sql= "INSERT into tb_user VALUES ('$idUser', '$nis', '$password', 'siswa')";
    if(mysqli_query($konek, $sql)){//jika data berhasil masuk ke table user
        //masukan data tabel siswa
        $exe = mysqli_query($konek, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama', '$kelas'
        , '$tempat', '$tanggal', '$alamat', '$telp', '$idUser')");
        echo "<script>alert('Data siswa berhasil di tambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada simpan kelas: ".mysqli_error($konek);
    }
}
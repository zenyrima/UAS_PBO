<?php
if(isset($_POST['simpan'])){
    //lakukan proses tambah data ke tabel jurusan
    include '../setting/koneksi.php';
    $jurusan = $_POST['jurusan'];
    $exe = mysqli_query($konek, "insert into tb_jurusan values('0', '$jurusan')");
    if($exe){
        echo "<script>alert('Data jurusan berhasil di tambahkan!');</script>";
        echo "<meta http-equive='refresh' content='0', url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada simpan jurusan: ".mysqli_error($konek);
    }
}else{
    include"../template/header.php";
?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Tambah Data Jurusan</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="nama" class="com-md-2">Nama Jurusan</label>
                        <div class="col-md-10">
                            <input type="text" name="jurusan" class="form-control">
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>                                
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php    
}
?>

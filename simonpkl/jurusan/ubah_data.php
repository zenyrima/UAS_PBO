<?php
include '../setting/koneksi.php';
if(isset($_POST['update'])){
    //lakukan proses tambah data ke tabel jurusan
    $id = $_POST['id'];
    $jurusan = $_POST['jurusan'];
    $exe = mysqli_query($konek, "UPDATE tb_jurusan set nama_jurusan = '$jurusan' where id_jurusan = '$id'");
    if($exe){
        echo "<script>alert('Data jurusan berhasil diperbaharui!');</script>";
        echo "<meta http-equive='refresh' content='0,url=lihat_data.php'>";
    }else{
        echo "Terjadi keslahan pada simpan jurusan: ".mysqli_error($konek);
    }
}else{
    include "../template/header.php";
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "select * from tb_jurusan where id_jurusan = '$id'");
    $row = mysqli_fetch_array($exe);
?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Perbaharui Data Jurusan</div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row[0];?>">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Jurusan</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[1];?>" name="jurusan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <button type="submit" name="update" class="btn btn-success">Ubah</button>
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
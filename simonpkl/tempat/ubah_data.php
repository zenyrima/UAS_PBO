<?php
include '../setting/koneksi.php';
if(isset($_POST['UPDATE'])){
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telp = $_POST['telp'];
    $jurusan = $_POST['jurusan'];
    $exe = mysqli_query($konek, "UPDATE tb_tempat_pkl set nama_tempat='$nama', alamat='$alamat',
    kota='$kota', no_telp='$telp', id_jurusan='$jurusan' where id_tempat='$id'");
    if($exe){
        echo "<script>alert('Data tempat pkl berhasil di tambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada update data tempat pkl: ".mysqli_error($konek);
    }
}else{
    include "../template/header.php";
    $id  = $_GET['id'];
    $exe = mysqli_query($konek, "select * from tb_tempat_pkl where id_tempat = '$id'");
    $row = mysqli_fetch_array($exe);
?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Perbaharui Data Tempat PKL</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Tempat</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row['nama_tempat'];?>" required
                            name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row['alamat'];?>" required
                            name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Kota</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row['kota'];?>" required
                            name="kota" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">No Telepon</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row['no_telp'];?>" required
                            name="telp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Jurusan</label>
                        <div class="col-md-10">
                            <select class="form-control" name="jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <?php
                                include '../setting/koneksi.php';
                                //mengambil data dari jurusan kemudian dimasukan ke dalam combobox
                                $exe = mysqli_query($konek, "select * from tb_jurusan");
                                while($data = mysqli_fetch_array($exe)){
                                   if ($data['id_jurusan'] == $row['id_jurusan']){
                                       $select = "selected";
                                   }else{
                                       $select = "";
                                   }
                                   echo "<option value='$data[0]' $select>$data[1]</option>"; 
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row"></div>
                            <div class="col-md-2">
                                <button type="submit" name="UPDATE" class="btn btn-success">Ubah</button>                                
                                </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php    
}
?>

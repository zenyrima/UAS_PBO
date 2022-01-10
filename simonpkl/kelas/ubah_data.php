<?php
include '../setting/koneksi.php';
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $exe = mysqli_query($konek, "update tb_kelas set id_jurusan ='$jurusan',
    nama_kelas='$kelas' where id_kelas='$id'");
    if($exe){
        echo "<script>alert('Data Kelas berhasil diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0,url=lihat_data.php'>";
    }else{
        echo "Terjadi keslahan pada simpan jurusan ".mysqli_error($konek);
    }
}else{
    include '../template/header.php';
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "select * from tb_kelas where id_kelas = '$id'");
    $row = mysqli_fetch_array($exe);
?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui Data Kelas</div>
                <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="jurusan" class="col-md-2">Nama Kelas</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row['nama_kelas'];?>"
                            name="kelas" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-md-2">Nama Jurusan</label>
                        <div class="col-md-10">
                            <select name="jurusan" required class="form-control">
                                <option value="">Pilih Jurusan</option>
                                <?php
                                $exe = mysqli_query($konek, "select * from tb_jurusan");
                                    while($data = mysqli_fetch_row($exe)){
                                     if($row[2] == $data[0]){
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
</div>
<?php
}
?>
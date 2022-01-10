<?php
if(isset($_POST['simpan'])){
    //lakukan proses tambah data ke tabel kelas
    include '../setting/koneksi.php';
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $exe = mysqli_query($konek, "insert into tb_kelas values('', '$kelas', '$jurusan')");
    if($exe){
        echo "<script>alert('Data kelas berhasil di tambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0', url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada simpan kelas: ".mysqli_error($konek);
    }
}else{
    include"../template/header.php";
?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Tambah Data Kelas</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="nama" class="com-md-2">Nama Kelas</label>
                        <div class="col-md-10">
                            <input type="text" name="kelas" class="form-control">
                        </div>
                        </div>
                        <div class="form-gorup row">
                        <label for="nama" class="col-md-2">Nama Jurusan</label>
                        <div class="col-md-10">
                            <select class="form-control" name="jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <?php
                                include '../setting/koneksi.php';
                                //mengambil data dari jurusan kemudian dimasukan ke dalam combobox
                                $exe = mysqli_query($konek, "select * from tb_jurusan");
                                while($data = mysqli_fetch_array($exe)){
                                    echo "<option value='$data[0]'>$data[0] $data[1]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row"></div>
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

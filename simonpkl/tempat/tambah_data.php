<?php
if(isset($_POST['simpan'])){
    //lakukan proses tambah data ke tabel kelas
    include '../setting/koneksi.php';
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telp = $_POST['telp'];
    $jurusan = $_POST['jurusan'];
    $exe = mysqli_query($konek, "insert into tb_tempat_pkl values('', '$nama', '$alamat'
    , '$kota', '$telp', '$jurusan')");
    if($exe){
        echo "<script>alert('Data tempat pkl berhasil di tambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=lihat_data.php'>";
    }else{
        echo "Terjadi kesalahan pada simpan kelas: ".mysqli_error($konek);
    }
}else{
    include"../template/header.php";
?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Tambah Data Tempat PKL</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Tempat</label>
                        <div class="col-md-10">
                            <input type="text" requerid name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" required name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Kota</label>
                        <div class="col-md-10">
                            <input type="text" required name="kota" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">No Telepon</label>
                        <div class="col-md-10">
                            <input type="text" required name="telp" class="form-control">
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
                                    echo "<option value='$data[0]'>$data[0] $data[1]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row"></div>
                            <div class="col-md-2">
                                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>                                
                                </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php    
}
?>

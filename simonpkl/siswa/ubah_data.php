<?php
    include '../setting/koneksi.php' ;
    include "../template/header.php";
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "SELECT * FROM tb_siswa WHERE id_siswa='$id'");
    $row = mysqli_fetch_array($exe);

    ?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Perbaharui Data Siswa</div>
            <div class="card-body">
            <!--karena source code proses simpan lumayan banyak, maka proses
            simpan dilakukan di halaman terpisah dari formnya yaitu di aksi_tambah.php-->
                <form action="aksi_ubah.php" method="post">
                    <!--ada 2 input hidden yang nantinya akan jadi acuan untuk
                    mengubah data siswa dan data user -->
                    <input type="hidden" value="<?php echo $row[0];?>" name="id_siswa">
                    <input type="hidden" value="<?php echo $row[8];?>" name="id_user">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">NIS Siswa</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[1];?>" required
                            name="nis" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Siswa</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[2];?>" required 
                            name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Kelas</label>
                        <div class="col-md-10">
                           <select class="form-control" name="kelas" required>
                           <option value="">Pilih Kelas</option>
                           <?php
                           include '../setting/koneksi.php';
                           //mengambil data dari jurusan kemudian dimasukan ke dalam combobox
                           $exe = mysqli_query($konek, "select *from tb_kelas");
                           while($data = mysqli_fetch_array($exe)){
                               if($row[3] == $data[0]){
                                 $select = "selected";
                               }else{
                                   $select = "";
                               }
                               echo "<option value='$data[0]'>$data[1]</option>";
                           }
                           ?>
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Tempat, Tanggal Lahir</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $row[4];?>" required 
                            name="tempat" class="form-control">
                        </div>
                        <div class="col-md-4">
                           <input type="date" value="<?php echo $row[5];?>" required 
                           name="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[6];?>" required 
                            name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">No Telepon</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[7];?>" required 
                            name="telp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                        <button type="submit" name="update" class="btn btn-success">Ubah</button>
                        </div>
                    </div>          
                    </form>
                </div>
            </div>
        </div>
    </div>
 
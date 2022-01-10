<?php
    include "../setting/koneksi.php" ;
    include "../template/header.php";
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "SELECT * FROM tb_guru WHERE id_guru='$id'");
    $row = mysqli_fetch_array($exe);

    ?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Perbaharui Data Guru</div>
            <div class="card-body">
                <form action="aksi_ubah.php" method="post">
                    <input type="hidden" value="<?php echo $row[0];?>" name="id_guru">
                    <input type="hidden" value="<?php echo $row[7];?>" name="id_user">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">NIP Guru</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[1];?>" required
                            name="nip" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Guru</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[2];?>" required 
                            name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Tempat, Tanggal Lahir</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $row[3];?>" required 
                            name="tempat" class="form-control">
                        </div>
                        <div class="col-md-4">
                           <input type="date" value="<?php echo $row[4];?>" required 
                           name="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[5];?>" required 
                            name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">No Telepon</label>
                        <div class="col-md-10">
                            <input type="text" value="<?php echo $row[6];?>" required 
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
 
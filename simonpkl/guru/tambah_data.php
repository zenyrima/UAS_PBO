<?php
    include "../template/header.php";
?>
<div class="container-fluid">
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">Tambah Data Guru</div>
            <div class="card-body">
            <!--karena source code proses simpan lumayan banyak, maka proses
            simpan dilakukan di halaman terpisah dari formnya yaitu di aksi_tambah.php-->
                <form action="aksi_tambah.php" method="post">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">NIP</label>
                        <div class="col-md-10">
                            <input type="text" required name="nip" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Nama Lengkap</label>
                        <div class="col-md-10">
                            <input type="text" required name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Tempat, Tanggal Lahir</label>
                        <div class="col-md-6">
                            <input type="text" required name="tempat" class="form-control">
                        </div>
                        <div class="col-md-4">
                           <input type="date" required name="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" required name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-2">No Telepon</label>
                        <div class="col-md-10">
                            <input type="text" required name="telp" class="form-control">
                        </div>
                    </div>
                                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>                                
                                </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php    
?>

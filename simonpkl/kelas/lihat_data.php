<?php
    include "../template/header.php";
?>

<div class="container-fluid mt-3">
<div class="col-md-12">
    <h2>Data Kelas di SMK Negeri 4 Banjarmasin</h2>
    <a href="tambah_data.php" class="btn btn-success">Tambah Data</a><br>
    <table class="table table-stripped table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Nama Jurusan</th>
                <th>Jumlah Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                include '../setting/koneksi.php';
                $exe = mysqli_query($konek, "SELECT id_kelas, nama_kelas, nama_jurusan from tb_kelas inner
                join tb_jurusan on tb_kelas.id_jurusan = tb_jurusan.id_jurusan");
                while($data = mysqli_fetch_array($exe)){
                    echo "<tr>
                        <td>$no</td>
                        <td>$data[nama_kelas]</td>
                        <td>$data[nama_jurusan]</td>
                        <td>0</td>
                        <td>0</td>
                        <td>
                            <div class='btn btn-group'>
                            <a href='ubah_data.php?id=$data[0]' class='btn btn-warning'>Edit</a>
                            <a href='hapus_data.php?id=$data[0]' class='btn btn-danger' onclick='return confirm(\"Ingin hapus data?\");'>Hapus</a>
                            </div>
                        </td><tr>";
                        $no++;
                }
            ?>
        </tbody>
    </table>
</div>
</div>
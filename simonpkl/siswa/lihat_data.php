<?php
    include "../template/header.php";
?>

<div class="container-fluid mt-3">
<div class="col-md-12">
    <h2>Data Siswa SMK Negeri 4 Banjarmasin</h2>
    <a href="tambah_data.php" class="btn btn-success">Tambah Data</a><br>
    <table class="table table-sm table-bordered table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Nama Kelas</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                include '../setting/koneksi.php';
                //query menggabungkan tabel siswa dengan tabel kelas
                $exe = mysqli_query($konek, "SELECT id_siswa, nis, nama_siswa,
                nama_kelas, tempat_lahir, tanggal_lahir, alamat, no_telp from 
                tb_siswa inner join tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas");
                while($data = mysqli_fetch_array($exe)){
                    echo "<tr>
                        <td>$no</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                        <td>$data[3]</td>
                        <td>$data[4], ".date('d F Y', strtotime($data[5]))."</td>
                        <td>$data[6]</td>
                        <td>$data[7]</td>
                        <td>
                            <div class='btn btn-group'>
                            <a href='ubah_data.php?id=$data[0]' class='btn btn-warning'>Edit</a>
                            <a href='hapus_data.php?nis=$data[1]' class='btn btn-danger' onclick='return
                            confirm(\"Ingin hapus data?\");'>Hapus</a>
                            </div>
                        </td><tr>";
                        $no++;
                }
            ?>
        </tbody>
    </table>
</div>
</div>
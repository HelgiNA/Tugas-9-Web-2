<?php

    session_start();
    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    $query = "SELECT
                n.id_nilai,
                m.nim,
                m.nama AS nama_mhs,
                mk.kodeMatkul,
                mk.namaMatkul,
                d.nidn,
                d.nama AS nama_dosen,
                n.nilai,
                n.nilaiHuruf
            FROM
                tbl_nilai n
                JOIN tbl_mahasiswa m ON n.nim = m.nim
                JOIN tbl_matkul mk ON n.kodeMatkul = mk.kodeMatkul
                JOIN tbl_dosen d ON n.nidn = d.nidn
            ORDER BY
                m.nama DESC";

    $result = mysqli_query($koneksi, $query);

?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Nilai</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Nilai</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">
                                        <i class="fas fa-table mr-1"></i>
                                        Data Nilai
                                    </h3>
                                    <?php if ($_SESSION['role'] == 'Dosen') {?>
                                    <a href="<?php echo BASE_URL . 'data_master/nilai/create.php' ?>"
                                        class="btn btn-primary">Tambah Data</a>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Nomor Induk Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kode Dosen</th>
                                            <th>Nama Dosen</th>
                                            <th>Nilai</th>
                                            <th>Nilai Huruf</th>
                                            <?php if ($_SESSION['role'] == 'Dosen') {?>
                                            <th>Aksi</th>
                                            <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nim']; ?></td>
                                            <td><?php echo $row['nama_mhs']; ?></td>
                                            <td><?php echo $row['kodeMatkul']; ?></td>
                                            <td><?php echo $row['namaMatkul']; ?></td>
                                            <td><?php echo $row['nidn']; ?></td>
                                            <td><?php echo $row['nama_dosen']; ?></td>
                                            <td><?php echo $row['nilai']; ?></td>
                                            <td><?php echo $row['nilaiHuruf']; ?></td>
                                            <?php if ($_SESSION['role'] == 'Dosen') {?>
                                            <td>
                                                <a href="<?php echo BASE_URL . 'data_master/nilai/edit.php?id_nilai=' . $row['id_nilai'] ?>"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="<?php echo BASE_URL . 'data_master/nilai/destroy.php?id_nilai=' . $row['id_nilai'] ?>"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                            <?php }?>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

<?php
include '../../components/footer.php';
?>
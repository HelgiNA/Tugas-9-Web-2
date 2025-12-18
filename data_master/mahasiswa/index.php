<?php
    include '../../data_master/isRole.php';
    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    $query = "SELECT
                tbl_mahasiswa.nim,
                tbl_mahasiswa.nama,
                tbl_mahasiswa.prodi,
                tbl_mahasiswa.angkatan,
                tbl_mahasiswa.email
            FROM
                tbl_mahasiswa
            ORDER BY
                tbl_mahasiswa.nim DESC";

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
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
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
                                        Data Mahasiswa
                                    </h3>
                                    <a href="<?php echo BASE_URL . 'data_master/mahasiswa/create.php' ?>"
                                        class="btn btn-primary">Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Nomor Induk Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Program Studi</th>
                                            <th>Angkatan</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
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
                                            <td class="font-weight-bold"><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['prodi']; ?></td>
                                            <td><?php echo $row['angkatan']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL . 'data_master/mahasiswa/edit.php?nim=' . $row['nim']; ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="<?php echo BASE_URL . 'data_master/mahasiswa/destroy.php?nim=' . $row['nim']; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                            </td>
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
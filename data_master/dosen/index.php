<?php
    session_start();
    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    $query = "SELECT
                nidn,
                nama,
                prodi,
                email
            FROM
                tbl_dosen
            ORDER BY
                nidn ASC";

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
                    <h3 class="mb-0">Data Dosen</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
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
                                        Data Dosen
                                    </h3>
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Dosen') {?>
                                    <a href="<?php echo BASE_URL . 'data_master/dosen/create.php' ?>"
                                        class="btn btn-primary">Tambah Data</a>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Program Studi</th>
                                            <th>Email</th>
                                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Dosen') {?>
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
                                            <td><?php echo $row['nidn']; ?></td>
                                            <td class="font-weight-bold"><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['prodi']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Dosen') {?>
                                            <td>
                                                <a href="<?php echo BASE_URL . 'data_master/dosen/edit.php?nidn=' . $row['nidn']; ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="<?php echo BASE_URL . 'data_master/dosen/destroy.php?nidn=' . $row['nidn']; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
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
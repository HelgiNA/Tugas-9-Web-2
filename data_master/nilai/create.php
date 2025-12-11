<?php
    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    $queryDosen = "SELECT
                tbl_dosen.nidn,
                tbl_dosen.nama
            FROM
                tbl_dosen";

    $resultDosen = mysqli_query($koneksi, $queryDosen);

    $queryMahasiswa = "SELECT
                tbl_mahasiswa.nim,
                tbl_mahasiswa.nama
            FROM
                tbl_mahasiswa";

    $resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

    $queryMataKuliah = "SELECT
                tbl_matkul.kodeMatkul,
                tbl_matkul.namaMatkul
            FROM
                tbl_matkul";

    $resultMataKuliah = mysqli_query($koneksi, $queryMataKuliah);
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
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?php echo BASE_URL . 'data_master/nilai/index.php' ?>">Data Nilai</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Nilai</li>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                <i class="fas fa-table mr-1"></i>
                                Tambah Data Nilai
                            </h3>
                            <a href="<?php echo BASE_URL . 'data_master/nilai/index.php' ?>"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo BASE_URL . 'data_master/nilai/store.php' ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nim">Nomor Induk Mahasiswa</label>
                                <select class="form-control" id="nim" name="nim">
                                    <option selected disabled>Select Nomor Induk Mahasiswa</option>
                                    <?php foreach ($resultMahasiswa as $row) {?>
                                    <option value="<?php echo $row['nim']; ?>"><?php echo $row['nim']; ?> |
                                        <?php echo $row['nama']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kodeMatkul">Kode Mata Kuliah</label>
                                <select class="form-control" id="kodeMatkul" name="kodeMatkul">
                                    <option selected disabled>Select Kode Mata Kuliah</option>
                                    <?php foreach ($resultMataKuliah as $row) {?>
                                    <option value="<?php echo $row['kodeMatkul']; ?>"><?php echo $row['kodeMatkul']; ?>
                                        |
                                        <?php echo $row['namaMatkul']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nidn">Nomor Induk Dosen</label>
                                <select class="form-control" id="nidn" name="nidn">
                                    <option selected disabled>Select Nomor Induk Dosen</option>
                                    <?php foreach ($resultDosen as $row) {?>
                                    <option value="<?php echo $row['nidn']; ?>"><?php echo $row['nidn']; ?> |
                                        <?php echo $row['nama']; ?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="text" class="form-control" id="nilai" name="nilai"
                                    placeholder="Enter Nilai">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
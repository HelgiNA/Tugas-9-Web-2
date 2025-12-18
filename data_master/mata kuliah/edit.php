<?php
    include '../../data_master/isRole.php';

    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    if (! isset($_GET['kodeMatkul'])) {
        header("Location: " . BASE_URL . "data_master/mata kuliah/index.php");
    }

    $queryDosen = "SELECT
                tbl_dosen.nidn,
                tbl_dosen.nama
            FROM
                tbl_dosen";

    $dataDosen = mysqli_query($koneksi, $queryDosen);

    $kodeMatkul = $_GET['kodeMatkul'];

    $query  = "SELECT * FROM tbl_matkul WHERE kodeMatkul = '$kodeMatkul'";
    $result = mysqli_query($koneksi, $query);
    $row    = mysqli_fetch_assoc($result);

    if ($row == null) {
        header("Location: " . BASE_URL . "data_master/mata kuliah/index.php");
    }
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
                    <h3 class="mb-0">Edit Mata Kuliah</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?php echo BASE_URL . 'data_master/mahasiswa/index.php' ?>">Data Mata Kuliah</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Mata Kuliah</li>
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
                                Edit Data Mata Kuliah
                            </h3>
                            <a href="<?php echo BASE_URL . 'data_master/mata kuliah/index.php' ?>"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo BASE_URL . 'data_master/mata kuliah/update.php' ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kodeMatkul">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" id="kodeMatkul" name="kodeMatkul"
                                    placeholder="Enter Kode Mata Kuliah" value="<?php echo $row['kodeMatkul'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="namaMatkul">Nama Mata Kuliah</label>
                                <input type="text" class="form-control" id="namaMatkul" name="namaMatkul"
                                    placeholder="Enter Nama Mata Kuliah" value="<?php echo $row['namaMatkul'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="sks">SKS</label>
                                <select class="form-control" id="sks" name="sks">
                                    <option selected disabled>Select SKS</option>
                                    <option value="1"                                                      <?php echo $row['sks'] == '1' ? 'selected' : '' ?>>1</option>
                                    <option value="2"                                                      <?php echo $row['sks'] == '2' ? 'selected' : '' ?>>2</option>
                                    <option value="3"                                                      <?php echo $row['sks'] == '3' ? 'selected' : '' ?>>3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nidn">Nomor Induk Dosen</label>
                                <select class="form-control" id="nidn" name="nidn">
                                    <option selected disabled>Select Nomor Induk Dosen</option>
                                    <?php foreach ($dataDosen as $dosen) {?>
                                    <option value="<?php echo $dosen['nidn']; ?>"
                                        <?php echo $row['nidn'] == $dosen['nidn'] ? 'selected' : '' ?>>
                                        <?php echo $dosen['nidn']; ?> |
                                        <?php echo $dosen['nama']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
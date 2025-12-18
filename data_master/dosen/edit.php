<?php
    include '../../data_master/isRole.php';

    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    if (! isset($_GET['nidn'])) {
        header("Location: " . BASE_URL . "data_master/dosen/index.php");
    }

    $nidn = $_GET['nidn'];

    $query  = "SELECT * FROM tbl_dosen WHERE nidn = '$nidn'";
    $result = mysqli_query($koneksi, $query);
    $row    = mysqli_fetch_assoc($result);

    if ($row == null) {
        header("Location: " . BASE_URL . "data_master/dosen/index.php");
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
                    <h3 class="mb-0">Ubah Data Dosen</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?php echo BASE_URL . 'data_master/dosen/index.php' ?>">Data Dosen</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data Dosen</li>
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
                                Ubah Data Dosen
                            </h3>
                            <a href="<?php echo BASE_URL . 'data_master/dosen/index.php' ?>"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo BASE_URL . 'data_master/dosen/update.php?id=' . $row['nidn']; ?>"
                        method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Enter NIDN"
                                    value="<?php echo $row['nidn']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Dosen</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Enter Nama Dosen" value="<?php echo $row['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <select class="form-control" id="prodi" name="prodi">
                                    <option selected disabled>Select Program Studi</option>
                                    <option value="TL"                                                       <?php echo $row['prodi'] == 'TL' ? 'selected' : '' ?>>Teknologi
                                        Listrik (TL)</option>
                                    <option value="TRPL"                                                         <?php echo $row['prodi'] == 'TRPL' ? 'selected' : '' ?>>Teknik
                                        Rekayasa Perangkat Lunak (TRPL)</option>
                                    <option value="TRM"                                                        <?php echo $row['prodi'] == 'TRM' ? 'selected' : '' ?>>Teknik
                                        Rekayasa Manufaktur (TRM)</option>
                                    <option value="TRMK"                                                         <?php echo $row['prodi'] == 'TRMK' ? 'selected' : '' ?>>Teknik
                                        Rekayasa Mekatronika (TRMK)</option>
                                    <option value="UMUM"                                                         <?php echo $row['prodi'] == 'UMUM' ? 'selected' : '' ?>>Umum
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" value="<?php echo $row['email']; ?>">
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
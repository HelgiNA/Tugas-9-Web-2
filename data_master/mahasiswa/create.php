<?php
    include '../../data_master/isRole.php';
    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';
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
                    <h3 class="mb-0">Tambah Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?php echo BASE_URL . 'data_master/mahasiswa/index.php' ?>">Data Mahasiswa</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Mahasiswa</li>
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
                                Tambah Data Mahasiswa
                            </h3>
                            <a href="<?php echo BASE_URL . 'data_master/mahasiswa/index.php' ?>"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo BASE_URL . 'data_master/mahasiswa/store.php' ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nim">Nomor Induk Mahasiswa</label>
                                <input type="number" class="form-control" id="nim" name="nim"
                                    placeholder="Enter Nomor Induk Mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Enter Nama Mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <select class="form-control" id="prodi" name="prodi">
                                    <option selected disabled>Select Program Studi</option>
                                    <option value="TL">Teknologi Listrik (TL)</option>
                                    <option value="TRPL">Teknik Rekayasa Perangkat Lunak (TRPL)</option>
                                    <option value="TRM">Teknik Rekayasa Manufaktur (TRM)</option>
                                    <option value="TRMK">Teknik Rekayasa Mekatronika (TRMK)</option>
                                    <option value="UMUM">Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="number" class="form-control" id="angkatan" name="angkatan"
                                    placeholder="Enter Angkatan">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email">
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
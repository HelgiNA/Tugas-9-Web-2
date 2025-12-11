<?php
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
                    <h3 class="mb-0">Data Dosen</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Dosen</li>
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
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo BASE_URL . 'data_master/dosen/store.php' ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="number" class="form-control" id="nidn" name="nidn"
                                    placeholder="Enter NIDN">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Dosen</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Enter Nama Dosen">
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
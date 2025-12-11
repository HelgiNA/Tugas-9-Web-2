<?php
    include '../../koneksi.php';
    include '../../components/header.php';
    include '../../components/sidebar.php';
    include '../../components/topbar.php';

    $query = "SELECT
                tbl_matkul.kodeMatkul,
                tbl_matkul.namaMatkul,
                tbl_matkul.sks,
                tbl_dosen.nidn,
                tbl_dosen.nama
            FROM
                tbl_matkul
                INNER JOIN
                tbl_dosen
                ON
                    tbl_matkul.nidn = tbl_dosen.nidn";

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
                    <h3 class="mb-0">Data Mata Kuliah</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mata Kuliah</li>
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
                                <h3 class="card-title">
                                    <i class="fas fa-table mr-1"></i>
                                    Data Mata Kuliah
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Nomor Induk Dosen</th>
                                            <th>Nama Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['kodeMatkul']; ?></td>
                                            <td class="font-weight-bold"><?php echo $row['namaMatkul']; ?></td>
                                            <td><?php echo $row['sks']; ?></td>
                                            <td><?php echo $row['nidn']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
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
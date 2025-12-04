<?php
include('koneksi.php');
include('components/header.php');
include('components/sidebar.php');
include('components/topbar.php');

$query = "SELECT
                m.nim,
                m.nama AS nama_mhs,
                mk.kodeMatkul,
                mk.namaMatkul,
                d.nama AS nama_dosen,
                n.nilai,
                n.nilaiHuruf
            FROM
                tbl_nilai n
                JOIN tbl_mahasiswa m ON n.nim = m.nim
                JOIN tbl_matkul mk ON n.kodeMatkul = mk.kodeMatkul
                JOIN tbl_dosen d ON n.nidn = d.nidn
            ORDER BY
                m.nama ASC";

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
                                <h3 class="card-title">
                                    <i class="fas fa-table mr-1"></i>
                                    Data Nilai
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Kode Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Nilai</th>
                                            <th>Nilai Huruf</th>
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
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['nilaiHuruf']; ?></td>
                                            </tr>
                                        <?php } ?>
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
include('components/footer.php');
?>
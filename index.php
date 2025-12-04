<?php
include('koneksi.php');
include('components/header.php');
include('components/sidebar.php');
include('components/topbar.php');

// --- LOGIC: MENGHITUNG STATISTIK UNTUK DASHBOARD ---
// 1. Hitung Total Mahasiswa
$query_mahasiswa = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_mahasiswa");
$data_mahasiswa = mysqli_fetch_assoc($query_mahasiswa);

// 2. Hitung Total Dosen
$q_dosen = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_dosen");
$d_dosen = mysqli_fetch_assoc($q_dosen);

// 3. Hitung Total Mata Kuliah
$q_matkul = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_matkul");
$d_matkul = mysqli_fetch_assoc($q_matkul);

// 4. Hitung Rata-rata Nilai (Contoh statistik tambahan)
$q_nilai = mysqli_query($koneksi, "SELECT AVG(nilai) as rata_rata FROM tbl_nilai");
$d_nilai = mysqli_fetch_assoc($q_nilai);
$rata_rata = number_format($d_nilai['rata_rata'], 2);
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
                    <h3 class="mb-0">Dashboard Akademik</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $data_mahasiswa['total']; ?></h3>
                                    <p>Mahasiswa</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="#" class="small-box-footer">Lihat Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $d_dosen['total']; ?></h3>
                                    <p>Dosen Pengajar</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <a href="#" class="small-box-footer">Lihat Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $d_matkul['total']; ?></h3>
                                    <p>Mata Kuliah</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <a href="#" class="small-box-footer">Lihat Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $rata_rata; ?></h3>
                                    <p>Rata-rata Nilai</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <a href="#" class="small-box-footer">Selengkapnya <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-table mr-1"></i>
                                        Data Nilai Mahasiswa Terbaru
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Mata Kuliah</th>
                                                <th>Dosen</th>
                                                <th>Nilai</th>
                                                <th>Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT 
                                                m.nim, 
                                                m.nama AS nama_mhs, 
                                                mk.namaMatkul, 
                                                d.nama AS nama_dosen, 
                                                n.nilai, 
                                                n.nilaiHuruf
                                                FROM tbl_nilai n
                                                JOIN tbl_mahasiswa m ON n.nim = m.nim
                                                JOIN tbl_matkul mk ON n.kodeMatkul = mk.kodeMatkul
                                                JOIN tbl_dosen d ON n.nidn = d.nidn
                                                ORDER BY m.nama ASC";

                                            $result = mysqli_query($koneksi, $query);
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['nim']; ?></td>
                                                <td class="font-weight-bold"><?php echo $row['nama_mhs']; ?></td>
                                                <td><?php echo $row['namaMatkul']; ?></td>
                                                <td><?php echo $row['nama_dosen']; ?></td>
                                                <td class="text-center"><?php echo $row['nilai']; ?></td>
                                                <td class="text-center"><?php echo $row['nilaiHuruf']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
<?php 
include 'koneksi.php'; 
include 'components/header.php';
include 'components/sidebar.php';

// --- LOGIC: MENGHITUNG STATISTIK UNTUK DASHBOARD ---
// 1. Hitung Total Mahasiswa
$q_mhs = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_mahasiswa");
$d_mhs = mysqli_fetch_assoc($q_mhs);

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

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard Akademik</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $d_mhs['total']; ?></h3>
              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-graduate"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
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
                    <td class="text-center">
                        <?php 
                          $badge = 'secondary';
                          if($row['nilaiHuruf'] == 'A') $badge = 'success';
                          else if($row['nilaiHuruf'] == 'B') $badge = 'primary';
                          else if($row['nilaiHuruf'] == 'C') $badge = 'warning';
                          else $badge = 'danger';
                        ?>
                        <span class="badge badge-<?php echo $badge; ?>" style="font-size: 14px; padding: 5px 10px;">
                          <?php echo $row['nilaiHuruf']; ?>
                        </span>
                    </td>
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
  </div>
<?php include 'components/footer.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "pageLength": 10,
      "language": {
        "search": "Cari Data:",
        "zeroRecords": "Data tidak ditemukan",
        "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
        "infoEmpty": "Tidak ada data tersedia",
        "paginate": {
          "previous": "Sebelumnya",
          "next": "Selanjutnya"
        }
      }
    });
  });
</script>
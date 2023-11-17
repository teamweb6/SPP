<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "");

//ambil data dari tabel siswa
$result = mysqli_query($conn, "SELECT * FROM siswa");
 ?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Spp</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Halaman Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>-->
                    <!--    <li><a class="dropdown-item" href="#!">Activity Log</a></li>-->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- fitur -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                  <a class="nav-link" href="halaman_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      Dashboard
                            </a>
                       
   <div class="sb-sidenav-menu-heading">Master Data</div>

              <a class="nav-link collapsed" href="data_siswa.php">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data Siswa
                           </a>
 <a class="nav-link collapsed" href="data_kelas.php">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data Kelas
                           </a>
 <a class="nav-link collapsed" href="data_petugas.php">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data Petugas
                           </a>
 <a class="nav-link collapsed" href="data_spp.php">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data SPP
                           </a>

<div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link collapsed" href="#" >
                         <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                  Transaksi Pembayaran
                               <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
                            </a>
<a class="nav-link collapsed" href="#" >
                         <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
               Lihat History Pembayaran
                               <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
                           </a>
  <div class="sb-sidenav-menu-heading">Addons</div>
         <a class="nav-link" href="charts.html">
         <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                       Generate Laporan
                            </a>
                         <!--   <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon">
<i class="fas fa-table"></i></div>
          Tables
                            </a>-->
                        </div>
                    </div>
                   
                </nav>
            </div>

<!-- akhir fitur -->

            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                <h1 class="mt-4">Data Siswa</h1>
 
<!-- Tabel -->
                <div class="card mb-4">
               <div class="card-header">
      <i class="fas fa-table me-1"></i>
         <a href ="tambah.php"class="btn btn-primary" role="button">Tambah</a>
<?php 
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	if($pesan == "input"){
		echo "Data berhasil di input.";
	}else if($pesan == "update"){
		echo "Data berhasil di update.";
	}else if($pesan == "hapus"){
		echo "Data berhasil di hapus.";
	}
}
?>          
                            </div>
             <div class="card-body">
       <table id="datatablesSimple">
     <thead>
    <tr>
                                            <th>No</th>
                                            <th>Nisn</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Alamat</th>
<th>Aksi</th>
                                        </tr>
        </thead>
    <tbody>  
<?php $i = 1; ?>
<?php  while($row = mysqli_fetch_assoc($result)) :?>
<tr>
<td><?= $row["id_siswa"]; ?></td>
<td><?= $row["nisn"]; ?></td>                   
<td><?= $row["nama"]; ?></td>                                          
<td><?= $row["kelas"]; ?></td>                                           
<td><?= $row["jurusan"]; ?></td>                                            
<td><?= $row["alamat"]; ?></td>                                            
<td>
   <a href ="update.php"class="btn btn-warning" role="button">Update</a>
   <a href ="delete.php"class="btn btn-danger" role="button">Delete</a>
</td>
                                        
</tr>            
<?php $i++; ?>      
<?php endwhile;
?>                                             
</tbody>
                              </table>
                            </div>
                        </div>
                    </div>
<!-- Akhir Tabel -->

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Web Team Six</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
 <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>



</head>
<body>
	
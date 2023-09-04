<?php


session_start();
if(empty($_SESSION['id_petugas'])){
    echo "<script>
            alert('Maaf Anda Belum Login');
            window.location.assign('../index.php');
          </script>";
}

if($_SESSION['level']!='admin'){
    echo "<script>
            alert('Maaf Anda Bukan Sesi Admin, Silahkan Ulangi Lagi');
            window.location.assign('../index.php');
          </script>";
}

?>

<?php ob_start()?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pembayaran SPP - Login Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Aplikasi Pembayaran SPP</a>
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="admin.php?url=siswa">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Siswa
                            </a>
                            <a class="nav-link" href="admin.php?url=petugas">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Petugas
                            </a>
                            <a class="nav-link" href="admin.php?url=kelas">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kelas
                            </a>
                            <a class="nav-link" href="admin.php?url=spp">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                SPP
                            </a>
    
                            <a class="nav-link" href="admin.php?url=pembayaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                                Pembayaran
                            </a>
                            <a class="nav-link" href="admin.php?url=laporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                                Laporan
                            </a>
                            <a class="nav-link" href="admin.php?url=logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!--CONTEN-->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="card mt-2">
            <div class="card-body">
                
                <!-- ini isi web kita -->
                <?php
                $file = @$_GET['url'];
                if(empty($file)){
                    echo "<h4>Selamat Datang Di Halaman Administrator,</h4>";
                    echo "Aplikasi Pembayaran SPP digunakan mempermudah dalam mencatat pembayaran siswa / siswi disekolah";
                }else{
                    include $file.'.php';
                }
                ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <!-- <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>


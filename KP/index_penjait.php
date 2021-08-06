<?php
require 'function.php';

$_SESSION['allowed'] = 'penjait';
require 'cek.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PENJAIT PAGE</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-primary bg-primary">
            <a class="navbar-brand text-white" href="index.php">Waysport</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 text-white" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
 <!---NAVAR KIRI-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index_penjait.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="requestbarang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                                Request Barang
                            </a>
                        </div>
                    </div>

                    <!--LOGOUT BAWAH-->
                    <div class="sb-sidenav-footer">
                    <a class="nav-link " href="logout.php"><i class="fas fa-exclamation"></i>   Logout</a>
                    </div>
                     <!--LOGOUT BAWAH-->
                </nav>
</div>
<!--NAVAR KIRI-->


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Progress Barang</h1>
                            <div class="card mb-4">
                                <div class="card-header">
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama barang</th>
                                                <th>Stock barang</th>
                                                <th>QTY</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $idUser = $_SESSION['iduser'];
                                            $query = "SELECT * FROM masuk m INNER JOIN stock s ON m.idbarang = s.idbarang WHERE m.iduser = '$idUser'";
                                            $ambildatamasukbyIdUser = mysqli_query($conn, $query);
                                            $i = 1 ;
                                            $count = mysqli_num_rows($ambildatamasukbyIdUser);
                                            
                                            
                                            if($count >= $i){
                                                while($data=mysqli_fetch_array($ambildatamasukbyIdUser)){
                                                $tanggal = $data['tanggal'];
                                                $namabarang = $data['namabarang'];
                                                $keterangan = $data['keterangan'];
                                                $stock = $data['stock'];
                                                $QTY = $data['QTY'];
                                                $idb = $data['idbarang'];
                                                $status = $data['status'];
                                                ?>


                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$tanggal;?></td>
                                                    <td><?=$namabarang;?></td>
                                                    <td><?=$stock;?></td>
                                                    <td><?=$QTY;?></td>
                                                    <td><?=$keterangan;?></td>
                                                    <td><?=$status;?></td>
                                                </tr>
                                            <?php
                                            };
                                        };
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
      
</html>

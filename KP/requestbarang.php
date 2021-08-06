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
        <title>REQUEST BARANG</title>
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
                        <h1 class="mt-4">Stock Barang</h1>
                            <div class="card mb-4">
                                <div class="card-header">
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama barang</th>
                                                <th>deskripsi</th>
                                                <th>QTY</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $ambilsemuadatastock = mysqli_query($conn,"SELECT * FROM stock");
                                            $i = 1 ;
                                           
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $namabarang = $data['namabarang'];
                                            $deskripsi = $data['deskripsi'];
                                            $stok = $data['stock'];
                                            $idb = $data['idbarang'];
                                            ?>


                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$deskripsi;?></td>
                                                <td><?=$stok;?></td>
                                                <td>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#req<?=$idb;?>">
                                                Request
                                                </button>
                                                
                                                </td>
                                            </tr>
                                                    <!-- Request Modal -->
                                                    <div class="modal fade" id="req<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Request barang</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <form method="post">
                                                            <div class="modal-body">
                                                            Nama Barang :
                                                            <input type="text" name="namabarang"  value="<?=$namabarang?>" class="form-control" readonly="true">
                                                            <br>
                                                            Jumlah :
                                                            <input type="number" name="jumlah" class="form-control" required>
                                                            <br>
                                                            Keterangan :
                                                            <textarea name="keterangan" class="form-control" required>
                                                            </textarea>
                                                            <br>
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="stok" value="<?=$stok;?>">
                                                            <input type="hidden" name="iduser" value="<?=$_SESSION['iduser'];?>">
                                                            <button type="submit" class="btn btn-primary" name="requestbarang" >submit</button>
                                                            </form>
                                                            </div>
                                                            
                                                        </div>
                                                        </div>
                                                    </div>

                                            <?php
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

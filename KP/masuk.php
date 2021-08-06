<?php
require 'function.php';

$_SESSION['allowed'] = 'admin';
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
        <title>BARANG MASUK</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand" href="index.html">Waysport</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
 <!---NAVAR KIRI-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Stock barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                                Barang masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Barang keluar
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User Access
                            </a>
                        </div>
                    </div>
 <!--NAVAR KIRI-->
 
                    <!--LOGOUT BAWAH-->
                    <div class="sb-sidenav-footer">
                    <a class="nav-link" href="logout.php"><i class="fas fa-exclamation"></i>   Logout</a>
                    </div>
                     <!--LOGOUT BAWAH-->

                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Barang masuk</h1>
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Stock Barang</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penerima</th>
                                                <th>Status</th>
                                                <th>Tanggal Approval</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            $query = "SELECT *, l.email, l.level FROM masuk m INNER JOIN stock s ON m.idbarang = s.idbarang 
                                                      INNER JOIN login l ON m.iduser = l.iduser";
                                            $ambilsemuadatastock = mysqli_query($conn,$query);
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $idb = $data['idbarang'];
                                            $idm = $data['idmasuk'];
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $QTY = $data['QTY'];
                                            $keterangan = $data['keterangan'];
                                            $stock = $data['stock'];
                                            $status = $data['status'];
                                            $penerima = $data['email'];
                                            $approveddate = $data['approveddate'];
                                            ?>


                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$stock;?></td>
                                                <td><?=$QTY;?></td>
                                                <td><?=$keterangan;?></td>
                                                <td><?=$penerima;?></td>
                                                <td><?=$status;?></td>
                                                <td><?=$approveddate;?></td>
                                                <td>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                Approval
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                Delete
                                                </button>
                                                
                                                </td>
                                            </tr>

                                                         <!-- edit Modal -->
                                                         <div class="modal fade" id="edit<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Approval Form</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <form method="post">
                                                            <div class="modal-body">
                                                            Nama Barang :
                                                            <input type="text" name="namabarang" value="<?=$namabarang?>" class="form-control" readonly='true'>
                                                            <br>
                                                            Keterangan :
                                                            <textarea name="keterangan" value="<?=$keterangan?>" class="form-control">
                                                            </textarea>
                                                            <br>
                                                            Jumlah :
                                                            <input type="number" name="QTY" value="<?=$QTY?>" class="form-control" readonly='true'>
                                                            <br>
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                                            <input type="hidden" name="penerima" value="<?=$penerima;?>">
                                                            <button type="submit" class="btn btn-primary mr-3" name="approvebarang" >Approve</button>
                                                            <button type="submit" class="btn btn-danger" name="rejectbarang" >&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;</button>
                                                            </form>
                                                            </div>
                                                            
                                                        </div>
                                                        </div>
                                                    </div>

                                                     <!-- delete Modal -->
                                                     <div class="modal fade" id="delete<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Barang?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <form method="post">
                                                            <div class="modal-body">
                                                             Apakah anda yakin ingin menghapus  <?=$namabarang;?> ?
                                                             <input type="hidden" name="idb" value="<?=$idb;?>">
                                                             <input type="hidden" name="QTY" value="<?=$QTY;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapusbarangmasuk" >Hapus</button>
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
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah barang masuk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">

        <select name="barangnya" class="form-control">

                <?php 
                    $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM stock" );
                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                        $namabarangnya = $fetcharray ['namabarang'];
                        $idbarangnya = $fetcharray ['idbarang'];
                ?>

                <option  value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

        <?php
        }
        ?>

        </select>
        
        <br>
        <input type="number" name="QTY" placeholder="quantity" class="form-control" required>
        <br>
        <input type="text" name="penerima" placeholder="penerima" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary" name="barangmasuk" >submit</button>
        </form>
        </div>
        
      </div>
    </div>
  </div>
</html>

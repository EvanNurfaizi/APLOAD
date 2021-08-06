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
        <title>User Access</title>
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
                                Barang Keluar
                            </a>  
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User Access
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
                        <h1 class="mt-4">Data User</h1>
                            <div class="card mb-4">
                                <div class="card-header">

                                        <!-- Button to Open the Modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                Tambah User Access
                                            </button>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $ambilsemuadatalogin = mysqli_query($conn,"SELECT * FROM login");
                                            $i = 1 ;
                                           
                                            while($data=mysqli_fetch_array($ambilsemuadatalogin)){
                                            $email = $data['email'];
                                            $password = $data['password'];
                                            $level = $data['level'];
                                            $iduser = $data['iduser'];
                                            ?>


                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$email;?></td>
                                                <td><?=$password;?></td>
                                                <td><?=$level;?></td>
                                                <td>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?=$iduser;?>">
                                                Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
                                                Delete
                                                </button>
                                                
                                                </td>
                                            </tr>
                                                    <!-- edit Modal -->
                                                    <div class="modal fade" id="edit<?=$iduser;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit User Access</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <form method="post">
                                                            <div class="modal-body">
                                                            Email :
                                                            <input type="text" name="email"  value="<?=$email?>" class="form-control" required>
                                                            <br>
                                                            Password :
                                                            <input type="text" name="password" value="<?=$password?>" class="form-control" required>
                                                            <br>
                                                            Level :
                                                            <select name="level" class="form-control" required>
                                                            <?php 
                                                                if(strtolower($level) == 'admin'){
                                                            ?>
                                                                <option value="Admin" selected>Admin</option>
                                                                <option value="Penjait">Penjait</option>
                                                            <?php
                                                                }
                                                                else{
                                                            ?>
                                                                <option value="Admin">Admin</option>
                                                                <option value="Penjait" selected>Penjait</option>
                                                            <?php
                                                                }
                                                            ?>
                                                                
                                                            </select>
                                                            <br>
                                                            <input type="hidden" name="iduser" value="<?=$iduser;?>">
                                                            <button type="submit" class="btn btn-primary" name="updateuser" >submit</button>
                                                            </form>
                                                            </div>
                                                            
                                                        </div>
                                                        </div>
                                                    </div>

                                                     <!-- delete Modal -->
                                                     <div class="modal fade" id="delete<?=$iduser;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus User?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <form method="post">
                                                            <div class="modal-body">
                                                             Apakah anda yakin ingin menghapus  <?=$email;?> ?
                                                             <input type="hidden" name="iduser" value="<?=$iduser;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapususer" >Hapus</button>
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
     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah User Access</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        Email :
        <input type="text" name="email" class="form-control" required>
        <br>
        Password :
        <input type="text" name="password" class="form-control" required>
        <br>
        Level :
        <select name="level" class="form-control" required>
            <option value="Admin">Admin</option>
            <option value="Penjait">Penjait</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary" name="addnewuser" >submit</button>
        </form>
        </div>
        
      </div>
    </div>
  </div>
  
</html>

<?php
require 'ceklogin.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Aplikasi Kasir</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Barang Masuk</h1>
                        <ol class="breadcrumb mb-4">
                            <marquee><li class="breadcrumb-item active">Selamat Datang Di Aplikasi Kasir</li></marquee>
                        </ol>

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">Tambah Barang Masuk</button>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Barang Masuk
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                    $get = mysqli_query($c,"select * from masuk m, produk p where m.idproduk=p.idproduk");
                                    $i=1;

                                    while($p=mysqli_fetch_array($get)){
                                    $namaproduk = $p['namaproduk'];
                                    $deskripsi = $p['deskripsi'];
                                    $idmasuk = $p['idmasuk'];
                                    $idproduk = $p['idproduk'];
                                    $qty = $p['qty'];
                                    $tanggalmasuk = $p['tanggalmasuk'];


                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namaproduk;?> : <?=$deskripsi;?></td>
                                            <td><?=$qty;?></td>
                                            <td><?=$tanggalmasuk;?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idmasuk;?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idmasuk;?>">Delete</button>
                                            </td>
                                        </tr>


                                    <!-- modal edit -->
                                        <div class="modal fade" id="edit<?=$idmasuk;?>" role="dialog">
                                            <div class="modal-dialog">
    
                                        <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header"> 
                                                    <h4 class="modal-title">Ubah data barang masuk</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="post">
                                            <div class="modal-body">
                                                <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$namaproduk;?> : <?=$deskripsi;?>" disabled>
                                                <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah Produk" value="<?=$qty;?>">
                                                <input type="hidden" name="idm" value="<?=$idmasuk;?>">
                                                <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editdatabarangmasuk">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                                </form>    
                                            </div>  
                                            </div>
                                        </div>

                                        <!-- modal delete -->
                                        <div class="modal fade" id="delete<?=$idmasuk;?>" role="dialog">
                                            <div class="modal-dialog">
    
                                        <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header"> 
                                                    <h4 class="modal-title">Hapus data barang masuk</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="post">
                                            <div class="modal-body">
                                                Apakah Anda ingin menghapus barang ini?
                                                <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                                <input type="hidden" name="idm" value="<?=$idmasuk;?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusdatabarangmasuk">Ya</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                                </form>    
                                            </div>  
                                            </div>
                                        </div>

                                    <?php
                                    }; //end of while
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>


     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    <form method="post">
        <div class="modal-body">
            Pilih Barang
            <select name="idproduk" class="form-control">
                
                <?php
                $getproduk = mysqli_query($c,"select * from produk");

                while($pl=mysqli_fetch_array($getproduk)){
                    $namaproduk = $pl['namaproduk'];
                    $stock = $pl['stock'];
                    $deskripsi = $pl['deskripsi'];
                    $idproduk = $pl['idproduk'];


                ?>
              
                <option value="<?=$idproduk;?>"><?=$namaproduk;?> - <?=$deskripsi;?> (Stock: <?=$stock;?>)</option>

                <?php
                }
                ?>

            </select>

            <input type="number" name="qty" class="form-control mt-4" placeholder="Jumlah" min="1" required>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="barangmasuk">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>    
      </div>  
    </div>
  </div>


</html>

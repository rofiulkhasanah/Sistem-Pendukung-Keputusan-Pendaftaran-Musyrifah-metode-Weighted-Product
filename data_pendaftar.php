<?php include_once('sidebar.php');
include 'koneksi.php';
?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Input Data / Kriteria</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">                      
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">JURUSAN</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">TELEPON</th>
                                    <th scope="col">ID KRITERIA</th>
                                    <th scope="col">NILAI</th>
                                </tr>
                            </thead>
                            <?php
                                $mahasiswa_sql = mysqli_query($koneksi, "SELECT * from mahasiswa");
                                $no=1;
                                foreach ($mahasiswa_sql as $row){
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $row['id_mahasiswa']?></th>
                                    <th scope="row"><?php echo $row['nim']?></th>
                                    <th scope="row"><?php echo $row['nama']?></th>
                                    <th scope="row"><?php echo $row['jurusan']?></th>
                                    <th scope="row"><?php echo $row['alamat']?></th>
                                    <th scope="row"><?php echo $row['telepon']?></th>
                                    <th scope="row"><?php echo $row['id_kriteria']?></th>
                                    <th scope="row"><?php echo $row['nilai']?></th>
                                </tr>
                            </tbody>
                            <?php $no++;
                                }
                            ?>
                        </table>
                       
                    </div>
                </div>
            </div>
            <?php include_once('footer.php')?>
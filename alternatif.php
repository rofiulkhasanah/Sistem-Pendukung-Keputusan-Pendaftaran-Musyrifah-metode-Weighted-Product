<?php include_once('sidebar.php');
    include 'koneksi.php';
    if(isset($_POST['submit'])){
    $alternatif = $_POST['alternatif'];      
    $input	= "INSERT INTO alternatif (nm_alternatif) VALUES ('$alternatif')";
    $query_input =mysqli_query($koneksi, $input);
    }
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
                                <li><span>Input Data / Alternatif</span></li>
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
                        <form action="alternatif.php" method="post">
                            <div class="form-group">
                                Nama Alternatif : <input type="text" name="alternatif"><br><br>
                                <input type="submit" name="submit" value="Submit">
                            </div>
                        </form>

                        <br><br>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Kriteria</th>
                                </tr>
                            </thead>
                            <?php
                                $alternatif_sql = mysqli_query($koneksi, "SELECT * from alternatif");
                                $no=1;
                                foreach ($alternatif_sql as $row){
                            ?>
                            <tbody>
                                <tr>
                                <th scope="row"><?php echo $row['id_alternatif']?></th>
                                <th scope="row"><?php echo $row['nm_alternatif']?></th>
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
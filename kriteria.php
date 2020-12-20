<?php include_once('sidebar.php')?>
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
                        <form action="kriteria.php" method="post">
                        <div class="form-group">
                            Nama Kriteria : <input type="text" name="kriteria"><br><br>

                            <input type="submit" name="submit" value="Submit"></form>
                                
                            <?php
                            include 'koneksi.php';
                            if(isset($_POST['submit'])){
                                $kriteria = $_POST['kriteria'];                                
                                $input	= "INSERT INTO kriteria (nm_kriteria) VALUES ('$kriteria')";
                                $query_input =mysqli_query($koneksi, $input);
                                        // echo "Kriteria : $kriteria ";
                                        // echo "<br>";
                                }
                            ?>
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
                                $kriteria_sql = mysqli_query($koneksi, "SELECT * from kriteria");
                                $no=1;
                                foreach ($kriteria_sql as $row){
                            ?>
                            <tbody>
                                <tr>
                                <th scope="row"><?php echo $row['id_kriteria']?></th>
                                <th scope="row"><?php echo $row['nm_kriteria']?></th>
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
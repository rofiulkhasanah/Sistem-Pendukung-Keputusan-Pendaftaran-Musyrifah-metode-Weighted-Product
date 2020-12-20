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
                                <li><span>Input Data / SKALA</span></li>
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
                        <br><font size="4"><center><b>DATA SKALA</b></center><font><br>
                        <div class="form-style-3">

                        <form method="post" action="action_alternatif.php">
                            <fieldset><legend>Data</legend>

                                <label for="Nama">
                                    <span>Nama Skala <span class="required"></span></span>
                                    <input type="text" name="nama" id="">
                                </label>
                                <label for="Value">
                                    <span>Value <span class="required"></span></span>
                                    <input type="text" name="value" id="">
                                    </label>
                                
                                <label><span>&nbsp;</span><input type="submit" value="POST"/></label>
                                
                                <!-- <button type="button" class="btn btn-info" value="POST">Tambah</button> -->
                            </fieldset>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Skala</th>
                                </tr>
                            </thead>
                            <?php
                                $kriteria_sql = mysqli_query($koneksi, "SELECT * from skala");
                                $no=1;
                                foreach ($kriteria_sql as $row){
                            ?>
                            <tbody>
                                <tr>
                                <th scope="row"><?php echo $row['id_skala']?></th>
                                <th scope="row"><?php echo $row['nm_skala']?></th>
                                </tr>
                            </tbody>
                            <?php $no++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('footer.php')?>

<?php include_once('sidebar.php');
include 'koneksi.php';

$sql = "SELECT * FROM kriteria, bobot where kriteria.id_kriteria = bobot.id_kriteria";
$query = mysqli_query($koneksi,$sql);
$nomor = 0;
$rowcount=mysqli_num_rows($query);
// echo $rowcount;

if(isset($_POST['submit'])){
    
    // $banyak = count($_POST['']);
    $id_alternatif = $_POST['id_alternatif'];    
    for ($i=0; $i < $rowcount ; $i++) { 
        $id_bobot = $_POST['id_bobot'][$i];
        $nilai = $_POST['nilai'][$i];      
        $input	= "INSERT INTO penilaian (id_alternatif, id_bobot, nilai) VALUES ('$id_alternatif','$id_bobot','$nilai')";
        $query_input =mysqli_query($koneksi, $input);
    }
}
// echo "<input name='data' value='".$_GET['data']"' type='text'>"
// echo "<input name='data' value='".$_GET['id]."' type='text'>";
?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 
                            
                            class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Input Data / kriteria</span></li>
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
                    
                        <form method="POST" action="?page=penilaian_kriteria">
                        <!-- <input type="text" name="data" id="data" value="<?php echo data ?>"> -->
                        <!-- <input type="hidden" name="alternatif" id="" value="1"> -->
                            <table class="table table-borderless table-light">
                                <tbody>
                                <input type="hidden" name="id_alternatif" value="<?php echo $_GET['id_alternatif'] ?>">
                                <?php
                                // echo "<input type='hidden' name='id_alternatif' value='".$_GET['id_alternatif']."'>";
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><p name="kriteria"><?php echo $row['nm_kriteria']?></p></td>
                                        <input type="hidden" value="<?php echo $row['id_bobot'] ?>" name="id_bobot[]">
                                        <td><input type="text" name="nilai[]"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <input type="submit" name="submit" value="Submit">
                            <!-- <button type="button" class="btn btn-primary" href="logout.php">Logout</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('footer.php')?>

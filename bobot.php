<?php include_once('sidebar.php');

include 'koneksi.php';
$sql = "SELECT * FROM kriteria";
$query = mysqli_query($koneksi,$sql);
$rowcount=mysqli_num_rows($query);
// echo $rowcount;

if(isset($_POST['submit'])){
    
    for ($i=0; $i < $rowcount ; $i++) { 
        $id_kriteria = $_POST['id_kriteria'][$i]; 
        $id_skala = $_POST['id_skala'][$i];
        // var_dump($id_kriteria);
        // var_dump($id_skala);
        $input = "INSERT INTO bobot (id_kriteria, id_skala) VALUES ('$id_kriteria','$id_skala')";
        $action_query = mysqli_query($koneksi, $input);
        // $input  = "INSERT INTO bobot (id_kriteria, id_skala) VALUES ('$id_kriteria','$id_skala')";
        // $query_input =mysqli_query($koneksi, $input);
  }
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
                        <form action="bobot.php" method="POST">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Skala</th>
                                    </tr>
                                </thead>
                                <?php                                    
                                    $no=1;
                                    foreach ($query as $row){
                                ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $row['id_kriteria']?></th>
                                        <td><?php echo $row['nm_kriteria']?></td>
                                        <input name="id_kriteria[]"  type="hidden" value="<?php echo $row['id_kriteria']?>" >
                                        <td>
                                            <select name="id_skala[]">
                                                <option selected disabled>Pilih Skala</option>
                                                <?php
                                                    include 'koneksi.php';
                                                    $skala_sql = mysqli_query($koneksi, "SELECT * from skala  ORDER BY value ASC");
                                                    $no=1;
                                                    foreach ($skala_sql as $skala_id){
                                                ?>
                                                <option value = "<?php echo $skala_id['id_skala']?>">
                                                <?php echo $skala_id['value']?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php 
                                $no++;
                                    }
                                ?>
                            </table>
                            <button type="submit" name="submit" class="btn btn-danger">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('footer.php')?>

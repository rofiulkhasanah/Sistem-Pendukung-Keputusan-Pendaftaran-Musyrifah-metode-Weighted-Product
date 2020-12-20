            <?php include_once('sidebar.php');
            include 'koneksi.php';            
            $sql = "SELECT * FROM kriteria";
            $query = mysqli_query($koneksi,$sql);
            $rowcount=mysqli_num_rows($query);
            echo $rowcount;

            if(isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $jurusan = $_POST['jurusan'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                for ($i=0; $i < $rowcount; $i++) { 
                    $id_kriteria = $_POST['id_kriteria'][$i];
                    $nilai = $_POST['nilai'][$i];
                    var_dump($id_kriteria);
                    var_dump($nilai);
                    $input = "INSERT INTO mahasiswa (nim, nama, jurusan, alamat, telepon, id_kriteria, nilai) VALUE ('$nim','$nama','$jurusan','$alamat','$telepon','$id_kriteria', '$nilai')";
                    $query_input = mysqli_query($koneksi, $input);
                }
            
            $query_nilai = "SELECT * from mahasiswa, penilaian, bobot where mahasiswa.id_kriteria =bobot.id_kriteria 
            AND penilaian.id_bobot=bobot.id_bobot AND penilaian.nilai= mahasiswa.nilai
            GROUP By penilaian.id_alternatif, mahasiswa.nim";

            $sql_nilai = mysqli_query($koneksi,$query_nilai);
            $rowcount=mysqli_num_rows($sql_nilai);

            }
            
            
            // 

            
    
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
                                <li><span>Input Data</span></li>
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
                        <div class="container">     
                            <form action="inputdata.php" method="POST" enctype="multipart/form-data">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                    
                                        <td>&nbsp;</td>
                                        <td><font size="4" color="blue"><b>INPUT DATA MAHASISWA</b></font></td>
                                    </tr>
                                    <tr>
                                    
                                        <td>NIM</td>
                                        <td><input type="text" name="nim" size="12"></td>
                                    </tr>
                                    <tr>
                                    
                                        <td>Nama</td>
                                        <td><input type="text" name="nama" size="30"></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td><input type="text" name="jurusan" size="30"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><input type="text" name="alamat" size="60"></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td><input type="text" name="telepon" size="12"></td>
                                    </tr>
                                </table>
                                <br><br>
                                <h3>Penilaian</h3>
                                <table class="table">
                                    <tbody>
                                    <?php
                                    // echo "<input type='hidden' name='data' value='".$_GET['data']."'>";
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>    
                                        <tr>
                                            <td value="<?php echo $row['id_kriteria'] ?>"> <?php echo $row['nm_kriteria']?> </td>
                                            <input name="id_kriteria[]" type="hidden" value="<?php echo $row['id_kriteria']?>" >
                                            <td><input type="text" value="" name="nilai[]"></td>
                                        </tr>
                                    <?php
                                    // $count++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <a href="hasil_penilaian.php" name="submit">Submit</a>
                                <!-- <input type="submit" name="submit" value="Submit" href="hasil_penilaian.php"> -->
                            </form>

                            <?php
                                while ($row = mysqli_fetch_array($sql)) {
                                    $a=$koneksi->query("SELECT exp(sum(log(nilai))) as hasil,vektor.* FROM vektor where id_nilai='$row[id_nilai]'");
                                    $aa = mysqli_fetch_array($a);  
                                    $jjj[]=$aa['hasil']."<br>";
                                    $yyy=$aa['id_alternatif']."<br>";
                                // while ($aa = mysqli_fetch_array($a)) {
                                    //   $b = $koneksi->query("SELECT * FROM s, alternatif where id_kriteria='$aa[id_kriteria]'");
                                    // $bb = mysqli_fetch_array($b);
                                        //echo $bb['id_alternatif']."<br>";
                                        //echo $bb['nm_alternatif'];
                                        // echo $bb['nama'];
                                    }
                                    //echo $jjj;
                                    echo rsort($jjj);
                                    // echo $aa['nilai']."<br>";
                                    // echo $aa['id_alternatif']."<br>";
                                    // echo $row['id_nilai']."<br>";
                                    // echo $row['nama'];

                                    echo rsort($jjj);
                            // }
                                ?>

                            <p value="<?php echo rsort($jjj);?>"><?php echo rsort($jjj);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('footer.php')?>

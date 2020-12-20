<?php include_once('sidebar_user.php');
            include 'koneksi.php';            
            $sql = "SELECT * FROM kriteria ";
            $query = mysqli_query($koneksi,$sql);
            $rowcount=mysqli_num_rows($query);
            // echo $rowcount;

            if(isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $jurusan = $_POST['jurusan'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                for ($i=0; $i < $rowcount; $i++) { 
                    $id_kriteria = $_POST['id_kriteria'][$i];
                    $nilai = $_POST['nilai'][$i];
                    // var_dump($nilai);

                    $input = "INSERT INTO mahasiswa (nim, nama, jurusan, alamat, telepon, id_kriteria, nilai) VALUES ('$nim','$nama','$jurusan','$alamat','$telepon','$id_kriteria', '$nilai')";
                    $query_input = mysqli_query($koneksi, $input);
                }
                ?>
                <script language="JavaScript">
			    document.location='hasil_penilaian.php';
		        </script>
            <?php
            }            
?>
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
                        <h1 align="center" class="h1_mhs">INPUT DATA MAHASISWA</h1> 
                            <form action="index_user.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name= "nim">
                                    </div> 
                                        <div class="form-group">
                                    <label class="control-label col-sm-2" >NAMA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama">
                                    </div> 
                                        <div class="form-group">
                                    <label class="control-label col-sm-2">JURUSAN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jurusan">
                                    </div> 
                                        <div class="form-group">
                                    <label class="control-label col-sm-2">ALAMAT</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat">
                                    </div> 
                                        <div class="form-group">
                                    <label class="control-label col-sm-2">TELEPON</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telepon">
                                    </div> 
                                    <br>
    
                                    <h1 align="center" class ="h1_mhs">PENILAIAN</h1>
                                    <?php
                                    // echo "<input type='hidden' name='data' value='".$_GET['data']."'>";
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>    
                                    <label class="control-label col-sm-2" value="<?php echo $row['id_kriteria'];?>"><?php echo $row['nm_kriteria']?></label>
                                        <div class="col-sm-10">

                                        <input name="id_kriteria[]" type="hidden" value="<?php echo $row['id_kriteria']?>" >  
                                        <!-- <input type="text" value="" name="nilai[]" class="form-control"> -->

                                        <select  name="nilai[]">
                                            <option selected disabled>Pilih Skala</option>
                                                <?php
                                                    include 'koneksi.php';
                                                    $skala_sql = mysqli_query($koneksi, "SELECT * from skala where id_kriteria='$row[id_kriteria]'");
                                                    $no=1;
                                                    while ($a = mysqli_fetch_array($skala_sql)){

                                                
                                                    // foreach ($skala_sql as $skala_id){
                                                ?>
                                            <option value ="<?php echo $a['value']?>">
                                                <?php echo $a['nm_skala']?>
                                            </option>

                                                <?php
                                                    }
                                                ?>
                                        </select>

                                    </div> 
                                    <?php
                                    // $count++;
                                }
                                    ?>
                                <br>
                                <button type="submit" name="submit" class="btn btn-danger">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('footer.php')?>
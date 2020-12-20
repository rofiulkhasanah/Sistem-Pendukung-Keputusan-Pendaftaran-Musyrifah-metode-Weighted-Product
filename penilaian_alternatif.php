<?php
include_once('sidebar.php');
include "koneksi.php";

//view data mahasiswa di dalam database
$Lihat = "SELECT * FROM alternatif ORDER BY id_alternatif";
$Tampil = mysqli_query($koneksi, $Lihat);

$nomer = 0;
?>

		<div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Menu / Penilaian</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

			<div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">

						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama Alternatif</th>
									<th scope="col">Link Kriteria</th>
								</tr>
							</thead>
							<tbody>
							<form method="POST" action="">
								<?php
								while ($hasil = mysqli_fetch_array($Tampil)) {
									$id_alternatif	= stripslashes($hasil['id_alternatif']);
									$nm_alternatif	= stripslashes($hasil['nm_alternatif']); {
										$nomer++;
								?>
									<tr>
										<th scope="row"><?= $nomer ?></th>
										<td><?= $nm_alternatif ?></td>
										<td>
											<a class="btn btn-primary" href="penilaian_kriteria.php?id_alternatif=<?=$id_alternatif?>" role="button" name="btnalternatif" value="<?= $id_alternatif ?>">
												Link Kriteria
											</a>
										</td>

									</tr>

								<?php
									}
								}
								//Tutup koneksi engine MySQL
								mysqli_close($koneksi);
								?>
							</form>


							</tbody>
						</table>
					</div>
                </div>
            </div>
		</div>
	<?php include_once('footer.php')?>
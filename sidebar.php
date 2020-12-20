<?php include_once('header.php');
include 'koneksi.php';
?>
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="#"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="data_pendaftar.php">Beranda</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Input Data
                                    </span></a>
                                <ul class="collapse">
                                    <!-- <li><a href="inputdata.php">Skala</a></li> -->
                                    <li><a href="kriteria.php">Kriteria</a></li>
                                    <li><a href="alternatif.php">Alternatif</a></li>
                                    <li><a href="skala.php">Skala</a></li>
                                    <li><a href="bobot.php">Bobot</a></li>
                                    <!-- <li><a href="inputdata.php">Mahasiswa</a></li> -->

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Menu</span></a>
                                <ul class="collapse">
                                    <li><a href="penilaian_alternatif.php">Penilaian</a></li>
                                    <li><a href=""></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Pengguna</span></a>
                                <ul class="collapse">
                                <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

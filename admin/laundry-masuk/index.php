<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        

    $enters = tampil("SELECT * FROM transaksi where status = 'Sedang Proses' OR status = 'Belum Diambil' ");

    include ('../view/header.php');
?>
<div class="container mt-4 h1 request-heading">Sedang Proses</div>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid container">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Masuk</th>                                    
                                    <th>Nama Konsumen</th>
                                    <th>Berat (kg)</th>
                                    <th>Kategori</th>  
                                    <th>Status</th>
                                    <th>Opsi</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($enters as $enter) : ?>                                                                
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <?php
                                        $masuk = $enter['masuk'];
                                        $date = date_create("$masuk");
                                    ?>
                                    <td><?= date_format($date,"d/m/Y"); ?></td>                                    
                                    <td><?= $enter["nama_konsumen"] ?></td>
                                    <td><?= $enter["berat"] ?></td>
                                    <td><?= $enter["kategori"] ?></td>                                    
                                    <td><?= $enter["status"] ?></td>                                    
                                    <td><a href="ubah.php?id=<?= $enter["id"]; ?>"><span class="fa-solid fa-pen" style="color: #000000;" title="Edit Data"></span></a>  <a href="hapus.php?id=<?= $enter["id"]; ?>"><span class="ms-3 fa-solid fa-trash" style="color: #000000;"title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td>
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>                    
                            </tbody>
                        </table>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>
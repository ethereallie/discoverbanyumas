<?php 
    session_start();
    
    require 'functions.php';
    
    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        
    
    $enters = tampil("SELECT * FROM transaksi where status='Request Diterima'");
    
    include ('../view/header.php');
    ?>
<div class="container mt-4 h1 request-heading">Order Masuk</div>

<div class="container text-end">
    <a href="tambah.php"><button type="button" class="btn btn-orange">Tambah Data</button></a>
</div>
<!-- Page Content -->
<div class="container mt-2 card">
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Tanggal Masuk </th>
                <th>Nama Konsumen</th>
                <th>Kategori</th>
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
                <td><?= $enter["kategori"] ?></td>                                    
                <td><a href="ubah.php?id=<?= $enter["id"]; ?>"><span class="fa-solid fa-pen" style="color: #000000;" title="Edit Data"></span></a>  <a href="hapus.php?id=<?= $enter["id"]; ?>"><span class="ms-3 fa-solid fa-trash" style="color: #000000;"title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td>
            </tr>               
            <?php $no++; ?>                 
            <?php endforeach; ?>                    
        </tbody>
    </table>
</div>

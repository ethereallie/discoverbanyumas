<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        

    $exits = tampil("SELECT * FROM transaksi WHERE status = 'Belum diambil' ORDER BY nama_konsumen, masuk ASC");

    if(isset($_POST['tambah'])){
        if(tambah($_POST) > 0) {
            $_SESSION["status"] = "Laundry Berhasil Diambil!";
            header("Location: index.php");
        } 
        else {
            $_SESSION["failed"] = "Laundry Gagal Diambil!";
            header("Location: index.php");   
        }
    }

    include ('../view/header.php');
?>

<div class="container mt-4 h1 request-heading">Ambil Laundry</div>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid container">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2"">Laundry :</label>                                                
                                <div class="col-sm-10">		
                                    <select class="form-control" name="id">    
                                        <option> Pilih Transaksi </option>
                                        <?php foreach ($exits as $exit) : ?>
                                        <option value="<?= $exit["id"]; ?>"><?= $exit["nama_konsumen"]; ?> - <?php $masuk = $exit['masuk']; $dateMasuk = date_create("$masuk"); echo date_format($dateMasuk,"d/m/Y"); ?> - <?= $exit["berat"]; ?> kg - <?= $exit["kategori"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-start">
                                <button class="btn btn-orange mt-3" name="tambah" value="Tambah" type="submit">Tambah</button>
                            </div>                                        
                        </form>                                    
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>
            
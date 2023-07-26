<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }

    if(isset($_POST['tambah'])){
        if(tambah($_POST) > 0) {
            $_SESSION["status"] = "Request Berhasil Ditambahkan!";
            header("Location: index.php");
        } 
        else {
            $_SESSION["failed"] = "Request Gagal Ditambahkan!";
            header("Location: index.php");
        }
    }

    include ('../view/header.php');
?>
<div class="container mt-4 h1 request-heading">Tambah Request</div>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid container mt-4">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Konsumen :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_konsumen" placeholder="Nama Konsumen" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Berat (kg) :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="berat" placeholder="Contoh: 5" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kategori :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kategori" placeholder="Normal, Ekspress, 24 Jam">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Harga (/kg):</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control" placeholder="4000">
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
            

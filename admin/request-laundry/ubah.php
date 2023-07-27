<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET["id"];
$enter = tampil("SELECT * FROM transaksi WHERE id = $id")[0];

if (isset($_POST['update'])) {
    if (ubah($_POST) > 0) {
        $_SESSION["status"] = "Request Berhasil Diubah!";
        header("Location: index.php");
    } else {
        $_SESSION["failed"] = "Request Gagal Diubah!";
        header("Location: index.php");
    }
}

include('../view/header.php');
?>

<div class="container mt-4 h1 request-heading">Order Masuk</div>


<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Konsumen :</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $enter["id"]; ?>">
                                    <input type="text" class="form-control" name="nama_customer" placeholder="Bheta" value="<?= $enter["nama_customer"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Berat (kg) :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="berat" placeholder="2" value="<?= $enter["berat"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">layanan :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="layanan" value="<?= $enter["layanan"]; ?>" placeholder="Normal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Harga (/kg):</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control" value="<?= $enter["harga_satuan"]; ?>" placeholder="4000">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected> <?= $enter["status"] ?> </option>
                                        <option value="Sedang Proses">Sedang Proses</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-start">
                                <button class="btn btn-orange mt-4" name="update" value="update" type="submit">Perbaharui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
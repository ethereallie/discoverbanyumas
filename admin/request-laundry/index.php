<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login");
    exit;
}

$enters = tampil("SELECT * FROM transaksi where status='Request Diterima'");

include('../view/header.php');
?>
<div class="container mt-4 h1 request-heading">Order Masuk</div>

<?php if (isset($_SESSION["status"])) { ?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION["status"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php
}
$_SESSION["status"] = null
?>

<?php if (isset($_SESSION["failed"])) { ?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION["failed"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php
}
$_SESSION["failed"] = null
?>

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
                <th>layanan</th>
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
                    <td><?= date_format($date, "d/m/Y"); ?></td>
                    <td><?= $enter["nama_customer"] ?></td>
                    <td><?= $enter["layanan"] ?></td>
                    <td><a href="ubah.php?id=<?= $enter["id"]; ?>"><span class="fa-solid fa-pen" style="color: #000000;" title="Edit Data"></span></a> <a href="hapus.php?id=<?= $enter["id"]; ?>"><span class="ms-3 fa-solid fa-trash" style="color: #000000;" title="Hapus Data" onclick="return confirm('Apakah anda ingin menghapus data ini?')"></span></a></td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
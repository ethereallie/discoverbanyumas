<?php
require('../koneksi.php');

function tampil($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama_customer"]);
    $nomor = $data["nomor_whatsapp"];
    $layanan = htmlspecialchars($data["layanan"]);
    $berat = $data["berat"];
    $catatan = $data["catatan"];
    $harga = $data["harga"];
    $total = $berat * $harga;

    mysqli_query($conn, "INSERT INTO transaksi(masuk, keluar, nama_customer, nomor_whatsapp, layanan, berat, catatan, harga_satuan, harga_total, status) VALUES (NOW(), NOW() + INTERVAL 3 DAY, '$nama', $nomor, '$layanan', $berat, '$catatan', $harga, $total, 'Belum diambil')");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_customer"]);
    $nomor = $data["nomor_whatsapp"];
    $layanan = htmlspecialchars($data["layanan"]);
    $berat = $data["berat"];
    $catatan = $data["catatan"];
    $harga = $data["harga"];
    $total = $berat * $harga;
    $status = $data["status"];


    mysqli_query($conn, "UPDATE transaksi SET nama_customer = '$nama', nomor_whatsapp = $nomor, layanan = '$layanan', berat = $berat, catatan = '$catatan', harga_satuan = $harga, harga_total = $total, status = '$status' WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

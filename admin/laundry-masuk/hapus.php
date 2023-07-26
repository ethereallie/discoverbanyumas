<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }

    $id = $_GET["id"];
    
    if(hapus($id) > 0) {
        $_SESSION["status"] = "Pesanan Berhasil Dihapus!";
        header("Location: index.php");
    }
    else {
        $_SESSION["failed"] = "Pesanan Gagal Dihapus!";
        header("Location: index.php");
    }    
?>
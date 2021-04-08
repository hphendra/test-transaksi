<?php
$sql = new mysqli('localhost', 'root', '', 'test-transaksi');

// SELECT LAPORAN
$tanggal_laporan = '05/01/2020';
$select_laporan = $sql->query("SELECT * FROM `laporan` WHERE `tanggal`='$tanggal_laporan'");
$row_laporan = mysqli_fetch_assoc($select_laporan);

// SELECT TRANSAKSI
$select_transaksi = $sql->query("SELECT * FROM `transaksi`");

// EKSEKUSI
$omset = $row_laporan['omset'];
$total_quantity = $row_laporan['total_quantity'];
$tanggal = $row_laporan['tanggal'];

while ($row_transaksi = mysqli_fetch_assoc($select_transaksi)) {
    $quantity = $row_transaksi['quantity'];
    $nama_pelanggan = $row_transaksi['nama_pelanggan'];
    
    // CARI PERSEN DARI TOTAL QUANTITY
    $get_persen = $quantity / $total_quantity * 100;
    
    // TOTAL BELANJA
    $total_belanja = ($get_persen / 100) * $omset;

    // INSERT HISTORI
    $insert = $sql->query("INSERT INTO `history`(`nama_pelanggan`, `tanggal`, `total_belanja`) VALUES ('$nama_pelanggan', '$tanggal', '$total_belanja')");

    if ($insert) {
        header('location: index.php');
    }else {
        echo 'gagal coba cek database';
    }
}

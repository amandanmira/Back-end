<?php
$server   = "localhost";
$username = "root";
$password = "";
$database = "elektronik";

// bikin koneksi
$koneksi = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($koneksi->connect_errno) {
    exit("Koneksi gagal: " . $koneksi->connect_error);
}

// ambil data dari form
$nama        = $_POST['nama'] ?? '';
$harga       = $_POST['harga'] ?? '';
$kategori    = $_POST['kategori'] ?? '';
$spesifikasi = $_POST['spesifikasi'] ?? [];
$merek       = $_POST['merek'] ?? '';
$deskripsi   = $_POST['deskripsi'] ?? '';
$voucher         = $_POST['voucher'] ?? ''; 


$specText = is_array($spesifikasi) ? implode("; ", $spesifikasi) : $spesifikasi;


$hashedvoucher = password_hash($voucher, PASSWORD_DEFAULT);


$sql = "INSERT INTO produk (nama, harga, kategori, spesifikasi, merek, deskripsi, password) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$query = $koneksi->prepare($sql);
$query->bind_param("sisssss", $nama, $harga, $kategori, $specText, $merek, $deskripsi, $hashedvoucher);

// eksekusi query
if ($query->execute()) {
    echo "<h2>Data produk berhasil ditambahkan!</h2>";
} else {
    echo "Terjadi error: " . $query->error;
}

// tutup koneksi
$query->close();
$koneksi->close();

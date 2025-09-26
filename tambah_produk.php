<?php
require_once 'form.php';

$form = new Form('simpanproduk.php', 'Simpan Produk');

// Tambah styling biar lebih enak dilihat
echo "
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f6ff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    form {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        width: 400px;
    }
    h2 {
        text-align: center;
        color: #1e88e5;
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 6px;
    }
    input, select, textarea {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: 0.2s;
    }
    input:focus, select:focus, textarea:focus {
        border-color: #1e88e5;
        outline: none;
        box-shadow: 0 0 5px rgba(30,136,229,0.4);
    }
    input[type=checkbox] {
        width: auto;
        margin-right: 6px;
    }
    button, input[type=submit] {
        background: #1e88e5;
        color: #fff;
        font-weight: bold;
        padding: 10px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        transition: background 0.3s;
    }
    button:hover, input[type=submit]:hover {
        background: #1565c0;
    }
</style>
";

$form->addField('nama', 'Nama Produk:', 'text', [], true);
$form->addField('harga', 'Harga:', 'number', [], true);
$form->addField('kategori', 'Kategori:', 'select', ['Smartphone', 'Laptop', 'TV', 'Audio'], true);
$form->addField('spesifikasi', 'Spesifikasi:', 'checkbox', ['WiFi', 'Bluetooth', 'GPS', 'NFC']);
$form->addField('merek', 'Merek:', 'text', [], true);
$form->addField('deskripsi', 'Deskripsi:', 'textarea', [], true);
$form->addField('voucher', 'Voucher:', 'voucher', [], true); // tambahan voucher

$form->displayForm();

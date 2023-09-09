<?php

$host = 'localhost'; //127.0.0.1
$database_name = 'hitung_nilai'; // Buat database dengan nama 'hitung_nilai'
$database_username = 'root';
$database_password = '';

// Isi dari database hitung_nilai
// tabel 'nilai_mahasiswa'
// id, nama, matkul, grade, nilai

// Membuat koneksi menuju database
$mysqli = mysqli_connect($host, $database_username, $database_password, $database_name);

?>
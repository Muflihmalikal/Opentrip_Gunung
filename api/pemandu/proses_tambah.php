<?php
session_start();

require __DIR__ . '/../includes/koneksi.php';
$nama = trim($_POST['nama'] ?? '');
$lisensi = trim($_POST['lisensi'] ?? '');
$spesialis = trim($_POST['spesialis'] ?? '');
$foto = trim($_POST['foto'] ?? '');

$errors = [];
if ($nama === '') {
    $errors[] = "Nama pemandu wajib diisi.";
}
if ($lisensi === '') {
    $errors[] = "Nomor lisensi APGI wajib diisi.";
}
if ($spesialis === '') {
    $errors[] = "Spesialisasi gunung wajib diisi.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}
$stmt = $pdo->prepare(
    "INSERT INTO pemandu (nama, lisensi, spesialis, foto) 
     VALUES (:nama, :lisensi, :spesialis, :foto) 
     RETURNING id"
);

$stmt->execute([
    'nama'      => $nama,
    'lisensi'   => $lisensi,
    'spesialis' => $spesialis,
    'foto'      => $foto,
]);

$newId = $stmt->fetchColumn();

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Data pemandu berhasil ditambahkan.'];
header('Location: list.php');
exit;
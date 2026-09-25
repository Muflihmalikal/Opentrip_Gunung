<?php
session_start();

require __DIR__ . '/../includes/koneksi.php';

$judul      = trim($_POST['judul'] ?? '');
$ketinggian = trim($_POST['ketinggian'] ?? '');
$harga      = $_POST['harga'] ?? '';
$tanggal    = trim($_POST['tanggal'] ?? '');
$kuota      = $_POST['kuota'] ?? '';
$status     = trim($_POST['status'] ?? 'Buka');
$poster     = trim($_POST['poster'] ?? '');

$errors = [];
if ($judul === '') {
    $errors[] = "Judul paket wajib diisi.";
}
if ($ketinggian === '') {
    $errors[] = "Ketinggian gunung wajib diisi.";
}
if (!is_numeric($harga) || $harga <= 0) {
    $errors[] = "Harga harus berupa angka positif.";
}
if ($tanggal === '') {
    $errors[] = "Tanggal keberangkatan wajib diisi.";
}
if (!is_numeric($kuota) || $kuota <= 0) {
    $errors[] = "Kuota pendaki harus berupa angka positif.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO paket ("judul", "ketinggian", "harga", "tanggal", "kuota", "status", "poster") 
         VALUES (:judul, :ketinggian, :harga, :tanggal, :kuota, :status, :poster) 
         RETURNING id'
    );

    $stmt->execute([
        'judul'      => $judul,
        'ketinggian' => $ketinggian,
        'harga'      => (float) $harga,
        'tanggal'    => $tanggal,
        'kuota'      => (int) $kuota,
        'status'     => $status,
        'poster'     => $poster !== '' ? $poster : null,
    ]);

    $newId = $stmt->fetchColumn();

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Paket trip berhasil ditambahkan.'];
    header('Location: list.php');
    exit;
} catch (\PDOException $e) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal menyimpan ke database: ' . $e->getMessage()];
    header('Location: tambah.php');
    exit;
}

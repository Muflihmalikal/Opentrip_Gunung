<?php
$page_title = "Daftar Paket Trip";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';


$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarpaket = $pdo->query("SELECT * FROM paket ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="space-y-6">
    <?php if ($flash): ?>
        <p class="p-4 rounded-xl text-sm font-medium <?php echo $flash['type'] === 'success' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-red-50 text-red-800 border border-red-200'; ?>">
            <?php echo $flash['pesan']; ?>
        </p>
    <?php endif; ?>

    <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3 w-full sm:w-auto flex-1">
            <div class="relative w-full max-w-xs">
                <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>
                <input type="text" placeholder="Cari nama gunung / lokasi..." class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <select class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="">Semua Status</option>
                <option value="Buka">Buka</option>
                <option value="Full">Full</option>
            </select>
        </div>
        <a href="tambah.php" class="w-full sm:w-auto inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-4 py-2.5 rounded-lg transition shadow-sm">
            + Tambah Paket Trip Baru
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="p-4">POSTER</th>
                        <th class="p-4">GUNUNG & PAKET</th>
                        <th class="p-4">KETINGGIAN</th>
                        <th class="p-4">TANGGAL KEBERANGKATAN</th>
                        <th class="p-4">HARGA / PAX</th>
                        <th class="p-4">KAPASITAS</th>
                        <th class="p-4">STATUS</th>
                        <th class="p-4 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                   <?php foreach ($daftarpaket as $item): ?>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="p-4">
                                    <img src="<?php echo !empty($item['poster']) ? $item['poster'] : 'https://via.placeholder.com/60'; ?>" class="w-11 h-11 rounded-lg object-cover" alt="Poster">
                                </td>
                                <td class="p-4 font-bold text-slate-900"><?php echo $item['judul']; ?></td>
                                <td class="p-4 text-slate-600"><?php echo $item['ketinggian']; ?> mdpl</td>
                                <td class="p-4 text-slate-600"><?php echo date('d M Y', strtotime($item['tanggal'])); ?></td>
                                <td class="p-4 font-bold text-slate-900">Rp <?php echo number_format((float)$item['harga'], 0, ',', '.'); ?></td>
                                <td class="p-4 text-slate-600"><?php echo $item['terisi']; ?> / <?php echo $item['kuota']; ?> Pax</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $item['status'] === 'Buka' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'; ?>">
                                        <?php echo $item['status'] === 'Buka' ? 'Open' : $item['status']; ?>
                                    </span>
                                </td>
                                <td class="p-4 text-center space-x-1">
                                    <button class="p-1 hover:bg-slate-100 rounded text-slate-600" title="Edit">✏️</button>
                                    <button class="p-1 hover:bg-slate-100 rounded text-slate-600" title="Hapus">🗑️</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
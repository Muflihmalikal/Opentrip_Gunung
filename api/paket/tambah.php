<?php
$page_title = "Tambah Paket Trip";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section class="max-w-2xl mx-auto">
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-6">Tambah Paket Trip Baru</h2>

        <?php if ($flash): ?>
            <p class="p-4 mb-6 rounded-xl text-sm font-medium <?php echo $flash['type'] === 'success' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-red-50 text-red-800 border border-red-200'; ?>">
                <?php echo $flash['pesan']; ?>
            </p>
        <?php endif; ?>

        <form id="form-tambah" method="post" action="proses_tambah.php" class="space-y-5">
            <div>
                <label for="judul" class="block text-xs font-semibold text-slate-600 mb-1.5">Judul Paket Pendakian</label>
                <input type="text" id="judul" name="judul" required placeholder="Contoh: Exotic Mount Semeru & Ranu Kumbolo" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="ketinggian" class="block text-xs font-semibold text-slate-600 mb-1.5">Ketinggian (mdpl)</label>
                    <input type="text" id="ketinggian" name="ketinggian" required placeholder="3.676" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
                <div>
                    <label for="harga" class="block text-xs font-semibold text-slate-600 mb-1.5">Harga / Pax (Rp)</label>
                    <input type="number" id="harga" name="harga" required placeholder="1450000" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="tanggal" class="block text-xs font-semibold text-slate-600 mb-1.5">Tanggal Keberangkatan</label>
                    <input type="date" id="tanggal" name="tanggal" required class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
                <div>
                    <label for="kuota" class="block text-xs font-semibold text-slate-600 mb-1.5">Total Kuota Pendaki</label>
                    <input type="number" id="kuota" name="kuota" min="1" required placeholder="20" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="status" class="block text-xs font-semibold text-slate-600 mb-1.5">Status Pendaftaran</label>
                    <select id="status" name="status" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        <option value="Buka">Buka</option>
                        <option value="Full">Full</option>
                        <option value="Tutup">Tutup</option>
                    </select>
                </div>
                <div>
                    <label for="poster" class="block text-xs font-semibold text-slate-600 mb-1.5">URL Gambar / Poster</label>
                    <input type="url" id="poster" name="poster" placeholder="https://images.unsplash.com/..." class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="list.php" class="px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-semibold transition">Simpan Data</button>
            </div>
        </form>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
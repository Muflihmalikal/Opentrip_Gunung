<?php
$page_title = "Tambah Pemandu";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section class="max-w-xl mx-auto">
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-6">Tambah Data Trip Leader</h2>

        <?php if ($flash): ?>
            <p class="p-4 mb-6 rounded-xl text-sm font-medium <?php echo $flash['type'] === 'success' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-red-50 text-red-800 border border-red-200'; ?>">
                <?php echo $flash['pesan']; ?>
            </p>
        <?php endif; ?>

        <form id="form-tambah" method="post" action="proses_tambah.php" class="space-y-5">
            <div>
                <label for="nama" class="block text-xs font-semibold text-slate-600 mb-1.5">Nama Lengkap Pemandu</label>
                <input type="text" id="nama" name="nama" required placeholder="Contoh: Bambang 'Rimba' S." class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="lisensi" class="block text-xs font-semibold text-slate-600 mb-1.5">Nomor Lisensi APGI</label>
                    <input type="text" id="lisensi" name="lisensi" required placeholder="APGI #89210" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
                <div>
                    <label for="spesialis" class="block text-xs font-semibold text-slate-600 mb-1.5">Spesialisasi Gunung</label>
                    <input type="text" id="spesialis" name="spesialis" required placeholder="Spesialis Rinjani & Semeru" class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
            </div>

            <div>
                <label for="foto" class="block text-xs font-semibold text-slate-600 mb-1.5">URL Foto Profil</label>
                <input type="url" id="foto" name="foto" placeholder="https://images.unsplash.com/..." class="w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="list.php" class="px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-semibold transition">Simpan Data</button>
            </div>
        </form>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
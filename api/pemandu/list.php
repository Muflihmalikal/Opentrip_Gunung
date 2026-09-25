<?php
$page_title = "Daftar Pemandu";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarpemandu = $pdo->query("SELECT * FROM pemandu ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="space-y-6">
    <?php if ($flash): ?>
        <p class="p-4 rounded-xl text-sm font-medium <?php echo $flash['type'] === 'success' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-red-50 text-red-800 border border-red-200'; ?>">
            <?php echo $flash['pesan']; ?>
        </p>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <article class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-lg">💳</div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">PEMANDU BERSERTIFIKAT</span>
                <span class="text-base font-bold text-slate-800">8 Personel APGI</span>
            </div>
        </article>

        <article class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-lg">📦</div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">TOTAL PORTER LOKAL</span>
                <span class="text-base font-bold text-slate-800">24 Orang Standby</span>
            </div>
        </article>

        <article class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-red-100 text-red-700 flex items-center justify-center font-bold text-lg">🏥</div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">TIM EVAKUASI & MEDIS</span>
                <span class="text-base font-bold text-slate-800">4 Petugas PPGD</span>
            </div>
        </article>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h3 class="text-base font-bold text-slate-900">Daftar Trip Leader (Pemandu Utama)</h3>
            <a href="tambah.php" class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-4 py-2.5 rounded-lg transition shadow-sm">
                + Tambah Pemandu Baru
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($daftarpemandu as $guide): ?>
                <article class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm hover:shadow transition">
                    <img src="<?php echo !empty($guide['foto']) ? $guide['foto'] : 'https://via.placeholder.com/300x160'; ?>" alt="Foto Pemandu" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-slate-900 text-base leading-snug"><?php echo $guide['nama']; ?></h4>
                        <span class="text-xs font-semibold text-emerald-600 block mt-0.5 mb-2"><?php echo $guide['lisensi']; ?></span>
                        <span class="text-xs text-slate-500 block">📍 <?php echo $guide['spesialis']; ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
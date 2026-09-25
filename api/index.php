<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalPaket = $pdo->query("SELECT COUNT(*) FROM paket")->fetchColumn();
$totalPemandu = $pdo->query("SELECT COUNT(*) FROM pemandu")->fetchColumn();
$stmtPaket = $pdo->query("SELECT * FROM paket ORDER BY id DESC LIMIT 3");
$paketTerbaru = $stmtPaket->fetchAll();
?>
<section class="mb-8">
    <div class="bg-gradient-to-r from-emerald-900 to-slate-900 text-white rounded-2xl p-6 sm:p-8 shadow-sm">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang di SummitAdmin 🏔️</h2>
        <p class="text-slate-300 text-sm">Aplikasi sederhana untuk mengelola data paket trip pendakian gunung dan tim pemandu lapangan.</p>
    </div>
</section>

<section class="mb-8">
    <h2 class="text-lg font-bold text-slate-900 mb-4">Ringkasan</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <article class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Paket Trip</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2"><?php echo $totalPaket; ?></p>
        </article>
        <article class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Pemandu (TL)</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2"><?php echo $totalPemandu; ?></p>
        </article>
        <article class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Status Sistem</h3>
            <p class="text-3xl font-bold text-emerald-600 mt-2">Aktif</p>
        </article>
    </div>
</section>
<section class="mb-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-slate-900">Paket Trip Terbaru 🏔️</h2>
        <a href="paket/list.php" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 hover:underline">
            Lihat Semua Paket &rarr;
        </a>
    </div>

    <?php if (empty($paketTerbaru)): ?>
        <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center text-slate-500">
            Belum ada paket trip yang tersedia.
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($paketTerbaru as $paket): ?>
                <article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                    <div class="relative h-48 bg-slate-100">
                        <img src="<?php echo !empty($paket['poster']) ? htmlspecialchars($paket['poster']) : 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80'; ?>" 
                             alt="<?php echo htmlspecialchars($paket['judul']); ?>" 
                             class="w-full h-full object-cover">
                        <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-semibold text-white shadow-sm <?php echo ($paket['status'] ?? 'Buka') === 'Buka' ? 'bg-emerald-600' : 'bg-amber-600'; ?>">
                            <?php echo htmlspecialchars($paket['status'] ?? 'Buka'); ?>
                        </span>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="text-xs font-bold text-emerald-600 tracking-wider uppercase mb-1">
                                📍 <?php echo htmlspecialchars($paket['ketinggian']); ?> mdpl
                            </div>
                            <h3 class="font-bold text-slate-900 text-base leading-snug">
                                <?php echo htmlspecialchars($paket['judul']); ?>
                            </h3>
                            <p class="text-xs text-slate-500 mt-2">
                                📅 Keberangkatan: <span class="font-medium text-slate-700"><?php echo date('d M Y', strtotime($paket['tanggal'])); ?></span>
                            </p>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Mulai Dari</span>
                                <span class="text-base font-extrabold text-slate-900">
                                    Rp <?php echo number_format((float)$paket['harga'], 0, ',', '.'); ?>
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Kuota</span>
                                <span class="text-xs font-semibold text-slate-800">
                                    <?php echo $paket['terisi'] ?? 0; ?>/<?php echo $paket['kuota']; ?> Pax
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
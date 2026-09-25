<?php
session_start();

$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
$__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__jobsheetRoot))), '/');
$base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SummitAdmin<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            500: '#10b981',
                            600: '#009669',
                            700: '#047857',
                        }
                    }
                }
            }
        }
    </script>
    <script src="<?php echo $base; ?>js/app.js" defer></script>
</head>

<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">
    <header class="bg-slate-900 text-white sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="<?php echo $base; ?>index.php" class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-emerald-600 rounded-lg flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M12 2L2 22h20L12 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-base leading-none text-white">SummitAdmin</span>
                        <span class="text-[10px] font-semibold tracking-wider text-emerald-400 mt-0.5">OPEN TRIP MANAGER</span>
                    </div>
                </a>
                <nav class="hidden md:flex items-center gap-1">
                    <a href="<?php echo $base; ?>index.php" class="px-3 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">Beranda</a>
                    <a href="<?php echo $base; ?>paket/list.php" class="px-3 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">Daftar Paket Trip</a>
                    <a href="<?php echo $base; ?>pemandu/list.php" class="px-3 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">Daftar Pemandu</a>
                </nav>
                <button type="button" id="nav-toggle-btn" class="md:hidden p-2 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 focus:outline-none" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800 bg-slate-900 px-4 pt-2 pb-4 space-y-1">
            <a href="<?php echo $base; ?>index.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">Beranda</a>
            <a href="<?php echo $base; ?>paket/list.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">Daftar Paket Trip</a>
            <a href="<?php echo $base; ?>pemandu/list.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">Daftar Pemandu</a>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto p-4 sm:p-6 lg:p-8">
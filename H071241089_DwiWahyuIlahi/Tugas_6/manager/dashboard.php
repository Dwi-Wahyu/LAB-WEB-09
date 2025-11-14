<?php
// 1. Sertakan file cek login
include '../cek_login.php';

// 2. Cek apakah role-nya = manager
if ($_SESSION['role'] != 'manager') {
    // Jika bukan manager, tendang ke halaman login
    header("location: ../login.php?error=aksesditolak");
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Project Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-green-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Manajemen Proyek - Manager</h1>
            <div>
                <span class="mr-4">Halo, <strong><?php echo htmlspecialchars($username); ?></strong>!</span>
                <a href="../logout.php" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8 mt-6">
        <h2 class="text-3xl font-bold mb-4">Dashboard Project Manager</h2>
        <p class="text-gray-700">Selamat datang! Di sini Anda bisa mengelola proyek dan tugas tim Anda.</p>
        
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-2">Proyek Saya</h3>
                <p class="text-sm text-gray-600 mb-4">Lihat, tambah, dan edit proyek yang Anda kelola.</p>
                <a href="proyek_saya.php" class="text-green-600 hover:underline">Pergi ke halaman ></a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-2">Tugas Tim</h3>
                <p class="text-sm text-gray-600 mb-4">Buat dan tugaskan task untuk anggota tim Anda.</p>
                <a href="kelola_tugas.php" class="text-green-600 hover:underline">Pergi ke halaman ></a>
            </div>
        </div>
    </div>

</body>
</html>
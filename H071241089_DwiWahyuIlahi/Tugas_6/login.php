<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Proyek</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Login Sistem</h2>
        
        <?php
        // ---- BLOK BARU UNTUK MENAMPILKAN ERROR ----
        if (isset($_GET['error'])) {
            $error_msg = '';
            if ($_GET['error'] == 'password') {
                $error_msg = 'Password yang Anda masukkan salah.';
            } elseif ($_GET['error'] == 'username') {
                $error_msg = 'Username tidak ditemukan.';
            } elseif ($_GET['error'] == 'invalidrole') {
                $error_msg = 'Role pengguna tidak valid.';
            } else {
                $error_msg = 'Terjadi kesalahan. Silakan coba lagi.';
            }
            
            // Tampilkan pesan error dengan styling Tailwind
            echo '<div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-md text-sm">';
            echo htmlspecialchars($error_msg);
            echo '</div>';
        }
        // ---- AKHIR BLOK BARU ----
        ?>
        
        <form action="proses_login.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                           focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                           focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div>
                <button 
                    type="submit" 
                    class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium 
                           text-white bg-blue-600 hover:bg-blue-700 
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    Login
                </button>
            </div>
            
        </form>
    </div>

</body>
</html>
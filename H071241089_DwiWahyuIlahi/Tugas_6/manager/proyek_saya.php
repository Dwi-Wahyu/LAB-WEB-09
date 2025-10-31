<?php
// 1. Sertakan file cek login & koneksi
include '../cek_login.php';
include '../koneksi.php';

// 2. Cek Role Manager
if ($_SESSION['role'] != 'manager') {
    header("location: ../login.php?error=aksesditolak");
    exit;
}

// 3. Ambil data dari session
$username = $_SESSION['username'];
$manager_id = $_SESSION['user_id']; // ID manager yang sedang login

// 4. Query untuk mengambil proyek milik manager ini
// Kita pakai LEFT JOIN ke tabel 'tasks' untuk menghitung jumlah tugas
// dan tugas yang sudah 'selesai'
$sql = "SELECT 
            p.id, 
            p.nama_proyek, 
            p.deskripsi, 
            p.tanggal_mulai, 
            p.tanggal_selesai,
            COUNT(t.id) AS jumlah_tugas,
            SUM(CASE WHEN t.status = 'selesai' THEN 1 ELSE 0 END) AS tugas_selesai
        FROM 
            projects p
        LEFT JOIN 
            tasks t ON p.id = t.project_id
        WHERE 
            p.manager_id = ?
        GROUP BY
            p.id, p.nama_proyek, p.deskripsi, p.tanggal_mulai, p.tanggal_selesai
        ORDER BY
            p.tanggal_mulai DESC";

$stmt = $koneksi->prepare($sql);
if ($stmt === false) {
    die("Error persiapan query: " . $koneksi->error);
}

$stmt->bind_param("i", $manager_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Saya - Project Manager</title>
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
        
        <div class="flex justify-between items-center mb-6">
            <a href="dashboard.php" class="text-green-600 hover:underline">&larr; Kembali ke Dashboard</a>
            <a href="tambah_proyek.php" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-sm">
                + Buat Proyek Baru
            </a>
        </div>

        <h2 class="text-3xl font-bold mb-5">Proyek Saya</h2>
        
        <?php
        if (isset($_GET['status'])) {
            $status_msg = '';
            $bg_color = 'bg-green-100 border-green-400 text-green-700'; // Default sukses
            if ($_GET['status'] == 'sukses_tambah') {
                $status_msg = 'Proyek baru berhasil ditambahkan.';
            } elseif ($_GET['status'] == 'sukses_update') {
                $status_msg = 'Data proyek berhasil diperbarui.';
            } elseif ($_GET['status'] == 'sukses_hapus') {
                $status_msg = 'Proyek berhasil dihapus.';
            } elseif ($_GET['status'] == 'gagal_hapus') {
                $status_msg = 'Gagal menghapus proyek. Pastikan semua tugas di dalamnya sudah dihapus, atau terjadi error: ' . (isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '');
                $bg_color = 'bg-red-100 border-red-400 text-red-700';
            }
            
            if ($status_msg) {
                echo '<div class="mb-4 p-3 ' . $bg_color . ' border rounded-md text-sm">';
                echo $status_msg;
                echo '</div>';
            }
        }
        ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <?php
            if ($result->num_rows > 0) {
                // Loop data proyek
                while($row = $result->fetch_assoc()) {
                    
                    // Hitung persentase progress
                    $progress = 0;
                    if ($row['jumlah_tugas'] > 0) {
                        $progress = ($row['tugas_selesai'] / $row['jumlah_tugas']) * 100;
                    }
            ?>
            
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800"><?php echo htmlspecialchars($row['nama_proyek']); ?></h3>
                    
                    <p class="text-sm text-gray-600 mb-4 h-20 overflow-y-auto">
                        <?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?>
                    </p>
                    
                    <div class="text-sm text-gray-500 mb-4">
                        <p><strong>Mulai:</strong> <?php echo date("d M Y", strtotime($row['tanggal_mulai'])); ?></p>
                        <p><strong>Selesai:</strong> <?php echo date("d M Y", strtotime($row['tanggal_selesai'])); ?></p>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-sm font-medium text-gray-700 mb-1">
                            Progress Tugas (<?php echo $row['tugas_selesai']; ?>/<?php echo $row['jumlah_tugas']; ?>)
                        </p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-green-600 h-2.5 rounded-full" style="width: <?php echo $progress; ?>%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5 border-t pt-4 flex justify-end space-x-2">
                    <a href="edit_proyek.php?id=<?php echo $row['id']; ?>" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                    <span class="text-gray-300">|</span>
                    <a href="proses_proyek.php?action=hapus&id=<?php echo $row['id']; ?>" 
                       class="text-sm text-red-600 hover:text-red-900 font-medium"
                       onclick="return confirm('Apakah Anda yakin ingin menghapus proyek \'<?php echo htmlspecialchars(addslashes($row['nama_proyek'])); ?>\'?\nSEMUA TUGAS di dalamnya akan ikut terhapus (CASCADE).');">
                       Hapus
                    </a>
                    <a href="kelola_tugas.php?project_id=<?php echo $row['id']; ?>" class="ml-auto bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-md text-sm font-medium">
                        Lihat Tugas &rarr;
                    </a>
                </div>
            </div>
            <?php
                }
            } else {
                // Jika tidak ada data
                echo '<div class="col-span-full bg-white p-6 rounded-lg shadow-md text-center text-gray-500">';
                echo 'Anda belum mengelola proyek apapun. Silakan buat proyek baru.';
                echo '</div>';
            }
            ?>
            
        </div>
        
    </div>

</body>
</html>

<?php
// 5. Tutup statement dan koneksi
$stmt->close();
$koneksi->close();
?>
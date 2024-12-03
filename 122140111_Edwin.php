<?php
// Koneksi ke database
$host = "localhost"; // Alamat server database
$user = "root"; // Username untuk database
$password = ""; // Password untuk database
$database = "data_mahasiswa"; // Nama database

$conn = new mysqli($host, $user, $password, $database); // Membuat koneksi ke database

// Cek koneksi
if ($conn->connect_error) { // Mengecek apakah koneksi berhasil
    die("Koneksi gagal: " . $conn->connect_error); // Jika gagal, tampilkan pesan error dan hentikan eksekusi
}

// Konfigurasi paginasi
$limit = 10; // Jumlah baris data yang akan ditampilkan per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Mendapatkan nomor halaman dari URL, default halaman pertama
$offset = ($page - 1) * $limit; // Menghitung posisi awal data berdasarkan halaman

// Query untuk mengambil data
$query = "SELECT * FROM mahasiswa LIMIT $limit OFFSET $offset"; // Query untuk mengambil data mahasiswa dengan batasan (pagination)
$result = $conn->query($query); // Eksekusi query

// Query untuk menghitung total data
$totalQuery = "SELECT COUNT(*) AS total FROM mahasiswa"; // Query untuk menghitung jumlah total data
$totalResult = $conn->query($totalQuery); // Eksekusi query untuk total data
$totalRow = $totalResult->fetch_assoc(); // Mendapatkan hasil sebagai array asosiatif
$totalData = $totalRow['total']; // Jumlah total data
$totalPages = ceil($totalData / $limit); // Menghitung jumlah halaman yang diperlukan (dibulatkan ke atas)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css"> <!-- Menghubungkan dengan file CSS -->
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> <!-- Header kolom untuk ID -->
                <th>Nama</th> <!-- Header kolom untuk Nama -->
                <th>Nilai</th> <!-- Header kolom untuk Nilai -->
                <th>Email</th> <!-- Header kolom untuk Email -->
                <th>Alamat</th> <!-- Header kolom untuk Alamat -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Menampilkan data
            if ($result->num_rows > 0) { // Jika terdapat data
                while ($row = $result->fetch_assoc()) { // Ambil setiap baris data sebagai array asosiatif
                    echo "<tr>
                        <td>{$row['id']}</td> <!-- Menampilkan ID mahasiswa -->
                        <td>{$row['nama']}</td> <!-- Menampilkan Nama mahasiswa -->
                        <td>{$row['nilai']}</td> <!-- Menampilkan Nilai mahasiswa -->
                        <td>{$row['email']}</td> <!-- Menampilkan Email mahasiswa -->
                        <td>{$row['alamat']}</td> <!-- Menampilkan Alamat mahasiswa -->
                    </tr>";
                }
            }

            // Tambahkan baris kosong jika data kurang dari $limit
            $emptyRows = $limit - $result->num_rows; // Menghitung jumlah baris kosong yang perlu ditambahkan
            for ($i = 0; $i < $emptyRows; $i++) { // Loop untuk menambahkan baris kosong
                echo "<tr>
                    <td>&nbsp;</td> <!-- Kolom kosong untuk ID -->
                    <td>&nbsp;</td> <!-- Kolom kosong untuk Nama -->
                    <td>&nbsp;</td> <!-- Kolom kosong untuk Nilai -->
                    <td>&nbsp;</td> <!-- Kolom kosong untuk Email -->
                    <td>&nbsp;</td> <!-- Kolom kosong untuk Alamat -->
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Paginasi -->
    <div class="pagination">
        <?php if ($page > 1): ?> <!-- Jika halaman saat ini lebih dari 1, tampilkan tombol Previous -->
            <a href="?page=<?php echo $page - 1; ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?> <!-- Loop untuk membuat tombol halaman -->
            <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>"> <!-- Tandai halaman aktif -->
                <?php echo $i; ?> <!-- Menampilkan nomor halaman -->
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?> <!-- Jika halaman saat ini kurang dari total halaman, tampilkan tombol Next -->
            <a href="?page=<?php echo $page + 1; ?>">Next</a>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Tutup koneksi
$conn->close(); // Menutup koneksi ke database
?>

<?php
include 'index.php';

// Ambil nilai ID dari parameter URL dan lakukan validasi
$detail_id = $_GET['ID'] ?? null;

if (!$detail_id || !is_numeric($detail_id)) {
    die("Invalid ID parameter.");
}

// Query untuk mengupdate status pengaduan
$sql_update = "UPDATE pengaduan SET status = CASE 
                WHEN status = 0 THEN 1
                WHEN status = 1 THEN 0
              END
              WHERE ID = $detail_id";

// Eksekusi query update
if ($conn->query($sql_update) === TRUE) {
    // Redirect kembali ke halaman DetailPengaduan.php dengan parameter ID
    header("Location: DetailPengaduan.php?ID=$detail_id");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>


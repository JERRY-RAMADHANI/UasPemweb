<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "uas_pemweb";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mendapatkan data kepala keluarga dan informasi rumah
$sql = "SELECT k.Alamat, w.Nama as Kepala_Keluarga, w.No_Telp 
        FROM keluarga k
        JOIN warga w ON k.Kepala_ID = w.ID";
$result = $conn->query($sql);

$rumah = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rumah[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

// Mengirim data dalam format JSON
header('Content-Type: application/json');
echo json_encode($rumah);
?>
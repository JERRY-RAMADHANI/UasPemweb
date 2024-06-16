<?php
session_start();
include 'db_connection.php';

// submit pengaduan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $waktu = $_POST['waktu'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $status = 0; 

        $sql = "INSERT INTO pengaduan (Judul, Subject, status, Waktu, User_ID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisi", $judul, $isi, $status, $waktu, $user_id);

        if ($stmt->execute()) {
            $response = array('status' => 'success', 'message' => 'Laporan berhasil dikirim!');
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal mengirim laporan.');
        }

        $stmt->close();
    } else {
        $response = array('status' => 'error', 'message' => 'User tidak terautentikasi.');
    }

    $conn->close();

    echo json_encode($response);
    exit;
}

// ambil data
$sql = "SELECT * FROM pengaduan ORDER BY ID DESC";
$result = $conn->query($sql);

$reports = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reports[] = array(
            'Judul' => $row['Judul'],
            'Subject' => $row['Subject'],
            'status' => $row['status'],
            'Waktu' => $row['Waktu']
        );
    }
}

$conn->close();

echo json_encode($reports);
?>

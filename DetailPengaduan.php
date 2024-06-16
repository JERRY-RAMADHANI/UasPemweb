<?php
include 'index.php';

// Ambil nilai ID dari parameter URL dan lakukan validasi
$detail_id = $_GET['ID'] ?? null;

if (!$detail_id || !is_numeric($detail_id)) {
    die("Invalid ID parameter.");
}

// Query SQL menggunakan prepared statement
$sql = "SELECT pengaduan.*, warga.Nama
        FROM pengaduan
        JOIN user ON user.ID = pengaduan.User_ID
        JOIN keluarga ON keluarga.ID = user.Keluarga_ID
        JOIN warga ON keluarga.ID = warga.Keluarga_ID
        WHERE keluarga.Kepala_ID = warga.ID
        AND pengaduan.ID = ?";

// Persiapkan statement SQL menggunakan prepared statement
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare statement failed: " . $conn->error);
}

// Bind parameter ID ke statement
$stmt->bind_param("i", $detail_id);

// Eksekusi statement
if ($stmt->execute()) {
    // Ambil hasil dari statement
    $result = $stmt->get_result();

    // Tutup statement
    $stmt->close();
} else {
    // Jika ada kesalahan saat eksekusi statement
    die("Execute statement failed: " . $stmt->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Pengaduan</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="#">Sistem Management Aduan Warga</a></div>
            <ul class="nav-ul">
                <li><a href="#">Aduan</a></li>
                <li><a href="#">List Rumah</a></li>
                <li><a href="#">List Staff</a></li>
                <li><a href="#" class="text-danger">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <!--  -->

    <!-- TABLE -->
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row["Nama"]) ?></td>
                            <td><?= htmlspecialchars($row["Judul"]) ?></td>
                            <td><?= htmlspecialchars($row["Waktu"]) ?></td>
                            <td>
                                <?php
                                if ($row["status"] == 0) {
                                    echo "Belum Terverifikasi";
                                } elseif ($row["status"] == 1) {
                                    echo "Telah Terverifikasi";
                                } else {
                                    echo htmlspecialchars($row["status"]);
                                }
                                ?>
                            </td>
                            <td>
                                <a href="verifikasi.php?ID=<?= $row["ID"] ?>"  class="btn <?php echo $row["status"] == 1 ? 'btn-danger' : 'btn-primary'; ?>" >
                                    <?php
                                    if ($row["status"] == 0) {
                                        echo "Verifikasi";
                                    } elseif ($row["status"] == 1) {
                                        echo "Batalkan";
                                    } else {
                                        echo "Aksi";
                                    }
                                    ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($result->num_rows == 0) : ?>
                        <tr>
                            <td colspan='5'>Tidak ada data ditemukan</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--  -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

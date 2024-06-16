<?php
include 'index.php';


$sql = "SELECT * from staff";

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="#">Sistem Menegement aduan warga</a></div>
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
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row["Username"]) ?></td>
                            <td><?= htmlspecialchars($row["Role"]) ?></td>
                            <td>
                                <a href="DetailPengaduan.php?ID=<?= $row["ID"] ?>" class="btn btn-primary">Aksi</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($result->num_rows == 0) : ?>
                        <tr>
                            <td colspan='5'>Tidak ada data ditemukan</td>
                        </tr>
                    <?php endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rO1ClqaXqi41Ru9mjqD8wA+P7k8oh30tsNRJm3BIaIg7nLPF8nhrUj9rOe+y4F8O" crossorigin="anonymous"></script>
</body>

</html>
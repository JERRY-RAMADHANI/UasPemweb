<?php
include 'index.php';


$sql = "SELECT * FROM berita";

$result = $conn->query($sql);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- NAVBAR -->
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="HomeUser.php">Sistem Menegement aduan warga</a></div>
            <ul class="nav-ul">
                <li><a href="HomeUser.php">Home</a></li>
                <li><a href="pageprofil.php">Profile</a></li>
                <li><a href="user.html">Aduan</a></li>
                <li><a href="login.html" class="text-danger">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <!--  -->

    <!-- Berita -->
    <section class="mt-5">
    <div class="container">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                $counter = 0;
                while($row = $result->fetch_assoc()) {
                    if ($counter % 3 == 0 && $counter != 0) {
                        echo '</div><div class="row">';
                    }
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="background.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['Judul']; ?></h5>
                                <p class="card-text"><?php echo $row['Subject']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++;
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
</section>
    <!--  -->

    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-auto">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">


            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Pemberitahuan
                        </h6>
                        <p>
                            Bila ada situasi mendadak atau perlu bantuan anda dapat menghubungi salah satu staff komplek
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Nama
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">pak Bambang</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Pak Anton</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Bu siti</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Bu lina</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Pak Rahmat</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Pak aji</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            TUGAS
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">RW</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">RT</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">SEKERTARIS</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">BENDAHARA</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">SECURITY</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">SECURITY</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">KONTAK</h6>
                        <p> 312312312424123</p>
                        <p> 123123123123123 </p>
                        <p> 312312312424123</p>
                        <p> 123123123123123 </p>
                        <p> 312312312424123</p>
                        <p> 123123123123123 </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->


    </footer>
    <!--  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rO1ClqaXqi41Ru9mjqD8wA+P7k8oh30tsNRJm3BIaIg7nLPF8nhrUj9rOe+y4F8O" crossorigin="anonymous"></script>
</body>

</html>
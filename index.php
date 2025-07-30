<?php
session_start();
require_once "database.php";
$pdo = new database();

// Jika user sudah login, arahkan ke dashboard
if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
    header("Location: dashboard.php");
    exit;
}

// Ambil daftar harga
$rows = $pdo->getHarga();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAUNDRY U9</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/dataTables.bootstrap4.min.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="bootstrap/jquery.dataTables.min.js"></script>
    <script src="bootstrap/dataTables.bootstrap4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKtmUDqFDJ8-D3F0nJM4bpiD4hAR-fzeo"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php"><p style="font-size:30px;"><b>Laundry U9</b></p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#how-to-order">Tutorial Order</a>
                <a class="nav-item nav-link active" href="#daftar-harga">Daftar Harga</a>
                <a class="nav-item nav-link active" href="#faq">FAQ</a>
                <a class="nav-item nav-link active" href="#hubungi-kami">Hubungi Kami</a>
                <a class="btn btn-primary btn-lg" href="signup.php"><b>Daftar</b></a>
                <a class="btn btn-outline-success active" href="login.php"><b>Login</b></a>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner text-center">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/laundry1.jpg">
                <div class="carousel-caption">
                    <h6><img src="images/img1.png" width="350px"> </h6>
                    <h1 class="display-4 text-light bg-dark"><b>Selamat Datang di Laundry OnLine</b></h1>
                    <h1 class="text-light bg-dark">Solusi cuci setiap hari</h1>
                    <h6><a class="btn btn-primary btn-lg" href="signup.php" role="button">Daftar Sekarang</a></h6>
                </div>
            </div>
            <div class="carousel-item"><img class="d-block w-100" src="images/laundry.jpg"></div>
            <div class="carousel-item"><img class="d-block w-100" src="images/laundry2.jpg"></div>
            <div class="carousel-item"><img class="d-block w-100" src="images/laundry3.jpg"></div>
            <div class="carousel-item"><img class="d-block w-100" src="images/laundry5.jpg"></div>
            <div class="carousel-item"><img class="d-block w-100" src="images/laundry6.jpg"></div>
        </div>
    </div>

    <!-- Tutorial Order -->
    <hr id="how-to-order">
    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container">
            <div class="tengah">
                <h1 class="display-4">Tutorial Order</h1>
                <p class="lead">Pengen Order? yuk simak cara dibawah ini.</p>
                <hr class="my-4">
                <div class="row">
                    <div class="col-sm text-center">
                        <img src="images/img3.png" width="135px">
                        <h5>Daftar</h5>
                        <p>Pelanggan mendaftarkan dirinya pada website, dan melakukan pemesanan</p>
                    </div>
                    <div class="col-sm text-center">
                        <img src="images/img4.png" width="100px">
                        <h5>Pengambilan</h5>
                        <p>Pihak kami akan mengambil barang yang akan di laundry</p>
                    </div>
                    <div class="col-sm text-center">
                        <img src="images/img5.png" width="108px">
                        <h5>Pencucian</h5>
                        <p>Pencucian baju sesuai pemesanan</p>
                    </div>
                    <div class="col-sm text-center">
                        <img src="images/img6.png" width="100px">
                        <h5>Pengantaran</h5>
                        <p>Barang akan dikirim kembali ke rumah Anda</p>
                    </div>
                    <div class="col-sm text-center">
                        <img src="images/img7.png" width="160px">
                        <h5>Pembayaran</h5>
                        <p>Pembayaran bisa dilakukan secara Cash on Delivery</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Harga -->
    <hr id="daftar-harga">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="tengah">
                <h1 class="display-4">Daftar Harga</h1>
                <p class="lead">Berikut ini merupakan daftar harga yang tersedia, murah!</p>
                <hr class="my-4">
                <table id="pagination" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['harga'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <hr id="faq">
    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container">
            <h1 class="display-4">Frequently Asked Questions</h1>
            <p class="lead">Yang sering ditanyakan pelanggan</p>
            <hr class="my-4">
            <h3>Bagaimana saya dapat menggunakan layanan Laundry Online?</h3>
            <p>Gunakan melalui website resmi Laundry Online yang dapat diakses di Laundryu9.shop</p>
            <h3>Bagaimana Cara Order Laundry Online?</h3>
            <p>Pilih lokasi penjemputan & pengembalian, pilih layanan, buat order, dan bayar. Laundry akan diantar ke alamatmu.</p>
            <h3>Apa saja layanan yang disediakan oleh Laundry Online?</h3>
            <p>Jenis layanan: Cuci kiloan dan satuan.</p>
        </div>
    </div>

    <!-- Hubungi Kami -->
    <hr id="hubungi-kami">
    <div class="jumbotron jumbotron-fluid bg-dark text-white">
        <div class="container">
            <h1 class="display-4">Hubungi Kami!</h1>
            <p class="lead">Kami selalu tersedia untuk Anda.</p>
            <hr class="my-4 bg-white">
            <div class="row">
                <div class="col-sm">
                    <h4><b>Alamat kami :</b></h4>
                    <p>Bukit Baru, Kec. Ilir Bar. I, Kota Palembang, Sumatera Selatan</p>
                    <h4><b>Nomor Telepon :</b></h4>
                    <p>(0411) 227 1XX XX</p>
                    <h4><b>Follow Us! :</b></h4>
                    <!-- <p><img src="images/img11.png" width="40px"><a href="https://instagram.com/laundryu9" class="text-white"> LaundryOnlineGowa</a></p> -->
                     <p><img src="images/img11.png" width="55px"> Laundryu9</p>
                    <p><img src="images/img8.png" width="55px"> Laundry U9</p>
                    <p><img src="images/img9.png" width="63px"> @laundryu9</p>
                </div>
                <div class="col-sm">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.396755031237!2d104.6956906737409!3d-2.987257139848536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75003ef0010d%3A0xf827978a2da20cba!2sLaundry%20u9!5e0!3m2!1sid!2sid!4v1746943095407!5m2!1sid!2sid" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small bg-white text-center py-3">
        <a href="https://laundryonlinemks.com/"> Laundry U9</a>
    </footer>

    <!-- Script -->
    <script>
        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-5.2266391, 119.4978739),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var peta = new google.maps.Map(document.getElementById("googleMaps"), propertiPeta);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-5.2266391, 119.4978739),
                map: peta,
                animation: google.maps.Animation.BOUNCE
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        $(document).ready(function () {
            $('#pagination').DataTable();
        });
    </script>
</body>
</html>

<?php
    include 'koneksi.php';
    if ($_SESSION) {
        $nama = $_SESSION["nama"];
        
    }
    else 
        header("Location: login.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
</head>
<body>
    <?php include 'layout/navbar.php';?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/sunset2.jpg" class="d-block w-100" alt="Fist slide">
          <div class="carousel-caption d-none d-md-block">
            <p class="display-4" style=" color:white;
                                        text-align:center;
                                        margin-top:-500px;
                                        font-size:60px;">Selamat datang di <strong>Loketku,</strong></p>
            <hr class="my-4" style="border-color:#fbffc1;width:70px;border-width:4px">
            <p class="lead"style="color:white;font-size:20px;">Loketku merupakan situs jual beli tiket speed boat terbaik dibali. Speed boat menjadi salah satu solusi transportasi laut yang banyak digunakan masyarakat untuk melakukan perjalanan antar pulau, Apakah kalian merasa kesulitan untuk mencari tiket menuju Gili Trawangan dan Nusa Penida? Tenang kita punya solusinya dengan e-Ticket dari Loketku hanya dengan klik-klik saja kalian sudah bisa memesan tiket. Untuk memesan tiket bisa klik tombol cari tiket dibawah ini. </p>
            <a class="btn btn-warning btn-lg" href="caritiket.php" role="button">Cari Tiket</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/gili.jpg" class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="margin-top:-440px;">Gili Trawangan.</h1>
            <p>Keindahan dan eksotisnya Gili ini mampu menandingi eksotisnya pulau Bali. Salah satu gili Lombok ini juga memiliki beberapa daya tarik sehingga keindahannya bisa menandingi Pulau Bali.Gili Lombok ini juga terkenal dengan panorama pantai yang menawan dan eksotis. Sejauh mata anda memandang, anda pasti akan terpukau dengan panorama langit biru, air laut yang berkilau, dan garis pantai dengan hamparan pasir putihnya. Bukan hanya itu, apabila anda mengunjungi Gili Trawangan ini, anda dapat menikmati sensasi sunrise dan sunset yang indah dalam satu hari. Ini dikarenakan pantai Gili Trawangan menghadap ke barat maupun timur.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/nusa.jpg" class="d-block w-100" alt="Third Slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="margin-top:-440px;">Nusa Penida.</h1>
            <p>Nusa Penida merupakan salah satu destinasi utama di Bali. Pulau ini terkenal dengan pantai-pantainya yang masih alami, tebing-tebing spektakuler, dan panorama perbukitan. Nusa Penida kini tidak hanya jadi favorit bagi wisatawan lokal, tetapi juga primadona bagi wisatawan mancanegara.Dinusa penida terdapat pantai yang eksotis dan sangat menjadi sasaran bagi para wisatawan, tempat ini juga instragamabble, penasaran? diantaranya yaitu ada Angels Billabong, Pantai Klingking dan Broken Beach. disini juga terdapat tempat wisata menarik lainnya yang tidak kalah keren yaitu bukit teletubies dan lain lain.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
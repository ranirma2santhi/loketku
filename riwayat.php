<?php
include 'koneksi.php';

$email = $_SESSION['email'];
$nama = $_SESSION['nama'];

//DATA USER

$data= $koneksi->query("SELECT * FROM user WHERE email = '$email'");
$diri= $data->fetch_assoc();
$userID = $diri ['userID'];
?>

<!DOCTYPE html>
<html lang="eng">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/caritiket.css">
    <title>Riwayat Booking</title>
</head>
<body>
<?php include 'layout/navbar.php' ?>
<div class="container">
<div class="warna">

<h5 class="text-center">Riwayat Booking <?php echo $nama ?></h5>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Booking ID</th>
            <th>Kapal ID</th>
            <th>Tanggal Pemesanan</th>
            <th>Waktu</th>
            <th>Rute</th>
            <th>Nama Dermaga</th>
            <th>Jumlah Tiket</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ambil = $koneksi->query("SELECT `bookingID`, `kapalID`, `tgl_pemesanan`, `waktu`, `rute`, `nama_dermaga`, `jumlah`, `hargaTot`,`status` FROM `booking` WHERE userID = '$userID'");
        $nomor=1;
        while ( $row = $ambil ->fetch_assoc()){?>
        <tr>
            <td><?php echo "$nomor"; ?></td>
            <td><?php echo$row['bookingID']; ?></td>
            <td><?php echo $row['kapalID']; ?></td>
            <td><?php echo $row['tgl_pemesanan']; ?></td>
            <td><?php echo $row['waktu']; ?></td>
            <td><?php echo $row['rute']; ?></td>
            <td><?php echo $row['nama_dermaga']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
            <td><?php echo $row['hargaTot']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php $nomor++; } ?>
    </tbody>
</table>
    
    &nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-primary">Kembali</a></td>
</div>
</div>
<?php include 'layout/footer.php'; ?>
</body>
</html>
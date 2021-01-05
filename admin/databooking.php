<?php
include 'koneksi.php';
if ($_SESSION) {
    $nama = $_SESSION["nama"];
}
else 
    header("Location: ../login.php");
$result = mysqli_query($koneksi,"SELECT bookingID, kapalID, userID, email, tgl_pemesanan, waktu,rute,nama_dermaga, jumlah, hargaTot, status FROM booking LEFT JOIN USER USING (userID) ORDER BY bookingID ASC;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../assets/datab.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>On Admin-Data Transaksi Booking</title>
</head>
<body>
<?php include '../layout/sidebar.php' ?>
<div class="container">
<div class="warna">
<br><h4 class="text-center"><strong>DATA TRANSAKSI BOOKING</strong></h4>
<table class="table" style="width:100%;margin-top:20px;">
<thead>
    <tr>
    <th>BookingID</th>
    <th>Kapal ID</th>
	<th>User Id</th>
    <th>Email</th>
	<th>Tanggal Booking</th>
    <th>Waktu</th>
    <th>Rute</th>
    <th>Nama Dermaga</th>
    <th>Jumlah tiket</th>
    <th>Harga Total</th>
    <th>Status</th>
    <th>     </th>
    </tr>
</thead>
<tbody>
    <?php
    $no =1;
    foreach($result as $row) :
    ?>
    <tr><?php $no++;?> 
        <td><?php echo $row['bookingID'];?></td>
        <td><?php echo $row['kapalID'];?></td>
        <td><?php echo $row['userID'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['tgl_pemesanan'];?></td>
        <td><?php echo $row['waktu'];?></td>
        <td><?php echo $row['rute'];?></td>
        <td><?php echo $row['nama_dermaga'];?></td>
        <td><?php echo $row['jumlah'];?></td>
        <td><?php echo $row['hargaTot'];?></td>
        <td><?php echo $row['status'];?></td>
        <td><a href="detailBooking.php?bookingID=<?= $row["bookingID"]; ?>" class="btn btn-warning">Detail</a></td>
    </tr>
    <?php
    endforeach
    ?>
</tbody>
</table>
</div>
</div>
</body>
</html>
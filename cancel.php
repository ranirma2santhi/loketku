<?php
include 'koneksi.php';
$bookingID= $_SESSION['bookingID'];
$data= $koneksi->query("SELECT * FROM booking WHERE bookingID = '$bookingID'");
$cancel= $data->fetch_assoc();
$bookingID = $cancel ['bookingID'];

mysqli_query($koneksi, "DELETE FROM booking WHERE bookingID = '$bookingID'");
header("Location: index.php");

?>
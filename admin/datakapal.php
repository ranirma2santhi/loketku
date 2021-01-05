<?php
require '../function.php';
if ($_SESSION) {
    $nama = $_SESSION["nama"];
}
else 
    header("Location: ../login.php");
    

$result = mysqli_query($koneksi, "SELECT * FROM kapal ORDER BY kapalID DESC;");

if (isset($_POST["cari"])){
    $result = cariKapal($_POST["kunci"]);
}

//konfigurasi pagination 
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="../assets/admin.css" >
        <title>On Admin-Data Kapal</title>
</head>
<body>
<?php include '../layout/sidebar.php' ?>
<div class="container">
<div class="warna">
<br><h4 class="text-center"><strong>DATA KAPAL LOKETKU</strong></h4>
<form action="" method="POST">
<br>
<!--TAMBAH KAPAL-->
<center><a href="tambahKapal.php" class="btn btn-success">+&nbsp;Tambah Kapal</a></center>
<br>
<br>
<div class="row">
    <div class="col-md-20">
        <div class="form-group">
        <input type="text" name="kunci" size="40" autofocus autocomplete="off" placeholder="Masukkan keywoard pencarian">
        <button type="search" name="cari">Cari</button>
        </div>
    </div>
</div>
    
</form>

<table class="table" style="width:100%;margin-top:20px;">
		<thead>
		<tr>
            <th>No</th>
            <th>ID Kapal</th>
            <th>Jenis</th>
		    <th>Waktu Berangkat</th>
		    <th>Harga</th>
            <th>Kapasitas</th>
            <th>Jumlah tiket</th>
            <th>Rute</th>
            <th>Nama Dermaga</th>
            <th>Foto</th>
            <th>Action</th>
		</tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        
        foreach ($result as $row) :
        ?>
            <tr><td><?php echo $no++;?></td>
                <td><?php echo $row['kapalID'];?></td>
                <td><?php echo $row['jenis'];?></td>
                <td><?php echo $row['waktu'];?></td>
                <td><?php echo $row['harga'];?></td>
                <td><?php echo $row['kapasitas'];?></td>
                <td><?php echo $row['jml_tiket'];?></td>
                <td><?php echo $row['rute'];?></td>
                <td><?php echo $row['nama_dermaga'];?></td>
                <td><img src="../foto/<?php echo $row ['foto'];?>" width="150"></td>
                <td><a href="updateKapal.php?kapalID=<?= $row["kapalID"]; ?>" class="btn btn-warning">Update</a></td>
                <td><a href="hapusKapal.php?kapalID=<?= $row["kapalID"]; ?>" class="btn btn-warning">Hapus</a></td>
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

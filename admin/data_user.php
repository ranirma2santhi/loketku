<?php
require '../function.php';
if ($_SESSION) {
    $nama = $_SESSION["nama"];
}else {
    header("Location: ../login.php");
}



$result = mysqli_query($koneksi, "SELECT userID,nama,email,alamat,noTelp,jenis_kelamin, tingkatan_user FROM USER LEFT JOIN detailuser USING (userID) ORDER BY userID DESC");

if (isset($_POST["cari"])){
    $result = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="../assets/admin.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>On Admin-Data User</title>
</head>
<body>
<?php include '../layout/sidebar.php' ?>
<div class="container">
<div class="warna">
<br><h4 class="text-center"><strong>DATA USER LOKETKU</strong></h4>
<br>
<form action="" method="POST">
<div class="row">
    <div class="col-md-20">
        <div class="form-group">
        <input type="text" name="keyword" size="40" autofocus autocomplete="off" placeholder="Masukkan keywoard pencarian">
        <button type="search" name="cari">Cari</button>
        </div>
    </div>
</div>
    
</form>
<table class="table" style="width:100%;margin-top:10px;">
		<thead>
		<tr>
            <th>No</th>
            <th>ID User</th>
            <th>Nama</th>
		    <th>Email</th>
		    <th>Alamat</th>
		    <th>Nomor Seluler</th>
            <th>Jenis Kelamin</th>
            <th>AS</th>
		</tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        
        foreach ($result as $row) :
        ?>
            <tr><td><?php echo $no++;?></td>
                <td><?php echo $row['userID'];?></td>
                <td><?php echo $row['nama'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['alamat'];?></td>
                <td><?php echo $row['noTelp'];?></td>
                <td><?php echo $row['jenis_kelamin'];?></td>
                <td><?php echo $row['tingkatan_user'];?></td>
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

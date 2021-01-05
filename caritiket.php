<?php
include 'koneksi.php';
if ($_SESSION) {
    $nama = $_SESSION["nama"];
}
else {
    header("Location: login.php");

}
   
    $rute = "";
    $dermaga = "";

    if (isset ($_POST['cari'])){
        $rute = $_POST['rute'];
        $dermaga = $_POST['dermaga'];
    }
        
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
        <!--<link rel="stylesheet" type="text/css" href="assets/caritiket.css">-->
        
        <!--<script src="assets/js/jquery-1.11.3.min.js"></script>-->
       <!-- <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css"/>--> 
        <link rel="stylesheet" href="assets/caritiket.css" type="text/css"/>   
        <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">     
       
        <title>Cari Tiket</title>
    </head>
    <body>
    <?php include 'layout/navbar.php' ?>
    <div class="container">
        <div class="warna">
            <h4 class="alert alert-primary text-center">Booking tiket dengan kapal pilihanmu disini</h4>

            <form action=" " method="POST">

         <div class="row">  
        <div class="col-md-3">
               <div class="form-group">
                <label>Dermaga Keberangkatan</label>
                  <i class="fa fa-ship"></i>
                   <select name="dermaga" id = "dermaga" class="form-control">
                   <option value="-"> -Choose- </option>
                   <option value="Sanur Bay" <?php  if ($dermaga == "Sanur Bay"){ echo "selected"; } ?>>Sanur Bay</option>
                   <option value="Gili Bay" <?php if ($dermaga == "Gili Bay"){ echo "selected"; } ?>>Gili Bay</option>
                   </select>
               </div>
               </div>
          
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tujuan</label>
                    <i class="fa fa-ship"></i>
                    <select name="rute" id = "rute" class="form-control">
                    <option value="-"> -Choose- </option>
                    <option value="Gili Terawangan" <?php if ($rute=="Gili Terawangan"){ echo "selected"; } ?>>Gili Terawangan</option>
                    <option value="Nusa Penida" <?php if ($rute=="Nusa Penida"){ echo "selected"; } ?>>Nusa Penida</option>
                    </select>
                </div>
            </div>
          

            <!--<div class="col-md-3">
                <div class="form-group">
                    <label>Tanggal Keberangkatan</label>
                    <br><input type="date" name="tgl_pemesanan" id="tgl_pemesanan" class="form-control">
                </div>
            </div> -->

            
            <div class="col-md-3">
                <div class="form-group">
                    <button id = "search" name="cari" class="btn alert-info" style="margin-top: 30px;">CARI KAPAL</button>
                </div>
            </div>
        </div>
        

           
        </form>
        <br>

        <div class="row">
            <?php 
                $search_rute = '%'. $rute .'%';
                $search_keyword = '%'. $dermaga .'%';

                $no = 1;
                $query = "SELECT * FROM kapal WHERE rute LIKE ? AND nama_dermaga LIKE ?";
                $dewan1 = $koneksi->prepare($query);
                $dewan1->bind_param('ss', $search_rute, $search_keyword);
                $dewan1->execute();
                $res1 = $dewan1->get_result();

                if ($res1->num_rows > 0){
                    while ($row = $res1->fetch_assoc()) {
                        $kapalID = $row ['kapalID'];
                       $jenis = $row ['jenis'];
                       $foto = $row ['foto'];
                       $waktu = $row ['waktu'];
                       $rute = $row ['rute'];
                       $nama_dermaga = $row ['nama_dermaga'];
                       $harga = $row ['harga'];
                       $kapasitas = $row ['kapasitas']; 
                       $tiket = $row ['jml_tiket']; 
            ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="foto/<?php echo $foto;?>" width="260" height="160">
                        <div class="caption">
                            <h4><?php echo $jenis; ?></h4>
                            <h7>Jam berangkat <?php echo $waktu; ?></h7><br>
                            <h7>Tujuan: <?php echo $rute?></h7><br>
                            <h7>Dermaga Keberangkatan: <?php echo $nama_dermaga; ?></h7><br>
                            <h7>Rp. <?php echo number_format($harga);?></h7><br>
                            <h7>Kapasitas: <?php echo $kapasitas; ?></h7><br>
                            <h7>Jumlah Tiket Tersedia: <?php echo $tiket; ?></h7><br>
                            <a href="booking.php?id=<?php echo $kapalID;?> " class="btn btn-primary">BOOKING</a>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                     </div>
                </div>
            <?php }}else {
                echo "Tiket Perjalanan Anda Tidak Tersedia"; 
            } ?>
   </div>
    </div>

    <?php include 'layout/footer.php';?>
    </body>
</html>

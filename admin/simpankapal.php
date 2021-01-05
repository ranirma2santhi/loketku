<?php
include '../koneksi.php';
 
    $kapalID = htmlspecialchars($_POST['kapalID']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $rute = htmlspecialchars($_POST['rute']);
    $nama_dermaga = htmlspecialchars($_POST['nama_dermaga']);
    $harga = htmlspecialchars($_POST['harga']);
    $kapasitas =htmlspecialchars ($_POST['kapasitas']);  
    $jml_tiket = htmlspecialchars($_POST['jml_tiket']); 
    $foto = $_FILES ['foto']['name'];
    if($foto != "") {
        $ekstensi_diperbolehkan = array ('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $foto); 
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];   
        $angka_acak  = rand(1,999);
        $fotobaru = $angka_acak.'-'.$foto; 
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                      move_uploaded_file($file_tmp,'../foto/'.$fotobaru);
                        $query = "INSERT INTO kapal (kapalID, jenis, waktu, rute, nama_dermaga, harga, kapasitas, jml_tiket, foto) VALUES ('$kapalID', '$jenis', '$waktu', '$rute', '$nama_dermaga', '$harga', '$kapasitas', '$jml_tiket', '$fotobaru')";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                 " - ".mysqli_error($koneksi));
                        }else {
                            echo "
                                    <script>
                                        alert('data berhasil ditambah!');
                                        document.location.href = 'datakapal.php';
                                    </script>
                                ";
                        }
            }
}else {
                $query = "INSERT INTO kapal (kapalID, jenis, waktu, rute, nama_dermaga, harga, kapasitas, jml_tiket) VALUES ('$kapalID', '$jenis', '$waktu', '$rute', '$nama_dermaga', '$harga', '$kapasitas', '$jml_tiket' )";
                               $result = mysqli_query($koneksi, $query);
                               
                               if(!$result){
                                   die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                               } else {
                        
                                 echo "<script>alert('Data berhasil ditambah.');window.location='datakapal.php';</script>";
                               }
    }

?>
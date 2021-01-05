 <?php
 include 'koneksi.php';

 function edit($data){
     global $koneksi;
     $nama = htmlspecialchars($data['nama']);
     $alamat =htmlspecialchars( $data['alamat']);
     $email =htmlspecialchars( $data['email']);
     $noTelp =htmlspecialchars( $data['noTelp']);
     $password =md5($data['password']);
     $update = "UPDATE user INNER JOIN detailuser ON detailuser.userID = user.userID SET  nama = '$nama',alamat = '$alamat', noTelp = '$noTelp',PASSWORD = '$password' WHERE email = '$email'";
     mysqli_query($koneksi, $update); 
     return mysqli_affected_rows($koneksi);
    }

// FUNCTION-----DATA USER DI ADMIN---///
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows [] =$row;
    }
    return $rows;
}
function cari($keyword){
    $query = "SELECT userID,nama,email,alamat,noTelp,jenis_kelamin, tingkatan_user FROM USER LEFT JOIN detailuser USING (userID) WHERE nama LIKE '%$keyword%' OR userID LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jenis_kelamin LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR tingkatan_user LIKE '%$keyword%' ORDER BY userID ASC ";
    return query($query);
}

// FUNCTION-----DATA KAPAL DI ADMIN---///
function cariKapal($kunci){
    $query = "SELECT kapalID, jenis, waktu, rute,nama_dermaga,harga,kapasitas,jml_tiket,foto FROM kapal WHERE kapalID LIKE '%$kunci%' OR jenis LIKE '%$kunci%' OR waktu LIKE '%$kunci%' OR harga LIKE '%$kunci%' OR kapasitas LIKE '%$kunci%' OR rute LIKE '%$kunci%' OR nama_dermaga LIKE '%$kunci%'";
    return query($query);
}

function editKapal ($upKapal){
    global $koneksi;
    $kapalID = $upKapal['kapalID'];
    $jenis = $upKapal['jenis'];
    $waktu = $upKapal['waktu'];
    $rute = $upKapal['rute'];
    $nama_dermaga = $upKapal['nama_dermaga'];
    $harga = $upKapal['harga'];
    $kapasitas = $upKapal['kapasitas'];  
    $jml_tiket = $upKapal['jml_tiket']; 
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
                        $query = "UPDATE kapal SET jenis = '$jenis', waktu = '$waktu', rute = '$rute', nama_dermaga = '$nama_dermaga', harga = '$harga', kapasitas = '$kapasitas', jml_tiket = '$jml_tiket', foto = '$fotobaru' WHERE kapalID = '$kapalID'";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                 " - ".mysqli_error($koneksi));
                        }else {
                            echo "<script>alert('Data berhasil diubah.');window.location='datakapal.php';</script>";
                        }
            }
    }else{
        $query = "UPDATE kapal SET jenis = '$jenis', waktu = '$waktu', rute = '$rute', nama_dermaga = '$nama_dermaga', harga = '$harga', kapasitas = '$kapasitas', jml_tiket = '$jml_tiket' WHERE kapalID = '$kapalID'";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_error($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {

          echo "<script>alert('Data berhasil diubah.');window.location='datakapal.php';</script>";
      }

    }
}

function Hapus ($kapalID){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM kapal WHERE kapalID = '$kapalID'");
    return mysqli_affected_rows($koneksi);
}

function updateBooking($data){
    global $koneksi;
    $bookingID = htmlspecialchars($data['booking_ID']);
    $tgl_transaksi = htmlspecialchars($data['tgl_transaksi']);
    $jumlah_tiket =htmlspecialchars( $data['jumlah_tiket']);
    $harga =htmlspecialchars( $data['harga']);
    $hargaTot =htmlspecialchars( $data['harga_Tot']);
    $bayar =$data['bayar'];
    $status = $data['status'];
    $update = "UPDATE detailbooking LEFT JOIN booking ON detailbooking.booking_ID = booking.bookingID SET tgl_transaksi = '$tgl_transaksi', jumlah_tiket = '$jumlah_tiket', harga = '$harga', harga_Tot = '$hargaTot', bayar = '$bayar', status = '$status' WHERE booking_ID = '$bookingID'";
    mysqli_query($koneksi, $update); 
    return mysqli_affected_rows($koneksi);
}

?>
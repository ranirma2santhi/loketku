<?php
require '../function.php';

$kapalID = $_GET["kapalID"];

if (Hapus($kapalID) > 0) {
    echo "
                <script>
                    alert('data berhasil dihapus!');
                    document.location.href = 'datakapal.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal dihapus!');
                    document.location.href = 'datakapal.php';
                </script>
            ";
    }

?>
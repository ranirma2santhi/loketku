<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  
</head>
<body>
  <ul id="slide-out" class="sidenav" style="background-color:darkslategrey">
  <?php if ($_SESSION) : ?>
  <h4 style="color:cornsilk" >ADMINISTRATOR LOKETKU</h4>
    <a><?php echo $nama; ?></a> <?php endif ?>
      <div class="divider"></div>
    </li>
    <br>
    <li><h6 ><a href="dashboard.php" style="color:bisque;"><i class="small material-icons">home</i>&nbsp;&nbsp;HOME</a></h6></li>
    <li><h6 ><a href="data_user.php" style="color: bisque"><i class="small material-icons">event_note</i>&nbsp;DATA USER</a></h6></li>
    <li><h6 ><a href="datakapal.php" style="color: bisque"><i class="small material-icons">event_note</i>&nbsp;DATA KAPAL</a></h6></li>
    <li><h6 ><a href="#" style="color: bisque"><i class="small material-icons">phonelink</i>&nbsp;DATA TRANSAKSI</a></h6></li>
    <li><h6 ><a href="../logout.php" style="color: bisque"><i class="small material-icons"></i>&nbsp;LOGOUT</a></h6></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.sidenav').sidenav();
    });
  </script>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="theme-color" content="#378DE5">
<title>Cybernetwork Cek Status</title>
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Gafata|Nobile:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
<link rel="icon" href="assets/images/favicon.png" type="image/png">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/cus/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/cus/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="assets/cus/plugins/datatables/dataTables.bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700" rel="stylesheet" type="text/css">
</head>
<body>
<?php
 include "db.php";
?>
<div class="main">
<div id="particles"></div>
<div class="login-form">
	<img src="assets/images/wifi.png" height=150px width=150px/>	
	</br><h2>Cek Status</h2>
	<?php
    $timezone  = 7;
    $date = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("I")));
    if(isset($_POST['username'])){
      $u=$_POST['username'];
      $a=mysqli_query($conn,"SELECT * FROM userinfo WHERE username = '$u'");
      if(mysqli_num_rows($a)>0){
        $a1=mysqli_query($conn,"SELECT * FROM struk WHERE username = '$u'");
        $a2=mysqli_fetch_array($a1);
        $a5=mysqli_fetch_array($a);
        $a3=mysqli_query($conn,"SELECT * FROM radusergroup WHERE username = '$u' AND groupname != 'daloRADIUS-Disabled-Users'");
        $dat = date("Y-m-d H:i:s",strtotime ('-5 days',strtotime ($a2['habis'])));

        if(mysqli_num_rows($a3)>0){
          if($a2['habis'] < $date){
            echo '<div class="alert alert-danger"><strong>Mohon Maaf! </strong> Hai, <b>'.$a5['firstname'].' '.$a5['lastname'].'</b> Akun anda telah diblokir, silahkan membayar sebesar <b>'; 
              if($a2['tagihan'] == "Gratis"){
                echo "Gratis";
              }else{
                echo 'Rp'.$a2['tagihan'].',-';
              }
              echo '</b> ke rekening kami yang bisa anda lihat pada <a href="#sk" style="color:yellow; text-decoration:none" data-toggle="modal"><b>Syarat & Ketentuan</b></a> kami.<br>Silahkan Klik <p><a href="confirm.php?un='.$u.'" class="btn btn-success" style="text-decoration:none" >Konfirmasi Pembayaran</a></p> untuk melakukan upload bukti pembayaran atau dengan melakukan pembayaran secara langsung ke alamat <b style="color:yellow">Jl. Sumbersari Gg 1B No. 29</b> dengan nama admin <b style="color:#378DE5">Galeh Fatma E. A</b></div>';
          }else{
            echo '<div class="alert alert-success">Hai, <b>'.$a5['firstname'].' '.$a5['lastname'].'</b> Akun anda sudah aktif, masa aktif akun sampai tanggal <b style="color:red;">'.date("d/m/Y H:i:s", strtotime($a2['habis'])).'</b>, ';
            if($date >= $dat && $date <= $a2['habis']){
              echo 'pemberitahuan tagihan selanjutnya sebesar <b style="color:red;">'; 
              if($a2['tagihan'] == "Gratis"){
                echo "Gratis";
              }else{
                echo 'Rp'.$a2['tagihan'].',-';
              }
              echo '</b>, akun akan otomatis diblokir oleh sistem setelah masa aktif sudah habis, ';
            }
            echo ' jika ingin mengganti password anda silahkan klik <br><a class="btn btn-warning" style="text-decoration:none" href="forget.php">Ganti Password</a></div>';
          }
        }elseif($a2['habis'] < $date){
          echo '<div class="alert alert-danger"><strong>Mohon Maaf! </strong>Hai, <b>'.$a5['firstname'].' '.$a5['lastname'].'</b> Akun anda telah diblokir, silahkan membayar sebesar <b>'; 
              if($a2['tagihan'] == "Gratis"){
                echo "Gratis";
              }else{
                echo 'Rp'.$a2['tagihan'].',-';
              }
              echo '</b> ke rekening kami yang bisa anda lihat pada <a href="#sk" style="color:yellow; text-decoration:none" data-toggle="modal"><b>Syarat & Ketentuan</b></a> kami.<br>Silahkan Klik <p><a href="confirm.php?un='.$u.'" class="btn btn-success" style="text-decoration:none" >Konfirmasi Pembayaran</a></p> untuk melakukan upload bukti pembayaran atau dengan melakukan pembayaran secara langsung ke alamat <b style="color:yellow">Jl. Sumbersari Gg 1B No. 29</b> dengan nama admin <b style="color:#378DE5">Galeh Fatma E. A</b></div>';
        }else{
          echo '<div class="alert alert-danger"><strong>Username Terblokir!</strong> Akun anda belum bisa digunakan untuk sementara waktu, tunggu konfirmasi dari admin, konfirmasi akan dikirimkan melalui email anda.</div>';
        }
      }else{
        echo '<div class="alert alert-danger"><strong>Mohon Maaf!</strong> Username tidak ditemukan</div>';
      }
    } 
  ?>
    <form action="" method="post">
      <input class="formm" type="text" name="username" placeholder="Username" required><br> 
      <input class="btn-login" type="submit" value="Cek Status Anda"/><br>
      <br>
      <a href="http://cybernetwork.co.id/login">Kembali ke Login</a>
      <br>
      <br>
		  <p>&copy; 2016 - <?php echo date("Y");?> <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a> <br> <a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p>		
	  </form>

</div>
</div>
<div id="sk" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Syarat & Ketentuan</h4>
      </div>
      <div class="modal-body">
        <p>1. Anda dapat mengakses internet saat anda sudah melakukan konfirmasi pembayaran dan juga sudah dikonfirmasi oleh admin.</p>
        <p>2. Anda dapat mengakses internet selama satu bulan sejak anda melakukan konfirmasi pembayaran, setelah waktu habis maka akun otomatis terblokir oleh sistem.</p>
        <p>3. Jika sudah memasuki H-5 sebelum masa aktif habis, maka akan muncul pemberitahuan tagihan yang harus dibayarkan pada fitur cek status, paket yang disediakan bersifat <b style="color:red">Unlimited</b> atau <b style="color:red">Bebas Kuota</b>, dan besarnya tagihan setiap paket adalah sebagai berikut : <br>
        <?php
          $mk=mysqli_query($conn,"SELECT * FROM radgroupreply WHERE tampilkan = '1'");
          while ($mk1=mysqli_fetch_assoc($mk)) {
            echo "<b>".$mk1['groupname']." = Rp. ".$mk1['harga'].",-</b><br>";
          }
        ?></p>
        <p>4. Anda bisa mengakses internet selama berada di area jangkauan wifi <b style="color:#378DE5">Cybernetwork</b>.</p>
        <p>5. Konfirmasi pembayaran bisa anda bayarkan melalui transfer ATM pada nomor rekening BNI <b>0387020617</b> atas nama <b>Galeh Fatma Eko Ardiansa</b> atau dengan melakukan pembayaran secara langsung ke alamat <b style="color:#378DE5">Jl. Sumbersari Gg 1B No. 29</b> dengan nama admin <b>Galeh Fatma E. A</b></p>
        <p>6. Jika anda mengalami masalah koneksi anda dapat menghubungi admin via Whatsapp <i class="fa fa-whatsapp fa-fw"></i> 085852924304 atau email <i class="fa fa-envelope fa-fw"></i> galeh.fatma@gmail.com</p>
      </div>
    </div>

  </div>
</div>
</body>
<script src="assets/js/par.js"></script>
<script src="assets/js/jquery.particleground.js"></script>
<script src="assets/cus/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="assets/cus/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/cus/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/cus/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="assets/cus/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/cus/plugins/fastclick/fastclick.js"></script>
<script src="assets/cus/dist/js/app.min.js"></script>
<script src="assets/cus/dist/js/demo.js"></script>
<script type="text/javascript">
  $("#aa").fadeTo(5000, 500).slideUp(500, function(){
    $("#aa").slideUp(500);
  });
</script>
<script>
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
  };
</script>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="theme-color" content="#378DE5">
<title>Cybernetwork Lupa Password</title>
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
	</br><h2>Masukkan Pin</h2>
	  <?php 
      if (isset($_GET['un'])){ 
        $un=$_GET['un'];
        $mk=mysqli_query($conn,"SELECT * FROM userinfo WHERE username  = '$un'");
        $mk1=mysqli_fetch_array($mk);
        $em=$mk1['email'];
        $jml=4;
        $bfo=4;
        $sn=mb_substr($em, $bfo, $jml);
        $em1=explode($sn, $em);
        $em2=$em1[0].'****'.$em1[1];
        if(mysqli_num_rows($mk)>0){
          if(isset($_GET['pin'])){
            if($_GET['pin'] == 'no'){
              echo '<div class="alert alert-danger" id="aa">Pin yang anda masukkan salah</div>';
            }
          }else{
            echo '<div class="alert alert-info">Hai <b>'.$mk1['firstname'].' '.$mk1['lastname'].'</b>, Pin konfirmasi anda akan dikirmkan melalui email <b style="color:red;">'.$em2.'</b>, silahkan cek email anda dan masukkan 8 digit pin yang anda terima pada form isian dibawah ini.</div>';
          }
        }else{
          header("location:forget.php?uname=no");
        }
      }elseif(!isset($_GET['un'])){
        header("location:forget.php?uname=no");
      } 

    ?>
    <form action="cek.php?pinres=yes" method="post">
    <?php
      if(isset($_GET['un'])){
        $ik=$_GET['un'];
        echo '<input type="hidden" name="username" value="'.$ik.'"/>';
      }else{
         header("location:forget.php?uname=no");
      }
    ?>

    <input class="formm" type="text" name="pin" placeholder="Masukkan Pin" required><br> 
    <input class="btn-login" type="submit" value="Kirim"/><br>
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

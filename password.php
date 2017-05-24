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
	</br><h2>Ubah Password</h2>
    <?php 
        if(isset($_GET['password'])){
          if($_GET['password'] == 'yes'){
            echo '<div class="alert alert-success">Password anda sudah berhasil diganti, jika anda sudah login maka anda harus logout terlebih dahulu.</div>
            <a class="btn btn-block btn-primary" href="http://cybernetwork.co.id/login">Login</a>
            <form>
            <p>&copy; 2016 - '.date("Y").' <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a><br><a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p></form>';
          }else{
            $pin=$_GET['pin'];
            if(!isset($_GET['un'])){
    			header("location:forget.php?uname=no");
    		}else{
    			$unn=$_GET['un'];
    			$mm=mysqli_query($conn,"SELECT * FROM pin WHERE username = '$unn' AND random = '$pin'");
    			if(mysqli_num_rows($mm) == 0){
    				header("location:pin.php?pin=no&un=$unn");
    			}
    		}
    		if(isset($_GET['pass'])){
    			if($_GET['pass'] == "sama"){
    				echo '<div class="alert alert-danger" id="aa">Password yang anda masukkan sama dengan password lama anda</div>';
    			}
    		} 
    		$unn=$_GET['un'];
            $mk=mysqli_query($conn,"SELECT * FROM pin WHERE random = '$pin'");
            if(mysqli_num_rows($mk)>0){
              echo '<form action="simpan.php?passwd=yes&pin='.$pin.'&un='.$unn.'" method="post">
                  <input class="formm" type="password" name="pass" placeholder="Password Baru"><br> 
                    <input class="formm" type="password" name="pass1" placeholder="Ulangi Password"><br> 
                    <input class="button-daftar" type="submit" value="Ubah Password"/><br>
                    
                    <br>
                    <p>&copy; 2016 - '.date("Y").' <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a><br><a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p>    
                  </form>';
            }else{
              echo '<div class="alert alert-danger">Pin yang anda masukkan salah, untuk mengulagi proses reset password klik <a href="forget.php">ulangi kembali</a></div><br><form>
                <p>&copy; 2016 - <?php echo date("Y");?> <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a><br><a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p></form>';
            }
          }
        }else{
          if(!isset($_GET['pin'])){
            header("location:forget.php?pin=no");
          }  
          $pin=$_GET['pin'];
          	if(!isset($_GET['un'])){
    			header("location:forget.php?uname=no");
    		}else{
    			$unn=$_GET['un'];
    			$mm=mysqli_query($conn,"SELECT * FROM pin WHERE username = '$unn' AND random = '$pin'");
    			if(mysqli_num_rows($mm) == 0){
    				header("location:pin.php?pin=no&un=$unn");
    			}
    		}

    		$unn=$_GET['un']; 
          $mk=mysqli_query($conn,"SELECT * FROM pin WHERE random = '$pin'");
          if(mysqli_num_rows($mk)>0){
            echo '<form action="simpan.php?passwd=yes&pin='.$pin.'&un='.$unn.'" method="post">';
            if(isset($_GET['pass'])){
    			if($_GET['pass'] == "sama"){
    				echo '<div class="alert alert-danger" id="aa">Password yang anda masukkan sama dengan password lama anda</div>';
    			}
    		}
            ?>
              <input class="formm" type="password" name="pass" id="pass1" placeholder="Password Baru" required><br> 
              <input class="formm" type="password" name="pass1" id="pass2" placeholder="Ulangi Password" required onkeyup="checkPass(); return false;"/>
              <span id="pesan"></span><br> 
              <input class="button-daftar" type="submit" value="Ubah Password"/><br>
              <br>
          		<p>&copy; 2016 - <?php echo date("Y");?> <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a><br><a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p>		
          	</form>
        <?php
          }else{
              echo '<div class="alert alert-danger">Pin yang anda masukkan salah, untuk mengulagi proses reset password klik <a href="forget.php">ulangi kembali</a></div><br><form>
                  <p>&copy; 2016 - <?php echo date("Y");?> <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a><br><a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p></form>';
            }
          }
      ?>

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
<script type="text/javascript">
function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var pesan = document.getElementById('pesan');
    var salah = "#ffdbdb";
    var ps = "red";
    var pb = "#fff";

    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = pb;
        pesan.innerHTML = ""

    }else{
        pass2.style.backgroundColor = salah;
        pesan.style.color = ps;
        pesan.innerHTML = "Password TIDAK sama!"
    }
}  
</script>
</html>

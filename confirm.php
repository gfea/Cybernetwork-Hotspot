<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="theme-color" content="#378DE5">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<title>Cybernetwork Konfirmasi</title>
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
<link href="http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700" rel="stylesheet" type="text/css">
<style type="text/css">
  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
</head>
<body>
<?php
 include "db.php";
?>
<div class="main">
<div id="particles"></div>
<div class="login-form">
	<img src="assets/images/wifi.png" height=150px width=150px/>	
	</br><h2> Konfirmasi Pembayaran</h2>
	<?php
	echo '<form action="simpan.php?foto=yes" method="post" enctype="multipart/form-data">';	
        if(isset($_GET['reg'])){
          	if ($_GET['reg'] == 'yes'){
            	if(isset($_GET['un'])){
              		$unn=$_GET['un'];
              		$s=mysqli_query($conn,"SELECT * FROM struk WHERE username = '$unn'");
              		if(mysqli_num_rows($s)>0){
                		$s1=mysqli_fetch_array($s);
                		$p=$s1['tagihan'];
                		echo '<div class="alert alert-success"><strong>Selamat!</strong> anda sudah terdaftar sebagai member kami dan silahkan melakukan pembayaran sebesar <b style="color:red;">Rp'.$p.',-</b>, tunggu <b>konfirmasi</b> dari admin untuk bisa menggunakan layanan internet kami, untuk metode pembayaran silahkan baca <b><a data-toggle="modal" href="#sk">Syarat & Ketentuan</a></b></div>';
              		}else{
                		echo '<div class="alert alert-danger" id="aa"><strong>Gagal!</strong> Username tidak ditemukan</div>';
              		}
            	}else{
              		echo '<div class="alert alert-danger" id="aa"><strong>Gagal!</strong> Username tidak ditemukan</div>';
            	}
            	echo '<div class="alert alert-info">Silahkan Upload bukti pembayaran anda dengan menekan tombol Upload Struk</div>';
				if(isset($_GET['un'])){
            $iu=$_GET['un'];
            $io=mysqli_query($conn,"SELECT * FROM userinfo WHERE username = '$iu'");
            if(mysqli_num_rows($io)==0){
              echo '<input class="formm" type="text" name="username" placeholder="Username" required><br> ';
            }else{
              echo '<input class="formm" type="text" name="username" placeholder="Username" value="'.$_GET['un'].'" required><br>';
            }
				}else{
				    echo '<input class="formm" type="text" name="username" placeholder="Username" required><br> ';
				}
				echo '<div class="fileUpload btn btn-success">
				      <span><i class="fa fa-upload fa-fw"></i> Pilih File</span>
				      <input type="file" class="upload" id="uploadBtn" name="fileToUpload" required />
				    </div>
				      <input id="uploadFile" class="formm" placeholder="Nama Foto" disabled="disabled" />
				    <input class="button-daftar" type="submit" value="Upload"/><br><br>';
          	}else{
            	echo '<div class="alert alert-danger"><strong>Gagal!</strong> Pendaftaran gagal, silahkan cek data anda kembali, masukkan data anda dengan benar</div>';
            	echo '<a href="http://10.1.1.4" class="btn btn-warning btn-block">Daftar</a><br>';
          	}
        }elseif(isset($_GET['conf'])){
	          	if($_GET['conf'] == "yes"){
	            	echo '<div class="alert alert-success"><strong>Berhasil!</strong> Bukti pembayaran berhasil diupload ke server, tunggu konfirmasi dari admin, jika anda tidak bisa login, maka bukti pembayaran anda belum dikonfirmasi admin.</div>';
	            	echo '<a href="http://cybernetwork.co.id/login" class="btn btn-primary btn-block">Login</a><br>';
	          	}elseif($_GET['conf'] == 'no'){
                if(isset($_GET['un'])){
                  if($_GET['un'] == 'no'){
                    echo '<div class="alert alert-danger" id="aa"><strong>Gagal!</strong> Username tidak ditemukan</div>';
                  }
                }
	          		if(isset($_GET['a'])){
	          			if($_GET['a'] == 1){
	            			echo '<div class="alert alert-danger"><strong>Gagal!</strong> Ukuran gambar terlalu besar, silahkan kembali ke <a href="confirm.php">konfirmasi bembayaran</a></div>';
	          			}elseif ($_GET['a'] == 2) {
	            			echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gambar yang boleh diupload bertype jpg, jpeg, png, dan gif, silahkan kembali ke <a href="confirm.php">konfirmasi bembayaran</a></div>';
	          			}else{
	            			echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gambar tidak bisa diupload, silahkan kembali ke <a href="confirm.php">konfirmasi bembayaran</a></div>';
	          			}
	          		}else{
	            		echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gambar tidak bisa diupload, silahkan kembali ke <a href="confirm.php">konfirmasi bembayaran</a></div>';
	          		}
	          	}
	    }else{
        if(isset($_GET['un'])){
          $unnq=$_GET['un'];
          $sq=mysqli_query($conn,"SELECT * FROM userinfo WHERE username = '$unnq'");
          if(mysqli_num_rows($sq)==0){
            echo '<div class="alert alert-danger" id="aa"><strong>Gagal!</strong> Username tidak ditemukan</div>';
          }
        }
        echo '<div class="alert alert-info">Silahkan Upload bukti pembayaran anda dengan menekan tombol Pilih File</div>';

  			if(isset($_GET['un'])){
          $une=$_GET['un'];
          $sqe=mysqli_query($conn,"SELECT * FROM userinfo WHERE username = '$une'");
          if(mysqli_num_rows($sqe)==0){
  			    echo '<input class="formm" type="text" name="username" placeholder="Username" required><br>';
          }else{
            echo '<input class="formm" type="text" name="username" placeholder="Username" value="'.$_GET['un'].'" required><br>';
          }
  			}else{
  			    echo '<input class="formm" type="text" name="username" placeholder="Username" required><br> ';
  			}
  			echo '<div class="fileUpload btn btn-success">
  			      <span><i class="fa fa-upload fa-fw"></i> Pilih File</span>
  			      <input type="file" class="upload" id="uploadBtn" name="fileToUpload" required />
  			    </div>
  			      <input id="uploadFile" class="formm" placeholder="Nama Foto" disabled="disabled" />
  			    <input class="button-daftar" type="submit" value="Upload"/><br><br>';
      }

           
   
  ?>
    
	<p>&copy; 2016 - <?php echo date("Y");?> <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a><br><a href="#sk" data-toggle="modal">Syarat & Ketentuan</a></p>  		
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

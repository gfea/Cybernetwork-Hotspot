<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta name="theme-color" content="#378DE5">
    <title>Cybernetwork Daftar</title>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/cus/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/cus/dist/css/skins/_all-skins.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="-1" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
 include "db.php";
?>
    <div class="main">
        <div id="particles"></div>
        <div class="login-form">
            <img src="assets/images/wifi.png" height=150px width=150px />
            </br>
            <h2>Cybernetwork Daftar</h2>
            <?php
        if(isset($_GET['reg'])){
          if ($_GET['reg'] == 'no'){
            echo '<div class="alert alert-danger" id="aa"><b>Gagal!</b> Mohon cek kembali data anda</div>';
          }
        }
        if(isset($_GET['uname'])){
          if ($_GET['uname'] == 'ada'){
            echo '<div class="alert alert-danger" id="aa"><b>Gagal!</b> Username sudah digunakan, silahkan gunakan username lain!</div>';
          }
        }
      	?>
            <form action="simpan.php?daftar=yes" method="post">
                <div class="alert alert-info" id="alert-success">Mohon dibaca terlebih dahulu syarat dan ketentuan dengan klik tulisan <a href="#sk" data-toggle="modal"><b style="color: red">Syarat dan Ketentuan</b></a> sebelum anda mendaftar</div>
                <input class="formm" name="namadepan" type="text" placeholder="Nama Depan" required />
                <input class="formm" name="namablk" type="text" id="namablk" placeholder="Nama Belakang*" required />
                <p style="color: #378DE5" class="show_hide">*Jika tidak punya, isi dengan nama depan</p>
                <textarea class="formm" name="alamat" placeholder="Alamat" required></textarea>
                <input class="formm" name="nohp" type="number" placeholder="Nomor HP" required />
                <input class="formm" name="email" type="email" placeholder="Email" required />
                <input class="formm" name="username" type="text" placeholder="Username" onkeyup="showHint(this.value)" minlength="4" id="ss" required />
                <p style="color: red" class="sw">Username minimal 4 Karakter</p>
                <span id="txtHint"></span>
                <input class="formm" name="password" type="password" placeholder="Password" id="pass1" required />
                <input class="formm" name="ulangipassword" type="password" placeholder="Ulangi Password" required id="pass2" onkeyup="checkPass(); return false;" />
                <b>
                    <p id="pesan"></p>
                </b>
                <p style="color:grey">Bandwidth Up To</p><select class="formm" name="bandwidth" placeholder="Bandwidth">
                    <?php
			$a=mysqli_query($conn,"SELECT * FROM radgroupreply WHERE tampilkan = '1'");
			while ($a1=mysqli_fetch_assoc($a)) {
				echo '<option value="'.$a1["id"].'">'.$a1["groupname"].'</option>';
			}
		?>
                </select><br>
                <input type="checkbox" id="checkme" required /><a href="#sk" data-toggle="modal"> Syarat dan Ketentuan</a><br>
                <p>Dengan mencentang syarat dan ketentuan maka anda harus mengikuti dan menaati peraturan tersebut.</p><br>
                <input class="button-daftar" type="submit" value="Daftar" id="btnn" disabled /><br><br>
                <p>Sudah punya akun?<a href="http://cybernetwork.co.id/login"> Login Sekarang!</a></p>
                <p>&copy; 2016 - <?php echo date("Y");?> <a href="http://www.galehfatmaea.blogspot.com">Cybernetwork</a></p>
            </form>
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
    $("#aa").fadeTo(10000, 500).slideUp(500, function() {
        $("#aa").slideUp(500);
    });
</script>
<script type="text/javascript">
    var checker = document.getElementById('checkme');
    var sendbtn = document.getElementById('btnn');
    // when unchecked or checked, run the function
    checker.onchange = function() {
        if (this.checked) {
            sendbtn.disabled = false;
        } else {
            sendbtn.disabled = true;
        }
    }
</script>
<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "get.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<script type="text/javascript">
    function checkPass() {
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        var pesan = document.getElementById('pesan');
        var salah = "#ffdbdb";
        var ps = "red";
        var pb = "#fff";

        if (pass1.value == pass2.value) {
            pass2.style.backgroundColor = pb;
            pesan.innerHTML = "";
        } else {
            pass2.style.backgroundColor = salah;
            pesan.style.color = ps;
            pesan.innerHTML = "Password TIDAK sama!"
        }
    }
    $('#namablk').keyup(function() {

        // If value is not empty
        if ($(this).val().length != 0) {
            // Hide the element
            $('.show_hide').hide();
        } else {
            // Otherwise show it
            $('.show_hide').show();
        }
    }).keyup();
    $('#ss').keyup(function() {

        // If value is not empty
        if ($(this).val().length < 4 && $(this).val().length != 0) {
            // Hide the element
            $('.sw').show();
        } else {
            // Otherwise show it
            $('.sw').hide();
        }
    }).keyup();
</script>
<script type="text/javascript">
    $("#alert-success").fadeTo(10000, 500).slideUp(500, function() {
        $("#alert-success").slideUp(500);
    });
</script>

</html>

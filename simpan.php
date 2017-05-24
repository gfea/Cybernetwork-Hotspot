<?php
include "db.php";
$timezone  = 7;
$date = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("I")));
$dat = date("Y-m-d",strtotime ('+1 month',strtotime ($date)));
$date1 = $dat." 23:59:59";
$kl=$dat.'T23:59:59+07:00';
if(isset($_GET['daftar'])){
	$namad = $_POST['namadepan'];
	$namab = $_POST['namablk'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];
	$email = $_POST['email'];
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$bnd1 = $_POST['bandwidth'];
	$device = 1;
	$adm = "User Request";
	
	$bb=mysqli_query($conn,"SELECT * FROM radgroupreply WHERE id = '$bnd1'");
	$bb1=mysqli_fetch_array($bb);
	$bnd = $bb1['groupname'];
	$p=$bb1['harga'];

	$ss=mysqli_query($conn,"SELECT groupname FROM radgroupcheck");
	$ss1=mysqli_fetch_array($ss);
	$ss2=$ss1['groupname'];
	$j=mysqli_query($conn,"SELECT username FROM userinfo WHERE username = '$uname'");
	if(mysqli_num_rows($j)>0){
		header("location:index.php?uname=ada");
	}else{
		$a = mysqli_query($conn,"INSERT INTO userinfo (username,firstname,lastname,email,mobilephone,address,creationdate,creationby) VALUES ('$uname','$namad','$namab','$email','$nohp','$alamat','$date','$adm')");
		if($a){
			mysqli_query($conn,"INSERT INTO userbillinfo (username,email,address,creationdate,creationby) VALUES ('$uname','$email','$alamat','$date','$adm')");
			mysqli_query($conn,"INSERT INTO radcheck (username,attribute,op,value) VALUES ('$uname','Cleartext-Password',':=','$pass')");
			mysqli_query($conn,"INSERT INTO radusergroup (username,groupname,priority) VALUES ('$uname','$ss2','0')");
			mysqli_query($conn,"INSERT INTO struk (username,groupname,tagihan) VALUES ('$uname','$bnd','$p')");
			mysqli_query($conn,"INSERT INTO radreply (username,attribute,op,value) VALUES ('$uname','Idle-Timeout',':=','300')");
			mysqli_query($conn,"INSERT INTO radreply (username,attribute,op,value) VALUES ('$uname','WISPr-Session-Terminate-Time',':=','')");
			$a4 = mysqli_query($conn,"INSERT INTO radreply (username,attribute,op,value) VALUES ('$uname','Port-Limit',':=','$device')");
			if($a4){
				header("location:confirm.php?un=$uname&reg=yes");
			}else{
				header("location:index.php?un=$uname&reg=no");
			}
		}
	}
}
if (isset($_GET['foto'])){
	$un = $_POST['username'];
	$k=mysqli_query($conn,"SELECT * FROM userinfo WHERE username = '$un'");
	if(mysqli_num_rows($k)>0){
		$target_dir = "uploads/";
		$nm=uniqid();
		$fl = $nm."".basename($_FILES["fileToUpload"]["name"]);
		$target_file = $target_dir . $fl;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    }
		}
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
		    $si = 1;
		    
		    $uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$ft = 1;
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
			if($si == 1){
				header("location:confirm.php?conf=no&a=1");
			}elseif ($ft == 1) {
		    	header("location:confirm.php?conf=no&a=2");
			}else{
		    	header("location:confirm.php?conf=no&a=3");
			}
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    	$b=mysqli_query($conn,"UPDATE struk SET bayar = '$date', habis = '$date1', locate = '$target_file'	WHERE username = '$un'");
		    	if($b){
		    		header("location:confirm.php?conf=yes");
		    	}else{
		        	header("location:confirm.php?conf=no");
		    	}
		        
		    } else {
		        header("location:confirm.php?conf=no");
		    }
		}
	}else{
		header("location:confirm.php?un=no&conf=no");
	}
	
}
if(isset($_GET['passwd'])){
	$pin = $_GET['pin'];
	$pas=$_POST['pass'];
	$l2=$_GET['un'];
	$l4=mysqli_query($conn,"SELECT value FROM radcheck WHERE username = '$l2'");
	$l5=mysqli_fetch_array($l4);
	if($pas == $l5['value']){
		header("location:password.php?pin=$pin&un=$l2&pass=sama");
	}else{
		$l3 = mysqli_query($conn, "UPDATE radcheck SET value = '$pas' WHERE username = '$l2'");
		if($l3){
			mysqli_query($conn, "DELETE FROM pin WHERE username = '$l2'");
			header("location:password.php?password=yes");
		}else{
			header("location:password.php?pin=$pin&un=$l2&password=no");
		}
	}
}

mysqli_close($conn);
?>
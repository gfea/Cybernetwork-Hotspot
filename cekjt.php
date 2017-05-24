<?php
include 'db.php';
$timezone  = 7;
$date = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("I")));
$a=mysqli_query($conn,"SELECT * FROM struk WHERE habis <= '$date'");
if(mysqli_num_rows($a)>0){
	while ($a2=mysqli_fetch_assoc($a)) {
		$a3 = $a2['username'];
		mysqli_query($conn,"UPDATE struk SET locate = '', bayar = '0000-00-00 00:00:00', habis = '0000-00-00 00:00:00' WHERE username = '$a3'");
		mysqli_query($conn,"UPDATE radusergroup SET groupname = 'daloRADIUS-Disabled-Users' WHERE username = '$a3'");
		mysqli_query($conn,"DELETE FROM radacct WHERE username = '$a3' AND (acctstoptime != NULL OR acctstoptime != '0000-00-00 00:00:00')");
	}
}
?>
<?php
include "db.php";
$q = $_REQUEST["q"];
if(isset($q)){
    $ss=mysqli_query($conn,"SELECT username FROM userinfo WHERE username = '$q'");
    if(mysqli_num_rows($ss)>0){
        echo "<p style='color: red;'>Username <b>".$q."</b> sudah ada, silahkan menggunakan username lainnya</p>";
    }else{
        $len=strlen($q);
        if($len >= 4){
            echo "<p style='color: green;'>Username <b>".$q."</b> tersedia</p>";
        }else{
            echo "";
        }
    }
}else{
    echo "";
}
?>
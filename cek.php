<?php
require "db.php";
include('Mail/Mail.php');
include('Mail/mime.php');

$timezone  = 7;
$date = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("I")));
$uname = $_POST['username'];
if(isset($_GET['lupa'])){
	$a = mysqli_query($conn,"SELECT * FROM userinfo WHERE username = '$uname'");
	if(mysqli_num_rows($a) > 0){
		$ha = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $panjang = strlen($ha);
	    $rand = '';
	    for ($i = 0; $i < 8; $i++) {
	        $rand .= $ha[rand(0, $panjang - 1)];
	    }
	    $a2=mysqli_fetch_array($a);
	    $a3=$a2['email'];
	    $from = '<admcybernetwork@gmail.com>';
		$to = '<'.$a3.'>';
		$subject = 'Konfirmasi Reset Password';
		$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no" />
    <title>Cybernetwork Ganti Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      html { background-color:#E1E1E1; margin:0; padding:0; }
      body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, "Lucida Grande", sans-serif;}
      table{border-collapse:collapse;}
      table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
      img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
      a {text-decoration:none !important;border-bottom: 1px solid;}
      h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}
      .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}
      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}
      table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;}
      img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} 
      body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;} 
      .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} 
      h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
      h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
      h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
      h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
      .flexibleImage{height:auto;}
      .linkRemoveBorder{border-bottom:0 !important;}
      table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}
      body, #bodyTable{background-color:#E1E1E1;}
      #emailHeader{background-color:#E1E1E1;}
      #emailBody{background-color:#FFFFFF;}
      #emailFooter{background-color:#E1E1E1;}
      .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
      .emailButton{background-color:#205478; border-collapse:separate;}
      .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
      .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
      .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
      .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
      .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
      .imageContentText {margin-top: 10px;line-height:0;}
      .imageContentText a {line-height:0;}
      #invisibleIntroduction {display:none !important;}
      span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} 
      span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
      span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
      .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
      .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}
      @media only screen and (max-width: 480px){
        body{width:100% !important; min-width:100% !important;} 
        table[id="emailHeader"],
        table[id="emailBody"],
        table[id="emailFooter"],
        table[class="flexibleContainer"],
        td[class="flexibleContainerCell"] {width:100% !important;}
        td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
        td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
        img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
        img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}
        table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}
        table[class="emailButton"]{width:100% !important;}
        td[class="buttonContent"]{padding:0 !important;}
        td[class="buttonContent"] a{padding:15px !important;}
      }
      @media only screen and (-webkit-device-pixel-ratio:.75){
      }
      @media only screen and (-webkit-device-pixel-ratio:1){
      }
      @media only screen and (-webkit-device-pixel-ratio:1.5){
      }
      @media only screen and (min-device-width : 320px) and (max-device-width:568px) {
      }
    </style>
    
  </head>
  <body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center style="background-color:#E1E1E1;">
      <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
        <tr>
          <td align="center" valign="top" id="bodyCell">
            <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailHeader">
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="10" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td valign="top" width="500" class="flexibleContainerCell">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                  <td align="left" valign="middle" id="invisibleIntroduction" class="flexibleContainerBox" style="display:none !important; mso-hide:all;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
                                      <tr>
                                        <td align="left" class="textContent">
                                          <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#3498db">
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td align="center" valign="top" width="500" class="flexibleContainerCell">
                              <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                <tr>
                                  <td align="center" valign="top" class="textContent">
                                    <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;"><i class="fa fa-wifi"></i> Cybernetwork Hotspot</h1>
                                    <h2 style="text-align:center;font-weight:normal;font-family: "Lato", sans-serif;font-size:23px;margin-bottom:10px;color:#205478;line-height:135%;">Konfirmasi Ganti Password</h2>
                                    <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Anda dapat melakukan reset password dengan memasukkan 8 digit pin yang tertera dibawah ini atau dengan klik tombol <b>Ganti Password</b> untuk langsung menuju halaman ganti password</div>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#cecece">
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td align="center" valign="top" width="500" class="flexibleContainerCell">
                              <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                <tr>
                                  <td align="center" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tr>
                                        <td valign="top" class="textContent">
                                          <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Hai, '.$a2['firstname'].' '.$a2['lastname'].'</h3>
                                          <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">Anda telah menggunakan fitur ganti password, silahkan ikuti petunjuk berikut ini !</div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr mc:hideable>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td valign="top" width="500" class="flexibleContainerCell">
                              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                  <td valign="top" class="textContent">
                                    <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Konfirmasi 8 Digit Pin</h3>
                                    <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">Silahkan Memasukkan 8 Digit Pin berikut sebagai konfirmasi anda kedalam kolom inputan pada halaman <b><a href="http://10.1.1.4/pin.php?un='.$uname.'">Masukkan Pin</a></b>.</div><br>
                                    <h4 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">'.$rand.'</h4><br>
                                    <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">Jika anda mengalami masalah dalam memasukkan 8 Digit Pin, silahkan klik tombol berikut.</div>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr style="padding-top:0;">
                      <td align="center" valign="top">
                        <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td style="padding-top:0;" align="center" valign="top" width="500" class="flexibleContainerCell">
                              <table border="0" cellpadding="0" cellspacing="0" width="50%" class="emailButton" style="background-color: #3498DB;">
                                <tr>
                                  <td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
                                    <a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="http://10.1.1.4/password.php?pin='.$rand.'&un='.$uname.'" target="_blank">Ganti Password</a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td valign="top" width="500" class="flexibleContainerCell">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                  <td align="left" valign="top" class="flexibleContainerBox" style="background-color:#5F5F5F;">
                                    <table border="0" cellpadding="30" cellspacing="0" width="100%" style="max-width:100%;">
                                      <tr>
                                        <td align="left" class="textContent">
                                          <h3 style="color:#FFFFFF;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Tentang Kami</h3>
                                          <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:14px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Cybernetwork adalah jaringan wifi rumahan dengan beberapa kelebihan yang ditawarkan, yaitu, cek satus, pendaftaran akun yang mudah, multi login, sistem pembayaran yang mudah, dan tanpa kuota pemakaian selama satu bulan.</div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td align="right" valign="top" class="flexibleContainerBox" style="background-color:#ed8b2a;">
                                    <table class="flexibleContainerBoxNext" border="0" cellpadding="30" cellspacing="0" width="100%" style="max-width:100%;">
                                      <tr>
                                        <td align="left" class="textContent">
                                          <h3 style="color:#FFFFFF;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Kontak Kami</h3>
                                          <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Anda bisa menghubungi admin jaringan via Email atau Whatsapp dengan kontak sebagai berikut :</div><br>
                                          <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;"><i class="fa fa-whatsapp"></i> Whatsapp<br>+628585924304</div>
                                          <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;"><i class="fa fa-envelope"></i> Email<br>admcybernetwork@gmail.com</div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter">
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                          <tr>
                            <td align="center" valign="top" width="500" class="flexibleContainerCell">
                              <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                <tr>
                                  <td valign="top" bgcolor="#E1E1E1">

                                    <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
                                      <div>Copyright &#169; 2016 - '.date("Y").' <a href="http://galehfatmaea.blogspot.com" target="_blank" style="text-decoration:none;color:#828282;"><span style="color:#828282;">Cybernetwork</span></a>. All&nbsp;rights&nbsp;reserved.</div>
                                    </div>

                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </center>
  </body>
</html>';
		$crlf = "\n";

		$headers = array(
		    'From' => "Cybernetwork Hotspot".$from,
		    'To' => $to,
		    'Subject' => $subject
		);

		$smtp = Mail::factory('smtp', array(
		        'host' => 'ssl://smtp.gmail.com',
		        'port' => '465',
		        'auth' => true,
		        'username' => 'admcybernetwork@gmail.com',
		        'password' => 'kanggalih25'
		    ));
		$mime = new Mail_mime($crlf);
		$mime->setHTMLBody($html);
		$body = $mime->get();
		$headers = $mime->headers($headers);
		$smtp->send($to, $headers, $body);
	    $bb=mysqli_query($conn,"SELECT * FROM pin WHERE username = '$uname'");
	    if(mysqli_num_rows($bb)>0){
	    	$bb1=mysqli_query($conn,"UPDATE pin SET random = '$rand' WHERE username = '$uname'");
	    	if($bb1){
	    		header("location:pin.php?un=$uname");
	    	}
	    }else{
	   		$bb2=mysqli_query($conn,"INSERT INTO pin (username,random) VALUES ('$uname','$rand')");
	   		if($bb2){
	   			header("location:pin.php?un=$uname");	
	   		}
	    }
	}else {
		header ("location:forget.php?uname=no");
	}
}elseif($_GET['pinres']){
	$pin=$_POST['pin'];
  $un1=$_POST['username'];
	$aa=mysqli_query($conn,"SELECT * FROM pin WHERE random = '$pin' AND username = '$un1'");
	if(mysqli_num_rows($aa)>0){
		header ("location:password.php?pin=$pin&un=$un1");
	}else{
		header ("location:pin.php?pin=no&un=$un1");
	}
}
		
mysqli_close($conn);
?>

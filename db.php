<?php

		$servername = "localhost";
        $username = "root";
        $password = "kanggalih25";
        $dbname = "radius";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("gagal koneksi bos: " . mysqli_connect_error());
        }
       function DateID($date){
			$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		 
			$tahun = substr($date, 0, 4);
			$bulan = substr($date, 5, 2);
			$tgl   = substr($date, 8, 2);
		 
			$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
			return($result);
		}
?>
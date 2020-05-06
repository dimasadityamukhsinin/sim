<?php
$con=mysqli_connect("localhost","root","","sim_sekolah");
if(mysqli_connect_errno($con)){
	echo"Gagal Terkoneksi ke MySQL".mysqli_connect_error();
}else{
	echo"Berhasil Tersambung!";
}
?>
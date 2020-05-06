<?php
require_once('koneksi.php');
$nis = $_POST['nis'];
$password = $_POST['password'];
$query = mysqli_query($con,"select * from siswa where nis='".$nis."' and password='".$password."'");
echo json_encode($query);
?>
<?php
require_once('config.php');

$id = $_GET['id'];

$sql = " DELETE FROM tb_gaji WHERE tb_gaji.karyawan_id='$id' ";
$hapus = $conn->query ($sql);

if(!$hapus){
    die ("Could not query to database: <br />".$conn->error."<br>Query: ".$sql);
}else{
    header('Location: gaji_karyawan.php');
}

$db->close();
?>
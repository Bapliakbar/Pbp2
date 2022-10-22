<?php
require_once('config.php');

$id = $_GET['id'];

$sql = " DELETE FROM tb_karyawan WHERE tb_karyawan.id_karyawan='$id' ";
$hapus = $conn->query ($sql);

if(!$hapus){
    die ("Could not query to database: <br />".$conn->error."<br>Query: ".$sql);
}else{
    header('Location: karyawan.php');
}

$db->close();
?>
<?php

include('connect.php');

$from = $_POST['from'];
$to = $_POST['to'];
$dateFlight = $_POST['dateFlight'];
$banyakOrang = $_POST['banyakOrang'];

$sql = "SELECT * FROM Jadwal WHERE Kota_Asal='$from' and Kota_Tujuan='$to' and Tanggal='$dateFlight'";
$query = sqlsrv_query($conn, $sql);

$array = array();
$i = 0;

while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
	$array[$i++] = ($result);
}

echo json_encode($array);

?>
<?php

include('connect.php');

$awal= $_POST['awal'];
$tujuan= $_POST['tujuan'];
$tanggalPenerbangan= $_POST['tanggalPenerbangan'];
$banyakPenumpang= $_POST['banyakPenumpang'];
$airline= json_decode($_POST['airline']);
$depart= json_decode($_POST['depart']);
$arrive= json_decode($_POST['arrive']);
$duration= json_decode($_POST['duration']);
$pricePerPerson= json_decode($_POST['pricePerPerson']);

$airline = join("','", $airline);

$sql = "SELECT * FROM Jadwal WHERE Kota_Asal='$awal' and Kota_Tujuan='$tujuan' and Tanggal='$tanggalPenerbangan'";

if ($airline != "") {
	$sql .= " and Nama_Maskapai in ('$airline')";

}

if (!empty($depart)) {
	for ($i = 0; $i < count($depart); $i++) {
		if ($i == 0) {
			$sql .= " and (Jam_Berangkat between " . "'" . $depart[$i][0] . "'" . " and " . "'" . $depart[$i][1] . "'";
		}
		else {
			$sql .= " or Jam_Berangkat between " . "'" . $depart[$i][0] . "'" . " and " . "'" . $depart[$i][1] . "'";
		}

	}
	$sql .= ")";
}

if (!empty($arrive)) {
	for ($i = 0; $i < count($arrive); $i++) {
		if ($i == 0) {
			$sql .= " and (Jam_Tiba between " . "'" . $arrive[$i][0] . "'" . " and " . "'" . $arrive[$i][1] . "'";
		}
		else {
			$sql .= " or Jam_Tiba between " . "'" . $arrive[$i][0] . "'" . " and " . "'" . $arrive[$i][1] . "'";
		}

	}
	$sql .= ")";

}

if (!empty($duration)) {
	$sql .= " and (Lama_Penerbangan between " . $duration[0] * 60 . " and " . $duration[1] * 60 . ")";

}

if (!empty($pricePerPerson)) {
	$sql .= " and (Harga_Per_Orang between " . $pricePerPerson[0] . " and " . $pricePerPerson[1] . ")";
	
}

// echo $sql;

$query = sqlsrv_query($conn, $sql);

$array = array();
$i = 0;

while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
	$array[$i++] = ($result);
}

echo json_encode($array);

?>
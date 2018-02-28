<?php
$serverName = "DESKTOP-KH163C2"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"Traveloka");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     die( print_r( sqlsrv_errors(), true));
}
?>
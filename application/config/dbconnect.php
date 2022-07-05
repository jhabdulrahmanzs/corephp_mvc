<?php
$serverName = "ZSCHN01LP0045"; //serverName\instanceName
$connectionInfo = array( "Database"=>"corephp_mvc", "UID"=>"sa", "PWD"=>"Password@1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
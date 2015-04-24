<?php
/**
 * This requests returns a JSON Object with all raspberry IP addresses found in the subnet
 * Example of output:
 * {
 *      ips: "192.168.0.17\n192.168.0.19"
 * }
 *
  */
include("../inc/functions.php");
$txtIps=implode("\n", listAllHosts());
$ar=array("ips"=>$txtIps);
echo json_encode($ar);
?>

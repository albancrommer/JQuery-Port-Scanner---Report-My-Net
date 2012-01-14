<?php
$root = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['SCRIPT_NAME'])."/portscan.php";
header("Location: $root");
?>

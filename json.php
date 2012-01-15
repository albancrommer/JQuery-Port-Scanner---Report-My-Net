<?php

/**
 * Jsonp responder 
 *
 * For requests such as
 * json.php?callback=jQuery171024499501279090408_1326583056114&_=1326583064340
 * 
 * You can configure a port responder on any server using
 * iptables -t nat -A PREROUTING -d {IP} -p tcp --dport ! 80 -j DNAT --to-destination {IP}:80
 * CAUTION ! This will block SSH therefore you must use a server with a 2nd IP address
 * or a physical access to the server
 * 
 * @author Cocoadaemon
 */
header("content-type: application/json; charset=utf-8");
header("access-control-allow-origin: *");
$data["code"]="ok";
echo $_GET['callback'].'('.json_encode($data).')';

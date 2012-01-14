<?php
// Jsonp responder for requests such as
// json.php?callback=jQuery171024499501279090408_1326583056114&_=1326583064340
header("content-type: application/json; charset=utf-8");
header("access-control-allow-origin: *");
$data["code"]="ok";
echo $_GET['callback'].'('.json_encode($data).')';
?>

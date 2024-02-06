<?php

$d = json_decode(file_get_contents('php://input'),true);
file_put_contents('apks.json',json_encode($d));
?>
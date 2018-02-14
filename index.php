<?php
const token = '479274076:AAGENOFVXIanPOptIk8SeLitRPARksO_yGs';
require './config.php';
require './variables.php';
// save log
$log = fopen('./log.txt','w');
fwrite($log,$update);
fclose($log);
if ($chat_type == 'private'){
  include './pv/index.php';
}elseif ($chat_type == 'group' or $chat_type == 'supergroup'){
  include './group/index.php';
}
?>

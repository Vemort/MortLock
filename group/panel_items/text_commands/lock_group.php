<?php
$time = $explode[1];
$unix_time = strtotime("+$time hours");
$sql = "UPDATE `$chat_id` SET `username`='".$unix_time."' WHERE `silent`='0' and `name`='lock_group'";
$r = $conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => "برای $time ساعت گروه به سکوت رفت"
]);
?>

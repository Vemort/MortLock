<?php
$r = $conn->query("UPDATE `$chat_id` SET `username`='0' WHERE `silent`='0' AND `name`='lock_group'");
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'دیگه گروه خواب نیست!'
]);
?>

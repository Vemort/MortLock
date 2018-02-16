<?php
$SQL = "UPDATE `$chat_id` SET `warn`='0' WHERE `tg_id`='".$explode[1]."'";
$run = $conn->query($SQL);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'تمام اخطار های کاربر بخشیده شدند'
]);
?>

<?php
$sql = "UPDATE `$chat_id` SET `position`='allowed' WHERE `tg_id` = '$explode[1]'";
$run = $conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => "کاربر مورد نظر مجاز شد",
  'parse_mode' => 'Markdown'
]);
 ?>

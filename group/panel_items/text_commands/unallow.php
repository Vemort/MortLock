<?php
$sql = "UPDATE `$chat_id` SET `position`='member' WHERE `tg_id` = '$explode[1]'";
$run = $conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'کاربر زین پس مجاز نیست',
  'parse_mode' => 'Markdown'
]);
 ?>

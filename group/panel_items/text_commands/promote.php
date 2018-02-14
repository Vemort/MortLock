<?php
if ($ress == 'creator'){
  $sql = "UPDATE `$chat_id` SET `position`='admin' WHERE `tg_id` = '$explode[1]'";
  $run = $conn->query($sql);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر مورد نظر ادمین شد",
    'parse_mode' => 'Markdown'
  ]);
}
 ?>

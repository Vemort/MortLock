<?php
// user
$sql = "SELECT * FROM `$chat_id` WHERE `tg_id`=$explode[1]";
$run = $conn->query($sql)->fetch_assoc();
if ($ress == 'creator'){
  $name = $run['name'];
  $id = $explode[1];
  $sql = "UPDATE `$chat_id` SET `position`='creator' WHERE `tg_id`='$explode[1]'";
  $r = $conn->query($sql);
  $sql = "UPDATE `$chat_id` SET `position`='admin' WHERE `tg_id`='$user_id'";
  $r = $conn->query($sql);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$name](tg://user?id=$id) زین پس صاحب گروه است",
    'parse_mode' => 'Markdown'
  ]);
}
?>

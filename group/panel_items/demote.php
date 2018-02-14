<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
// user
$user = $reply_user_id;
$name = $reply_first_name.' '.$reply_last_name;
$username = $reply_user_name;
if ($ress == 'creator' or $ress == 'admin'){
  $sql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user."'";
  $res = $conn->query($sql)->num_rows;
  if ($res == 0){
    $sql = "INSERT INTO `$chat_id` (username, name, tg_id, position) VALUES ('".$username."', '".$name."', '".$user."', 'member')";
    $res = $conn->query($sql);
  }else{
    $sql = "UPDATE `$chat_id` SET `position` = 'member' WHERE tg_id = $user";
    $res = $conn->query($sql);
  }
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$name](tg://user?id=$user) دیگر ادمین گروه نیست",
    'parse_mode' => 'Markdown'
  ]);
}else{
  text_403($chat_id,$message_id);
}
?>

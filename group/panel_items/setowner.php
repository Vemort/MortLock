<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
// user
$user = $data->message->reply_to_message->from->id;
$name = $data->message->reply_to_message->from->first_name;
$name .= ' '.$data->message->reply_to_message->from->last_name;
$username = $data->message->reply_to_message->from->username;
if ($ress == 'creator'){
  $sql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user."'";
  $res = $conn->query($sql)->num_rows;
  if ($res == 0){
    $sql = "INSERT INTO `$chat_id` (username, name, tg_id, position) VALUES ('".$username."', '".$name."', '".$user."', 'creator')";
    $res = $conn->query($sql);
  }else{
    $sql = "UPDATE `$chat_id` SET `position` = 'creator' WHERE tg_id = $user";
    $res = $conn->query($sql);
  }
  $sql = "UPDATE `$chat_id` SET `position` = 'admin' WHERE `tg_id`='".$user_id."'";
  $run = $conn->query($sql);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$name](tg://user?id=$user) زین پس صاحب گروه است",
    'parse_mode' => 'Markdown'
  ]);
}else{
  text_403($chat_id,$message_id);
}
?>

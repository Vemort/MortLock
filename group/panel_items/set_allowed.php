<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
// user
$user = $data->message->reply_to_message->from->id;
$name = $data->message->reply_to_message->from->first_name;
$name .= ' '.$data->message->reply_to_message->from->last_name;
$username = $data->message->reply_to_message->from->username;
if ($ress != 'member'){
  $sql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user."'";
  $res = $conn->query($sql)->num_rows;
  if ($res == 0){
    $sql = "INSERT INTO `$chat_id` (username, name, tg_id, position) VALUES ('".$username."', '".$name."', '".$user."', 'allowed')";
    $res = $conn->query($sql);
  }else{
    $sql = "UPDATE `$chat_id` SET `position` = 'allowed' WHERE tg_id = $user";
    $res = $conn->query($sql);
  }
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$name](tg://user?id=$user) مجاز شد",
    'parse_mode' => 'Markdown'
  ]);
}else{
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => 'دستور مخصوص مدیراس به تو نمیخوره!'
  ]);
}
 ?>

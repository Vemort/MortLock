<?php
$user = $data->message->reply_to_message->from->id;
$name = $data->message->reply_to_message->from->first_name;
$name .= ' '.$data->message->reply_to_message->from->last_name;
$username = $data->message->reply_to_message->from->username;
$sql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user."'";
$res = $conn->query($sql)->num_rows;
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if($ress == 'admin' or $ress == 'creator'){
  if ($conn->query($sql)->fetch_object()->position != 'creator' ){
    silent($chat_id,$user,$conn);
    req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$name](tg://user?id=$user) سایلنت شد",
    'parse_mode' => 'Markdown'
    ]);
  }
}else{
  text_403($chat_id,$message_id);
}
?>

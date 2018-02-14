<?php
$user = $data->message->reply_to_message->from->id;
$name = $data->message->reply_to_message->from->first_name;
$name .= ' '.$data->message->reply_to_message->from->last_name;
$username = $data->message->reply_to_message->from->username;
$sql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user."'";
$res = $conn->query($sql)->num_rows;
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
$time = explode(' ',$message_text)[1];
if ($conn->query($sql)->fetch_object()->position != 'creator' ){
  if ($ress == 'admin' or $ress == 'creator'){
    $sql = "SELECT * FROM `$chat_id` WHERE `tg_id`='".$user."'";
    $run = $conn->query($sql)->num_rows;
    if ($run > 0){
      req('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "کاربر [$name](tg://user?id=$user) با موفقیت برای $time ساعت به حالت سکوت رفت",
        'parse_mode' => 'Markdown',
        'reply_to_message_id' => $message_id
      ]);
      silent($chat_id,$user,$conn,$time);
    }else{
      text_403($chat_id,$message_id);
    }
  }
}
?>

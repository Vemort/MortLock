<?php
$pos_check = "SELECT `position` FROM `$chat_id` WHERE `tg_id`='".$user_id."'";
$pos_res = $conn->query($pos_check)->fetch_object()->position;
if ($pos_res == 'admin' or $pos_res == 'creator'){
  req('restrictChatMember',[
    'chat_id' => $chat_id,
    'user_id' => $reply_user_id,
    'can_send_messages' => true,
    'can_send_other_messages' => false
  ]);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$reply_first_name $reply_last_name](tg://user?id=$reply_user_id) اکنون دیگر قابلیت  ارسال استیکر ندارد!",
    'parse_mode' => 'Markdown',
    'reply_to_message_id' => $message_id
  ]);
  $conn->query("UPDATE `$chat_id` SET `silent` = 'true' WHERE `tg_id`='".$reply_user_id."'");
}else{
  text_403($chat_id,$message_id);
}
?>

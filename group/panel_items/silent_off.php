<?php
$user = $data->message->reply_to_message->from->id;
$name = $data->message->reply_to_message->from->first_name;
$name .= ' '.$data->message->reply_to_message->from->last_name;
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if ($ress == 'admin' or $ress == 'creator'){
  req('restrictChatMember',[
    'chat_id' => $chat_id,
    'user_id' => $user,
    'can_send_messages' => true,
    'can_send_media_messages' => true,
    'can_send_other_messages' => true,
    'can_add_web_page_previews' => true
  ]);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => " کاربر [$name](tg://user?id=$user) با موفقیت از سکوت خارج شد",
    'parse_mode' => 'Markdown',
    'reply_to_message_id' => $message_id
  ]);
  $sql = "UPDATE `$chat_id` SET `silent`='false' WHERE `tg_id`='".$user."'";
  $run = $conn->query($sql);
}else{
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => 'دستور مخصوص مدیراس به تو نمیخوره!',
    'reply_to_message_id' => $message_id
  ]);
}
?>

<?php
req('restrictChatMember',[
  'chat_id' => $chat_id,
  'user_id' => $explode[1],
  'can_send_messages' => 'true',
  'can_send_media_messages' => 'true',
  'can_send_other_messages' => 'true',
  'can_add_web_page_previews' => 'true'
]);
$sql = "UPDATE `$chat_id` SET `silent`='false' WHERE `tg_id`='".$explode[1]."'";
$run = $conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'کاربر از سکوت دراومد'
]);
?>

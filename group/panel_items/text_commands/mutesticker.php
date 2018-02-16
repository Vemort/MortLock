<?php
req('restrictChatMember',[
  'chat_id' => $chat_id,
  'user_id' => $explode[1],
  'can_send_messages' => true,
  'can_send_media_messages' => true,
  'can_send_other_messages' => false,
  'can_add_web_page_previews' => true
]);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'کاربر مورد نظر به سکوت استیکر رفت'
]);
$sql = "UPDATE `$chat_id` SET `silent`='true' WHERE `tg_id`='".$user_id."'";
$run = $conn->query($sql);
?>

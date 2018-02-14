<?php
$sql = "SELECT tg_id FROM $chat_id WHERE silent='true'";
$run = $conn->query($sql);
foreach ($run as $user){
  req('restrictChatMember',[
    'chat_id' => $chat_id,
    'user_id' => $user['tg_id'],
    'can_send_messages' => 'true',
    'can_send_media_messages' => 'true',
    'can_send_other_messages' => 'true',
    'can_add_web_page_previews' => 'true'
  ]);
}
$sql = "DELETE FROM `$chat_id` WHERE silent='true'";
$run = $conn->query($sql);
req('editMessageText',[
'chat_id' => $chat_id,
'message_id' => $inline_message_id,
'text' => 'دیگه هیچکس تو حالت سکوت نیست',
'reply_markup' => inline_keyboard(
  array(
    array(
      array(
        'text' => 'بازگشت به پنل','callback_data' => 'panel'
      )
    )
  )
  )
]);
?>

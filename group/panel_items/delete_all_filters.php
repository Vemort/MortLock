<?php
$sql = "DELETE FROM `filter` WHERE gp_id='".$chat_id."'";
$run = $conn->query($sql);
req('editMessageText',[
'chat_id' => $chat_id,
'message_id' => $inline_message_id,
'text' => 'همه فیلتر ها پاک شدند',
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

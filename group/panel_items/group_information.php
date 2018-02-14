<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if ($ress == 'admin' or $ress == 'creator'){
  $gp_name = $data->callback_query->message->chat->title;
  $gp_id = $chat_id;
  $text = $gp_name."\n\n".'آیدی گروه: '.$gp_id;
  req('editMessageText',[
    'chat_id' => $chat_id,
    'message_id' => $inline_message_id,
    'text' => $text,
    'parse_mode' => 'html',
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
}else{
  _403($callback_query_id);
}
?>

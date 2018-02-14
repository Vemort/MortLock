<?php
$user_id = $data->callback_query->from->id;
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if ($ress == 'admin' or $ress == 'creator'){
  $sql = "SELECT `name`,`tg_id` FROM `".$chat_id."` WHERE `silent`='true'";
  $res = $conn->query($sql);
  $text = 'لیست سکوت:'."\n";
  foreach ($res as $user){
    $name = $user['name'];
    $tg_id = $user['tg_id'];
    $text = $text."[$name](tg://user?id=$tg_id) ,";
  }
  if ($text == 'لیست سکوت:'."\n"){
    $text = 'هیچ کس در حالت سکوت نیست';
    req('editMessageText',[
      'chat_id' => $chat_id,
      'message_id' => $inline_message_id,
      'text' => $text,
      'reply_markup' => inline_keyboard(
        array(
          array(
            array(
              'text' => 'بازگشت به پنل', 'callback_data' => 'panel'
            )
          )
        )
      )
    ]);
  }else{
    req('editMessageText',[
      'chat_id' => $chat_id,
      'message_id' => $inline_message_id,
      'text' => $text,
      'parse_mode' => 'Markdown',
      'reply_markup' => inline_keyboard(
        array(
          array(
            array(
              'text' => 'پاکسازی لیست','callback_data' => 'delete_all_silents'
            ),array(
              'text' => 'بازگشت به پنل', 'callback_data' => 'panel'
            )
          )
        )
      )
    ]);
  }
}else{
  _403($callback_query_id);
}
?>

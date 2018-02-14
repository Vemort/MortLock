<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if ($ress == 'admin' or  $ress == 'creator'){
  $sql = "SELECT `word` FROM `filter` WHERE `gp_id`='".$chat_id."'";
  $res = $conn->query($sql);
  $text = 'لیست کلمات فیلتر شده:'."\n";
  foreach ($res as $word){
    $name = $word['word'];
    $text = $text."$name ,";
  }
  if ($text == 'لیست کلمات فیلتر شده:'."\n"){
    $text = 'همه کلمات آزاد هستند، هیچ کلمه‌ی فیلتر شده ای برای این گروه وجود ندارد';
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
              'text' => 'بازگشت به پنل', 'callback_data' => 'panel'
            ),array(
              'text' => 'حذف همه کلمات', 'callback_data' => 'delete_all_filters'
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

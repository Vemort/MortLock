<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
$del = false;
if ($ress == 'member'){
  $exploded = explode(' ',$message_text);
  for ($i = 0; $i < sizeof($exploded); $i++){
    $sql = "SELECT * FROM `filter` WHERE `gp_id`='".$chat_id."' and `word`='".$exploded[$i]."'";
    $run = $conn->query($sql)->num_rows;
    if ($run == 1){
      req('deleteMessage',[
        'chat_id' => $chat_id,
        'message_id' => $message_id
      ]);
      req('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "کاربر [$first_name $last_name](tg://user?id=$user_id) یک خطای دیگر دریافت کرد به علت استفاده از کلمات فیلتر شده.",
        'parse_mode' => 'Markdown'
      ]);
      $del = true;
      include './group/panel_items/warn_check.php';
      break;
    }
  }
}
?>

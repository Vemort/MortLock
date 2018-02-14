<?php
$creator = $conn->query("SELECT `tg_id`,'name' FROM `$chat_id` WHERE `position` = 'creator'")->fetch_assoc();
$creator = 'مالک گروه:'."\n"."[$creator['name']](tg://user?id=$creator['tg_id'])";
if ($all_members_admins == true){
  req('editMessageText',[
    'chat_id' => $chat_id,
    'message_id' => $inline_message_id,
    'text' => $creator."\n".'همه اعضا ادمین هستند!!!',
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
  $sql = "SELECT `name`,`tg_id` FROM `".$chat_id."` WHERE `position`='allowed'";
  $res = $conn->query($sql);
  $allowed = 'مجاز های گروه:'."\n";
  foreach ($res as $user){
    $name = $user['name'];
    $tg_id = $user['tg_id'];
    $allowed = $allowed."[$name](tg://user?id=$tg_id) \n";
  }
  $sql = "SELECT `name`,`tg_id` FROM `".$chat_id."` WHERE `position`='admin'";
  $res = $conn->query($sql);
  $admins = "مدیر های گروه: \n";
  foreach ($res as $user){
    $name = $user['name'];
    $tg_id = $user['tg_id'];
    $admins = $admins."[$name](tg://user?id=$tg_id) \n";
  }
  req('editMessageText',[
    'chat_id' => $chat_id,
    'message_id' => $inline_message_id,
    'text' => $creator.$admins.$allowed,
    'parse_mode' => 'Markdown',
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
}
?>

<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if ($ress == 'creator' or $ress == 'admin'){
  $word = explode(' ',$message_text)[1];
  $sql = "SELECT `word` , `gp_id` FROM `filter` WHERE `word`='".$word."' and `gp_id`='".$chat_id."'";
  $run = $conn->query($sql)->num_rows;
  if ($run > 0){
    req('sendMessage',[
      'chat_id' => $chat_id,
      'text' => 'این کلمه قبلا اضافه شده!',
      'reply_to_message_id' => $message_id
    ]);
  }else{
    $sql = "INSERT INTO `filter` (word,gp_id) VALUES('".$word."','".$chat_id."')";
    $run = $conn->query($sql);
    req('sendMessage',[
      'chat_id' => $chat_id,
      'text' => 'کلمه '.$word.' به لیست کلمات فیلتر شده اضافه شد.',
      'reply_to_message_id' => $message_id
    ]);
  }
}else{
  text_403($chat_id,$message_id);
}
?>

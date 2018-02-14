<?php
$sqql = "SELECT `position` FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
$ress = $conn->query($sqql)->fetch_object()->position;
if ($ress == 'creator' or $ress == 'admin'){
  if (substr($message_text,0,strlen('unfilter')) == 'unfilter'){
    $word = explode(' ',$message_text)[1];
  }else{
    $word = explode(' ',$message_text)[2];
  }
    $sql = "SELECT `word` , `gp_id` FROM `filter` WHERE `word`='".$word."' and `gp_id`='".$chat_id."'";
    $run = $conn->query($sql)->num_rows;
    if ($run > 0){
      $sqlism = "DELETE FROM `filter` WHERE `word`='".$word."' and `gp_id`='".$chat_id."'";
      $r = $conn->query($sqlism);
      req('sendMessage',[
        'chat_id' => $chat_id,
        'text' => 'حذف شد',
        'reply_to_message_id' => $message_id
      ]);
    }else{
      req('sendMessage',[
        'chat_id' => $chat_id,
        'text' => 'این که اصلا نبود :|',
        'reply_to_message_id' => $message_id
      ]);
    }
}else{
  text_403($chat_id,$message_id);
}
?>

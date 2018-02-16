<?php
$sql = "SELECT `warn` FROM `$chat_id` WHERE `tg_id`='".$explode[1]."'";
$run = $conn->query($sql)->fetch_object()->warn;
if ($run == 2){
  $sql = "UPDATE `$chat_id` SET `position` = 'member', `warn` = '0' WHERE tg_id = $explode[1]";
  $res = $conn->query($sql);
  silent($chat_id,$user_id,$conn,1);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "کاربر [$first_name $last_name](tg://user?id=$user_id) به مدت یک ساعت به حالت سکوت رفت!",
    'parse_mode' => 'Markdown'
  ]);
}else{
  $sqli = "UPDATE `$chat_id` SET `warn` = $run + 1 WHERE `tg_id`='".$explode[1]."'";
  $runi = $conn->query($sqli);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => 'کاربر یک اخطار دیگر دریافت کرد'
  ]);
}
?>

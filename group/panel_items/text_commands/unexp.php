<?php
$sql = "DELETE FROM `exp` WHERE `val` = '".$explode[1]."'";
$conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'دیگه استثنا نیس'
]);
?>

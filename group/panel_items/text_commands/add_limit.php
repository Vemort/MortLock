<?php
$val = $explode[1];
$sql = "UPDATE `$chat_id` SET `username`='$val' WHERE `name` = 'shouldadd' and `silent`='0'";
$r = $conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'مقدار عضو اد شده به '.$val.' تغییر یافت'
]);
?>

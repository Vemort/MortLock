<?php
$sql = "SELECT `username` FROM `$chat_id` WHERE `silent`='0' and `name`='link'";
$result = $conn->query($sql)->fetch_object()->username;
if ($result == ''){
  $link = req('exportChatInviteLink',[
    'chat_id' => $chat_id
  ]);
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => $link
  ]);
  $sql = "UPDATE `$chat_id` SET `username`='".$link."' WHERE `silent`='0' and `name`='link'";
  $conn->query($sql);
}else{
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => $result
  ]);
}
?>

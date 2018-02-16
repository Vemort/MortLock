<?php
if ($explode[1][0] == '@'){
  $type = 'Channel_id';
}else{
  $type = 'link';
}
$sql = "INSERT INTO `exp` VALUES('NULL','".$chat_id."','".$type."','".$explode[1]."')";
$ru = $conn->query($sql);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'کلمه '.$explode[1].' اد شد'
]);
?>

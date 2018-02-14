<?php
$select = $conn->query("SELECT * FROM `$chat_id` WHERE `tg_id` = '$explode[1]'")->fetch_assoc();
$name = $select['name'];
$username = $select['username'];
$id = $explode[1];
$position = $select['position'];
$silent = $select['silent'];
$text = "اطلاعات [$name](tg://user?id=$id) : \n آیدی: $id \n نام: $name \n نام کاربری: $username \n سمت: $position \n سکوت: $silent";
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => $text,
  'parse_mode' => 'Markdown'
]);
?>

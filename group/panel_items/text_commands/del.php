<?php
$count = $explode[1];
$i = 0;
while ($i < $count){
  del_message($chat_id,$message_id - $i);
  $i++;
}
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'حذف شدن !'
]);
?>

<?php
$sql = "SELECT `group_id`,`name` FROM `groups` WHERE `creator`='".$user_id."'";
$r = $conn->query($sql);
$arr = array();
foreach ($r as $gp){
  array_push($arr,array(array('text' => $gp->name,'callback_data' => 'managergp_'.$gp->group_id)));
}
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => $arr
]);
req('sendMessage',[
  'chat_id' => $chat_id,
  'text' => 'گروه موردنظر را انتخاب کنید',
  'reply_markup' => inline_keyboard($arr)
]);
?>

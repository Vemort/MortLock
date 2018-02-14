<?php
$update = file_get_contents("php://input");
$data = json_decode($update);
function req($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . token . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
function inline_keyboard($btn)
{
    $reply_markup = array(
        "inline_keyboard" => $btn,
        'one_time_keyboard' => true,
        'resize_keyboard' => true,
        'selective' => true
    );
    return json_encode($reply_markup, true);
}
function _403($callback_query_id){
  req('answerCallbackQuery',[
    'callback_query_id' => $callback_query_id,
    'text' => 'بزار به مقام کافی دست پیدا کنی بعد اینارو بزن کوجولو :)',
    'show_alert' => true
  ]);
}
function text_403($chat_id,$message_id){
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => 'تو که ادمین نیستی گل پسر :|',
    'reply_to_message_id' => $message_id
  ]);
}
function silent($chat_id,$user_id,$conn,$time=false){
  if ($time == false or intval($time) > 166){
    req('restrictChatMember',[
      'chat_id' => $chat_id,
      'user_id' => $user_id,
      'can_send_messages' => false,
      'can_send_media_messages' => false,
      'can_send_other_messages' => false,
      'can_add_web_page_previews' => false
    ]);
  }else{
    req('restrictChatMember',[
      'chat_id' => $chat_id,
      'user_id' => $user_id,
      'until_date' => intval(strtotime("+$time hours")),
      'can_send_messages' => false,
      'can_send_media_messages' => false,
      'can_send_other_messages' => false,
      'can_add_web_page_previews' => false
    ]);
  }
  $sql = "UPDATE `$chat_id` SET `silent`='true' WHERE `tg_id`='".$user_id."'";
  $run = $conn->query($sql);
}
function del_message($chat_id,$message_id){
  req('deleteMessage',[
    'chat_id' => $chat_id,
    'message_id' => $message_id
  ]);
}
if (isset($data->message->text)) {
    $message_text = $data->message->text;
}
if (isset($data->message->chat->id)) {
    $chat_id = $data->message->chat->id;
}
if (isset($data->message->from->first_name)) {
    $first_name = $data->message->from->first_name;
}
if (isset($data->message->from->last_name)) {
    $last_name = $data->message->from->last_name;
}
if (isset($data->message->from->username)) {
    $username = $data->message->from->username;
}

//inline

if (isset($data->callback_query->from->first_name)) {
    $first_name = $data->callback_query->from->first_name;
}
if (isset($data->callback_query->message->chat->username)) {
    $user_name = $data->callback_query->message->chat->username;
}
if (isset($data->callback_query->from->last_name)) {
    $last_name = $data->callback_query->from->last_name;
}
if (isset($data->callback_query->message->chat->id)) {
    $chat_id = $data->callback_query->message->chat->id;
}
if (isset($data->callback_query->id)) {
    $callback_query_id = $data->callback_query->id;
}
if (isset($data->callback_query->data)) {
    $inline_button_data = $data->callback_query->data;
}
if (isset($data->callback_query->message->message_id)) {
    $inline_message_id = $data->callback_query->message->message_id;
}
if (isset($data->inline_query->id)) {
    $inline_query_id = $data->inline_query->id;
}
if (isset($data->inline_query->query)) {
    $inline_query = $data->inline_query->query;
}

if (isset($data->message->contact->phone_number)) {
    $phone_number = $data->message->contact->phone_number;
}
if (isset($data->message->contact->user_id)) {
    $phone_number_chat_id = $data->message->contact->user_id;
}
if (isset($data->message->entities)) {
    $ent = $data->message->entities;
}
// chat type

if (isset($data->message->chat->type)){
    $chat_type = $data->message->chat->type;
}
if (isset($data->callback_query->message->chat->type)){
    $chat_type = $data->callback_query->message->chat->type;
}
if (isset($data->callback_query->message->chat->all_members_are_administrators)){
  $all_members_admins = $data->callback_query->message->chat->all_members_are_administrators;
}elseif (isset($data->message->chat->all_members_are_administrators)){
  $all_members_admins = $data->message->chat->all_members_are_administrators;
}
// user id
if (isset($data->message->from->id)){
  $user_id = $data->message->from->id;
}elseif (isset($data->callback_query->from->id)){
  $user_id = $data->callback_query->from->id;
}
if (isset($data->message->message_id)){
  $message_id = $data->message->message_id;
}
// reply
if (isset($data->message->reply_to_message)){
  $reply_user_id = $data->message->reply_to_message->from->id;
  $reply_first_name = $data->message->reply_to_message->from->first_name;
  $reply_last_name = $data->message->reply_to_message->from->last_name;
  $reply_user_name = $data->message->reply_to_message->from->username;
}
if (isset($data->message->forward_from_chat->type)){
  $fwd_type = $data->message->forward_from_chat->type;
}
if (isset($data->message->forward_from)){
  $fwd = $data->message->forward_from;
}
if (isset($data->edited_message)){
  $message_id = $data->edited_message->message_id;
  $chat_id = $data->edited_message->chat->id;
  $user_id = $data->edited_message->from->id;
  $ent = $data->edited_message->entities;
  $message_text = $data->edited_message->text;
  $chat_type = $data->edited_message->chat->type;
  if (isset($data->edited_message->caption)){
    $message_text = $data->edited_message->caption;
    $ent = $data->edited_message->caption_entities;
  }
}
if (isset($data->message->caption)){
  $message_text = $data->message->caption;
  $ent = $data->message->caption_entities;
}
// user position
if ($chat_type == 'group' or $chat_type == 'supergroup'){
  $sql = "SELECT * FROM `$chat_id` WHERE `tg_id`='$user_id'";
  $run = $conn->query($sql)->num_rows;
  if ($run == 0){
    $sql = "INSERT INTO `$chat_id` VALUES('NULL','".$username."','".$first_name.' '.$last_name."','".$user_id."','member','0','false','0')";
    $run = $conn->query($sql);
    $ress = 'member';
  }else{
      $sql = "SELECT * FROM `".$chat_id."` WHERE `tg_id`='".$user_id."'";
      $ress = $conn->query($sql)->fetch_object()->position;
  }
}
?>

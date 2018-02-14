<?php
$name = explode('_',$inline_button_data)[1];
if ($name == 'alert'){
  req('answerCallbackQuery',[
    'callback_query_id' => $callback_query_id,
    'text' => 'خوبی؟! باید به جلویی ها بزنی',
    'show_alert' => true
  ]);
}else{
  $sql = "SELECT `position` FROM `".$chat_id."` WHERE `name`='".$name."' and `silent`='0'";
  $now = $conn->query($sql)->fetch_object()->position;
  if ($now == 'false'){
    $now = 'true';
    req('answerCallbackQuery',[
      'callback_query_id' => $callback_query_id,
      'text' => "زین پس فعال است",
      'show_alert' => true
    ]);
  }else{
    $now = 'false';
    req('answerCallbackQuery',[
      'callback_query_id' => $callback_query_id,
      'text' => 'زین پس غیرفعال است',
      'show_alert' => true
    ]);
  }

  $update = $conn->query("UPDATE `$chat_id` SET `position` = '".$now."' WHERE `name`='".$name."' and `silent`='0'");
  $tik = '✅';
  $x = '❌';
  $sql = "SELECT `name`,`position` FROM `$chat_id` WHERE `silent`='0'";
  $result = $conn->query($sql);
  req('sendMessage',
  [
    'chat_id' => $chat_id,
    'text' => $result
  ]);
  $arr = array();
  foreach ($result as $op){
    if ($op['position'] == 'true'){
      $what = $tik;
    }else{
      $what = $x;
    }
    $arr[$op['name']] = $what;
  }
  req('editMessageReplyMarkup',[
    'chat_id' => $chat_id,
    'message_id' => $inline_message_id,
    'reply_markup' => inline_keyboard(
      array(
            array(
              array(
                'text' => $arr['link'],'callback_data' => 'options_link'
              ),array(
                'text' => 'ضد لینک','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['tag'],'callback_data' => 'options_tag'
              ),array(
                'text' => ' ضد تگ','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['fwdch'],'callback_data' => 'options_fwdch'
              ),array(
                'text' => 'ضد فروارد از کانال','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['fwdus'],'callback_data' => 'options_fwdus'
              ),array(
                'text' => 'ضد فروارد از کاربر','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['hyperlink'],'callback_data' => 'options_hyperlink'
              ),array(
                'text' => 'ضد هایپرلینک','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['inline'],'callback_data' => 'options_inline'
              ),array(
                'text' => 'ضد اینلاین','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['sticker'],'callback_data' => 'options_sticker'
              ),array(
                'text' => 'ضد استیکر','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['text'],'callback_data' => 'options_text'
              ),array(
                'text' => 'ضد متن','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['photo'],'callback_data' => 'options_photo'
              ),array(
                'text' => 'ضد عکس','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['voice'],'callback_data' => 'options_voice'
              ),array(
                'text' => 'ضد ویس','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['system'],'callback_data' => 'options_system'
              ),array(
                'text' => 'ضد سیستمی','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['music'],'callback_data' => 'options_music'
              ),array(
                'text' => 'ضد موزیک','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => 'صفحه دوم','callback_data' => 'panel_options_2'
              )
            ),array(
              array(
                'text' => 'بازگشت به پنل','callback_data' => 'panel'
              )
            )
          )
    )
  ]);
}
?>

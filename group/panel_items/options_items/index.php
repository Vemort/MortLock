<?php
$tik = '✅';
$x = '❌';
$sql = "SELECT `name`,`position` FROM `$chat_id` WHERE `silent`='0'";
$result = $conn->query($sql);

$arr = array();
foreach ($result as $op){
  if ($op['position'] == 'true'){
    $what = $tik;
  }else{
    $what = $x;
  }
  $arr[$op['name']] = $what;
}
$page_1 =  inline_keyboard(
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
    );
$page_2 = inline_keyboard(
  array(
    array(
              array(
                'text' => $arr['document'],'callback_data' => 'options_document'
              ),array(
                'text' => 'ضد فایل','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['contact'],'callback_data' => 'options_contact'
              ),array(
                'text' => 'ضد مخاطب','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['map'],'callback_data' => 'options_map'
              ),array(
                'text' => 'ضد نقشه','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['welcome'],'callback_data' => 'options_welcome'
              ),array(
                'text' => 'ضد خوش آمد گویی','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['bot'],'callback_data' => 'options_bot'
              ),array(
                'text' => 'ضد ربات','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['join'],'callback_data' => 'options_join'
              ),array(
                'text' => 'ضد ورود','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['persian'],'callback_data' => 'options_persian'
              ),array(
                'text' => 'ضد فارسی','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['english'],'callback_data' => 'options_english'
              ),array(
                'text' => 'ضد انگلیسی','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['shouldjoin'],'callback_data' => 'options_shouldjoin'
              ),array(
                'text' => 'ضد عضویت اجیاری','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => $arr['autolock'],'callback_data' => 'options_autolock'
              ),array(
                'text' => 'قفل اتوماتیک گروه','callback_data' => 'options_alert'
              )
            ),array(
              array(
                'text' => 'صفحه اول','callback_data' => 'panel_options'
              )
            ),array(
              array(
                'text' => 'بازگشت به پنل','callback_data' => 'panel'
              )
            )
  )
);
if($inline_button_data == 'panel_options'){
  req('editMessageText',[
    'chat_id' => $chat_id,
    'message_id' => $inline_message_id,
    'text' => "$x نشان دهنده غیر فعال بودن و $tik نشان دهنده فعال بودن است",
    'reply_markup' => $page_1
  ]);
}elseif ($inline_button_data == 'panel_options_2'){
  req('editMessageText',[
    'chat_id' => $chat_id,
    'message_id' => $inline_message_id,
    'text' => "$x نشان دهنده غیر فعال بودن و $tik نشان دهنده فعال بودن است",
    'reply_markup' => $page_2
  ]);
}
?>

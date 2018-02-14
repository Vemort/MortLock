<?php

if (isset($message_text)){
  req('sendMessage',[
    'chat_id' => $chat_id,
    'text' => 'پنل گروه',
    'reply_markup' => inline_keyboard(
      array(
        array(
          array(
            'text' => 'مقامات','callback_data' => 'panel_admins'
          )
      ),array(
           array(
            'text' => 'اطلاعات گروه','callback_data' => 'panel_group_information'
          )
        ),array(
          array(
            'text' => 'لیست فیلتر','callback_data' => 'panel_filter_list'
          ),array(
            'text' => 'لیست سکوت','callback_data' => 'panel_silent_list'
          )
          ),array(
            array(
              'text' => 'لیست اخطار','callback_data' => 'panel_warning_list'
            ),array(
              'text' => 'لیست استثنا','callback_data' => 'panel_special_list'
            )
          ),array(
            array(
              'text' => 'تنظیمات','callback_data' => 'panel_options'
            ),array(
              'text' => 'مدیریت حساسیت','callback_data' => 'panel_sense'
            )
          )
        )
        )
      ]);

  }elseif($inline_button_data == 'panel'){
    req('editMessageText',[
        'chat_id' => $chat_id,
        'message_id' => $inline_message_id,
        'text' => 'پنل گروه',
        'reply_markup' => inline_keyboard(
          array(
            array(
              array(
                'text' => 'مقامات','callback_data' => 'panel_admins'
              )
            ),array(
              array(
                'text' => 'اطلاعات گروه','callback_data' => 'panel_group_information'
              )
            ),array(
              array(
                'text' => 'لیست فیلتر','callback_data' => 'panel_filter_list'
              ),array(
                'text' => 'لیست سکوت','callback_data' => 'panel_silent_list'
              )
            ),array(
              array(
                'text' => 'لیست اخطار','callback_data' => 'panel_warning_list'
              ),array(
                'text' => 'لیست استثنا','callback_data' => 'panel_special_list'
              )
            ),array(
              array(
                'text' => 'تنظیمات','callback_data' => 'panel_options'
              ),array(
                'text' => 'مدیریت حساسیت','callback_data' => 'panel_sense'
              )
            )
          )
          )
    ]);
  }
?>

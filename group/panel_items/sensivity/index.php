<?php
$plus ='➕';
$negative = '➖';
$sql = "SELECT `username`,`name` FROM `$chat_id` WHERE `silent`='0'";
$re = $conn->query($sql);
$arr = array();
foreach ($re as $point) {
  $arr[$point['name']] = $point['username'];
}
req('editMessageText',[
  'chat_id' => $chat_id,
  'message_id' => $inline_message_id,
  'text' => 'به مدیریت حساسیت گروه خوش امدید',
  'reply_markup' => inline_keyboard(
    array(
      array(
        array(
          'text' => 'محدودیت عضو دعوتی','callback_data' => 'sensivity_alert'
        )
      ),array(
        array(
          'text' => $plus,'callback_data' => 'sensivity_shouldadd_plus'
        ),array(
          'text' => $arr['shouldadd'],'callback_data' => 'sensivity_alert'
        ),array(
          'text' => $negative,'callback_data' => 'sensivity_shouldadd_negative'
        )
      ),array(
        array(
          'text' => 'حساسیت بلندی متن به کاراکتر','callback_data' => 'sensivity_alert'
        )
      ),array(
        array(
          'text' => $plus,'callback_data' => 'sensivity_longpm_plus'
        ),array(
          'text' => $arr['longpm'],'callback_data' => 'sensivity_alert'
        ),array(
          'text' => $negative,'callback_data' => 'sensivity_longpm_negative'
        )
      ),array(
        array(
          'text' => 'حساسیت کوتاهی متن','callback_data' => 'sensivity_alert'
        )
      ),array(
        array(
          'text' => $plus,'callback_data' => 'sensivity_shortpm_plus'
        ),array(
          'text' => $arr['shortpm'],'callback_data' => 'sensivity_alert'
        ),array(
          'text' => $negative,'callback_data' => 'sensivity_shortpm_negative'
        )
      ),array(
        array(
          'text' => 'حساسیت تعداد فلود','callback_data' => 'sensivity_alert'
        )
      ),array(
        array(
          'text' => $plus,'callback_data' => 'sensivity_floodcount_plus'
        ),array(
          'text' => $arr['floodcount'],'callback_data' => 'sensivity_alert'
        ),array(
          'text' => $negative,'callback_data' => 'sensivity_floodcount_negative'
        )
      ),array(
        array(
          'text' => 'حساسیت زمانی فلود','callback_data' => 'sensivity_alert'
        )
      ),array(
        array(
          'text' => $plus,'callback_data' => 'sensivity_floodtime_plus'
        ),array(
          'text' => $arr['floodtime'],'callback_data' => 'sensivity_alert'
        ),array(
          'text' => $negative,'callback_data' => 'sensivity_floodtime_negative'
        )
      )
    )
  )
]);
?>

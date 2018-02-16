<?php
if ($ress == 'admin' or $ress == 'creator'){

  if ($message_text == 'panel' or $message_text == 'Panel' or $message_text == 'پنل' or $inline_button_data == 'panel'){
    include './group/panel.php';
  }elseif($inline_button_data == 'panel_admins'){
    include './group/panel_items/admins.php';
  }elseif($inline_button_data == 'panel_group_information'){
    include './group/panel_items/group_information.php';
  }elseif($message_text == 'silent' or $message_text == 'سکوت'){
    include './group/panel_items/silent.php';
  }elseif($message_text == 'silent off' or $message_text == 'رفع سکوت'){
    include './group/panel_items/silent_off.php';
  }elseif($inline_button_data == 'panel_silent_list'){
    include './group/panel_items/silent_list.php';
  }elseif(strtolower(explode(' ',$message_text)[0]) == 'mutetime'){
    include './group/panel_items/silent_time.php';
  }elseif($message_text == 'allow' or $message_text == 'مجاز'){
    include './group/panel_items/set_allowed.php';
  }elseif($message_text == 'unallow' or $message_text == 'عزل مجاز'){
    include './group/panel_items/allowed_off.php';
  }elseif(substr($message_text,0,strlen('filter')) == 'filter' or explode(' ',$message_text)[0] == 'فیلتر'){
    include './group/panel_items/filter.php';
  }elseif ($inline_button_data == 'panel_filter_list') {
    include './group/panel_items/filter_list.php';
  }elseif ($message_text == 'promote' or $message_text == 'ترفیع') {
    include './group/panel_items/promote.php';
  }elseif($message_text == 'demote' or $message_text == 'عزل'){
    include './group/panel_items/demote.php';
  }elseif($message_text == 'setowner'){
    include './group/panel_items/setowner.php';
  }elseif($inline_button_data == 'delete_all_filters'){
    include './group/panel_items/delete_all_filters.php';
  }elseif($inline_button_data == 'delete_all_silents'){
    include './group/panel_items/delete_all_silents.php';
  }elseif(substr($message_text,0,strlen('unfilter')) == 'unfilter' or explode(' ',$message_text)[0].' '.explode(' ',$message_text)[1] == 'رفع فیلتر'){
    include './group/panel_items/unfilter.php';
  }elseif(strtolower($message_text) == 'mutesticker' or strtolower(explode(' ',$message_text)[0].' '.explode(' ',$message_text)[1]) == 'سکوت استیکر'){
    include './group/panel_items/sticker.php';
  }elseif($inline_button_data == 'panel_options' or $inline_button_data == 'panel_options_2'){
    include './group/panel_items/options_items/index.php';
  }elseif($inline_button_data == 'panel_sense'){
    include './group/panel_items/sensivity/index.php';
  }elseif(substr($inline_button_data,0,strlen('sensivity_')) == 'sensivity_'){
    include './group/panel_items/sensivity/controller.php';
  }elseif(explode('_',$inline_button_data)[0] == 'options'){
    include './group/panel_items/options_items/controller.php';
  }elseif($inline_button_data == 'clear_allowed'){
    include './group/panel_items/clear_allowed.php';
  }elseif($inline_button_data == 'clear_admins'){
    include './group/panel_items/clear_admins.php';
  }
  /***
  Text Commands
  **/
  $explode = explode(' ',$message_text);
  if ($explode[0] == 'setowner' and isset($explode[1])){
    include './group/panel_items/text_commands/setowner.php';
  }elseif(strtolower($explode[0]) == 'allow' and isset($explode[1])){
    include './group/panel_items/text_commands/allow.php';
  }elseif(strtolower($explode[0]) == 'promote' and isset($explode[1])){
    include './group/panel_items/text_commands/promote.php';
  }elseif(strtolower($explode[0]) == 'user' and isset($explode[1])){
    include './group/panel_items/text_commands/user.php';
  }elseif(strtolower($explode[0]) == 'setaddlim' and isset($explode[1])){
    include './group/panel_items/text_commands/add_limit.php';
  }elseif(strtolower($explode[0]) == 'demote' and isset($explode[1])){
    include './group/panel_items/text_commands/demote.php';
  }elseif(strtolower($explode[0]) == 'link'){
    include './group/panel_items/text_commands/link.php';
  }elseif(strtolower($explode[0]) == 'unallow'){
    include './group/panel_items/text_commands/unallow.php';
  }elseif(strtolower($explode[0]) == 'mutesticker'){
    include './group/panel_items/text_commands/mutesticker.php';
  }elseif(strtolower($explode[0]) == 'unmute'){
    include './group/panel_items/text_commands/unmute.php';
  }elseif(strtolower($explode[0]) == 'warn'){
    include './group/panel_items/text_commands/warn.php';
  }elseif(strtolower($explode[0]) == 'unwarn'){
    include './group/panel_items/text_commands/unwarn.php';
  }elseif(strtolower($explode[0]) == 'exp'){
    include './group/panel_items/text_commands/exp.php';
  }elseif(strtolower($explode[0]) == 'unexp'){
    include './group/panel_items/text_commands/unexp.php';
  }elseif(strtolower($explode[0]) == 'del'){
    include './group/panel_items/text_commands/del.php';
  }elseif (strtolower($explode[0]) == 'lockgp') {
    include './group/panel_items/text_commands/lock_group.php';
  }elseif(strtolower($explode[0]) == 'unlockgp'){
    include './group/panel_items/text_commands/unlock_group.php';
  }elseif(strtolower($explode[0]) == 'locktime'){
    include './group/panel_items/text_commands/locktime.php';
  }
}else{)
  if ($ress == 'member'){
    $limit = $conn->query("SELECT `username` FROM `".$chat_id."` WHERE `name`='lock_group' and `silent`='0'")->fetch_object()->username;
    if (time() <= $limit){
      del_message($chat_id,$message_id);
    }else{
      if (isset($data->message->new_chat_members)){
        $a = sizeof($data->message->new_chat_members);
        $sql = "UPDATE `$chat_id` SET `user_add`=$a+user_add WHERE `tg_id`='$user_id'";
        $r = $conn->query($sql);
      }
      $del = false;
      $sql = "SELECT `name`,`position` FROM `$chat_id` WHERE `silent`='0'";
      $result = $conn->query($sql);
      $options = array();
      foreach ($result as $op){
        $options[$op['name']] = $op['position'];
      }
      if($options['fwdch'] == 'true' and isset($fwd_type)){
        if ($fwd_type == 'channel'){
          del_message($chat_id,$message_id);
          $del = true;
        }
      }
      if($options['fwdus'] == 'true' and isset($fwd)){
          del_message($chat_id,$message_id);
          $del = true;
      }
      if(isset($message_text) and $del == false){
        if ($options['text'] == 'true'){
          del_message($chat_id,$message_id);
          $del = true;
        }elseif(isset($ent)){
          if($options['link'] == 'true'){
            for ($i = 0;$i < sizeof($ent);$i++){
              if ($ent[$i]->type == 'url'){
                del_message($chat_id,$message_id);
                $del = true;
              }
            }
          }
          if($options['tag'] == 'true' and $del == false){
            for ($i = 0;$i < sizeof($ent);$i++){
              if ($ent[$i]->type == 'mention'){
                del_message($chat_id,$message_id);
                $del = true;
              }
            }
          }
          if($options['hyperlink'] == 'true' and $del == false){
            for ($i = 0;$i < sizeof($ent);$i++){
              if ($ent[$i]->type == 'text_link'){
                del_message($chat_id,$message_id);
                $del = true;
              }
            }
          }
        }
      }
      if($options['sticker'] == 'true' and isset($data->message->sticker) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['photo'] == 'true' and isset($data->message->photo) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['voice'] == 'true' and isset($data->message->voice) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['system'] == 'true' and $del == false){
        if(isset($data->message->new_chat_participant) or isset($data->message->left_chat_participant) or isset($data->message->pinned_message)){
          del_message($chat_id,$message_id);
          $del = true;
        }
      }
      if($options['music'] == 'true' and isset($data->message->audio) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['document'] == 'true' and isset($data->message->document) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['contact'] == 'true' and isset($data->message->contact) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['map'] == 'true' and isset($data->message->location) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['music'] == 'true' and isset($data->message->audio) and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['bot'] == 'true' and $data->message->from->is_bot == 'true' and $del == false){
        del_message($chat_id,$message_id);
        $del = true;
      }
      if($options['bot'] == 'true' and isset($data->message->new_chat_members)){
        for ($i = 0;$i < sizeof($data->message->new_chat_members) ; $i++){
          if ($data->message->new_chat_members[$i]->is_bot == true){
            req('kickChatMember',[
              'chat_id' => $chat_id,
              'user_id' => $data->message->new_chat_members[$i]->id,
              'until_date' => strtotime('+2 days')
            ]);
          }
        }
      }
      if($options['join'] == 'true' and isset($data->message->new_chat_members)){
        for ($i = 0;$i < sizeof($data->message->new_chat_members) ; $i++){
            req('kickChatMember',[
              'chat_id' => $chat_id,
              'user_id' => $data->message->new_chat_members[$i]->id,
              'until_date' => strtotime('+2 days')
            ]);
        }
      }
      if($options['persian'] == 'true' and isset($message_text) and $del == false){
        $str = 'ا ب پ ت ث ج چ ح خ د ذ ر ز ژ ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی';
        $per = explode(' ', $str);
        for ($i = 0;$i < strlen($message_text);$i++){
          if (in_array($message_text[$i],$per)){
            del_message($chat_id,$message_id);
            $del = true;
          }
        }
      }
      if($options['english'] == 'true' and isset($message_text) and $del == false){
        $str = 'a b c d e f g h i j k l m n o p q r s t u v w x y z';
        $eng = explode(' ', $str);
        for ($i = 0;$i < strlen($message_text);$i++){
          if (in_array($message_text[$i],$eng)){
            del_message($chat_id,$message_id);
            $del = true;
          }
        }
      }
      if($del == false){
        $sql = "SELECT `name`,`username` FROM `$chat_id` WHERE `silent`='0'";
        $result = $conn->query($sql);
        $options = array();
        foreach ($result as $op){
          $options[$op['name']] = $op['username'];
        }
        $u = $conn->query("SELECT `tg_id` FROM $chat_id WHERE `name`='longpm' and `silent`='0'");

        if($options['longpm'] <= strlen($message_text) and $u == 1){
          del_message($chat_id,$message_id);
          $del = true;
        }
        $u = $conn->query("SELECT `tg_id` FROM $chat_id WHERE `name`='shortpm' and `silent`='0'");
        if($options['shortpm'] >= strlen($message_text) and $del == false and $u == 1){
          del_message($chat_id,$message_id);
          $del = true;
        }
        $user_add = $conn->query("SELECT user_add FROM `$chat_id` WHERE `tg_id`='$user_id'")->fetch_object()->user_add;
        if ($user_add < $options['shouldadd'] and $options['shouldadd'] == 'true' and $del == false){
          del_message($chat_id,$message_id);
          $del = true;
        }
      }



      if ($del == false){
        include './group/panel_items/filter_check.php';
      }
    }
  }
}
?>

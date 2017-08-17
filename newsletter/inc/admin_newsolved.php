<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


   	$newsolved_sendlast = $_POST['newsolved_sendlast'];
    $newsolved_senddates = $_POST['newsolved_senddates'];
    $newsolved_send_type = $_POST['newsolved_send_type'];
	$newsolved_prefix = $aus_settings->newsolved_plugin_prefix;

    if($newsolved_send_type == "last" && !empty($newsolved_sendlast))
    {
        $get_news=$mysql->query("SELECT id, name, mail, topic, cat,related_link1_descr,related_link1_url,related_link1_target,related_link2_descr,related_link2_url,related_link2_target,related_link3_descr,related_link3_url,related_link3_target,related_link4_descr,related_link4_url,related_link4_target,related_link5_descr,related_link5_url,related_link5_target, msg,date,date_format(date, '%d.%m.%Y') AS date_new FROM $newsolved_prefix"."_entries LIMIT 0, $newsolved_sendlast");
    }
    else if($newsolved_send_type == "date")
    {
        $get_news=$mysql->query("SELECT id, name, mail, topic, cat,related_link1_descr,related_link1_url,related_link1_target,related_link2_descr,related_link2_url,related_link2_target,related_link3_descr,related_link3_url,related_link3_target,related_link4_descr,related_link4_url,related_link4_target,related_link5_descr,related_link5_url,related_link5_target, msg,date,date_format(date, '%d.%m.%Y') AS date_new FROM $newsolved_prefix"."_entries WHERE date='$newsolved_senddates'");
    }

    if($mysql->numRows($get_news) !=0 )
    {
        while($aus_news=$mysql->fetchObject($get_news))
        {
            $news_modded = $aus_news->msg;

            //--- BB Code rausstreichen ---

            if(strstr($news_modded,"[/b]")==true)
            {
                $news_modded=str_replace("[b]", "", $news_modded);
                $news_modded=str_replace("[/b]", "", $news_modded);
            }
            if(strstr($news_modded,"[/table]")==true)
            {
                $news_modded=str_replace("[table]", "", $news_modded);
                $news_modded=str_replace("[/table]", "", $news_modded);
            }
            if(strstr($news_modded,"[/tr]")==true)
            {
                $news_modded=str_replace("[tr]", "", $news_modded);
                $news_modded=str_replace("[/tr]", "", $news_modded);
            }
            if(strstr($news_modded,"[/td]")==true)
            {
                $news_modded=str_replace("[td]", "", $news_modded);
                $news_modded=str_replace("[/td]", "", $news_modded);
            }
            if(strstr($news_modded,"[/i]")==true)
            {
                $news_modded=str_replace("[i]", "", $news_modded);
                $news_modded=str_replace("[/i]", "", $news_modded);
            }
            if(strstr($news_modded,"[/u]")==true)
            {
                $news_modded=str_replace("[u]", "", $news_modded);
                $news_modded=str_replace("[/u]", "", $news_modded);
            }
            if(strstr($news_modded,"[/s]")==true)
            {
                $news_modded=str_replace("[s]", "", $news_modded);
                $news_modded=str_replace("[/s]", "", $news_modded);
            }
            if(strstr($news_modded,"[/center]")==true)
            {
                $news_modded=str_replace("[center]", "", $news_modded);
                $news_modded=str_replace("[/center]", "", $news_modded);
            }
            if(strstr($news_modded,"[/right]")==true)
            {
                $news_modded=str_replace("[right]", "", $news_modded);
                $news_modded=str_replace("[/right]", "", $news_modded);
            }
            if(strstr($news_modded,"[/list]")==true)
            {
                $news_modded=str_replace("[list]", "", $news_modded);
                $news_modded=str_replace("[/list]", "", $news_modded);
                $news_modded=str_replace("[*]", "<li>", $news_modded);
            }
            if(strstr($news_modded,"[/color]")==true)
            {
                $news_modded=preg_replace("/\[color=(.*?)\](.*?)\[\/color\]/si","", $news_modded);
            }
            if(strstr($news_modded,"[/size]")==true)
            {
                $news_modded=preg_replace("/\[size=(.*?)\](.*?)\[\/size\]/si","", $news_modded);
            }
            if(strstr($news_modded,"[/font]")==true)
            {
                $news_modded=preg_replace("/\[font=(.*?)\](.*?)\[\/font\]/si","", $news_modded);
            }
            if(strstr($news_modded,"[/img]")==true)
            {
                $news_modded=preg_replace("/\[img\](.*?)\[\/img\]/si","", $news_modded);
            }
            if(strstr($news_modded,"[/url]")==true)
            {
                $news_modded=preg_replace("/\[url=(.*?)\](.*?)\[\/url\]/si","", $news_modded);
            }
            if(strstr($news_modded,"[/email]")==true)
            {
                $news_modded=preg_replace("/\[email=(.*?)\](.*?)\[\/email\]/si","", $news_modded);
            }
            if(strstr($news_modded,"[/flash]")==true)
            {
                $news_modded=preg_replace("/\[flash width=(.*?) height=(.*?)\](.*?)\[\/flash\]/si","", $news_modded);
            }

            $message_addednews .= $aus_news->topic." - ".$aus_news->date_new."\r\n".$news_modded."\r\n\r\n";
        }

    }
    else
    {
        $error_output .= "<tr><td>".$lang['sendform_nonewsfound']."!</td></tr>";
        $error_nonews = "ok";
    }


?>
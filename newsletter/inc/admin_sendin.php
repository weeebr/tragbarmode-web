<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');
if(defined('enter_contact'))
{


$viewid=$_GET['viewid'];
$delid=$_GET['delid'];
$page=$_GET['page'];

#####################################

if(!empty($delid))
{
    $mysql->query("DELETE FROM {$prefix}_send_in WHERE id='{$delid}'");
    $mysql->query("DELETE FROM {$prefix}_send_out WHERE id_in='{$delid}'");
}


#####################################

if($_POST['send_out_ok'])
{
    $datum=time();
    $topic=$_POST['topic'];
    $message_orig=$_POST['message'];
    $to_mail=$_POST['to_mail'];

    $message=str_replace("\n", "<BR>",$message_orig);
    $message_send=str_replace("\r\n","\n",$message_orig);

    $header="From: $user_mail <$user_mail>";
    mail($to_mail, $topic, $message_send, $header);

    $mysql->query("INSERT INTO {$prefix}_send_out (id_in,id_user,topic,message,date) VALUES ('$viewid','$user_id','$topic','$message','$datum')");
    $mysql->query("UPDATE {$prefix}_send_in SET answered='1' WHERE id='{$viewid}'");
}

if($_POST['forward_ok'])
{
    $datum=time();
    $topic=$_POST['topic'];
    $message_orig=$_POST['message'];
    $to_mail=$_POST['emailtosend'];

    $message_send=str_replace("\r\n","\n",$message_orig);

    $header="From: $user_mail <$user_mail>";


    if(!empty($to_mail))
    {
    	mail($to_mail, $topic, $message_send, $header);
    	echo $lang['sendin_forwardsuccess'];
    }
    else
    	echo $lang['sendin_forwarderror'];

}


echo "<table>";
echo "<tr><td width=\"16\"></td><td><b>".$lang['sendin_contact'].":</b></td></tr>";
echo "</table><br>";


if($viewid)
{

    $get_viewed=$mysql->query("SELECT * FROM {$prefix}_intern_users WHERE id='{$user_id}'");
    $aus_viewed=$mysql->fetchObject($get_viewed);
    $viewed=$aus_viewed->viewed;
    $viewed_array=explode(",",$viewed);

        if(array_search($viewid,$viewed_array)==false)
        {
            $viewed.=",".$viewid;
            $mysql->query("UPDATE {$prefix}_intern_users SET viewed='$viewed' WHERE id='{$user_id}'");
        }

    $get_message=$mysql->query("SELECT * FROM {$prefix}_send_in WHERE id='{$viewid}'");
    $aus_message=$mysql->fetchObject($get_message);

    echo "<table>";
    echo "<tr><td width=\"16\"></td><td><b>&laquo;</b> <a href=\"".$inclusion_path."s=$s&page=$page\">".$lang['sendin_back']."</a></td></tr>";
    echo "</table><br>";

    echo "<table cellpadding=\"0\" cellspacing=\"0\"><tr>";

        echo "<td width=\"20\">";
        echo "</td>";

        echo "<td valign=\"top\"><table>";
        echo "<tr><td width=\"90\"><b>".$lang['sendin_date'].":</b></td><td>".date("d.m.Y",$aus_message->date)."</td></tr>";
        echo "<tr><td height=\"10\"></td></tr>";
        echo "<tr><td><b>".$lang['sendin_title'].":</b></td><td>";if($aus_settings->sendin_title==1){if($aus_message->title==0)echo $lang['osendin_title_male']; else echo $lang['osendin_title_female'];} else echo "-"; echo "</td></tr>";
        echo "<tr><td><b>".$lang['sendin_name'].":</b></td><td>";if(!empty($aus_message->name))echo $aus_message->name;else echo "-";echo "</td></tr>";
        echo "<tr><td><b>".$lang['sendin_surename'].":</b></td><td>";if(!empty($aus_message->surname))echo $aus_message->surname;else echo "-";echo "</td></tr>";
        echo "<tr><td><b>".$lang['sendin_email'].":</b></td><td>".$aus_message->mail."</td></tr>";
        echo "<tr><td><b>".$lang['sendin_city'].":</b></td><td>";if(!empty($aus_message->city))echo $aus_message->city;else echo "-";echo "</td></tr>";
        echo "<tr><td><b>".$lang['sendin_telephone'].":</b></td><td>";if(!empty($aus_message->tel))echo $aus_message->tel;else echo "-";echo "</td></tr>";
        echo "<tr><td><b>".$lang['sendin_subject'].":</b></td><td>";if(!empty($aus_message->topic))echo $aus_message->topic;else echo "-";echo "</td></tr>";
        echo "<tr><td valign=\"top\"><b>".$lang['sendin_message'].":</b></td><td width=\"200\">".$aus_message->message."</td></tr>";

        echo "<tr><td height=\"10\"></td></tr>";
        echo "<tr><td></td><td><b>&raquo; <a href=\"admin.php?s=sendin&viewid={$viewid}&page=$page&forward=ok\">".$lang['sendin_forward']."</a></b></td></tr>";
        echo "</table></td>";

        echo "<td width=\"10\">";
        echo "</td>";

        if(!empty($_GET['forward']))
        {

            echo "<form action=\"$php_self\" method=\"post\">";
            echo "<td valign=\"top\"><table>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_date'].":</b></td><td>".date("d.m.Y",time())."</td></tr>";
            echo "<tr><td height=\"10\"></td></tr>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_email'].":</b></td><td>".$user_mail."</td></tr>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_emailtosend'].":</b></td><td><input type=\"text\" name=\"emailtosend\" value=\"".$emailtosend."\" style=\"width:230px;\"></td></tr>";

            //if(empty($topic))$topic="Re: ".$aus_message->topic;
            if(empty($topic))$topic="Fwd: ".$aus_message->topic;

            $message = "\n\n--- ".$lang['sendin_originalmsg']." ---\n".$lang['sendin_subject'].": ".$aus_message->topic."\n".$lang['sendin_date'].": ".date("d.m.Y",$aus_message->date)."\n".$lang['sendin_email'].": ".$aus_message->mail."\n\n".$aus_message->message;

            echo "<tr><td><b>".$lang['sendin_subject']."</b></td><td><input type=\"text\" name=\"topic\" value=\"".$topic."\" style=\"width:230px;\"></td></tr>";
            echo "<tr><td valign=\"top\"><b>".$lang['sendin_message'].":</b></td><td><textarea name=\"message\" style=\"width:230px;height:150px;\">".$message."</textarea></td></tr>";
            echo "<tr><td height=\"8\"></td></tr>";
            echo "<tr><td></td><td><input type=\"submit\" name=\"forward_ok\" value=\"".$lang['sendin_button_forward']."\" style=\"width:230px;\"></td></tr>";

            echo "<input type=\"hidden\" name=\"to_mail\" value=\"".$aus_message->mail."\">";

            echo "</table></td>";
            echo "</form>";

        }
        else if($aus_message->answered=="0")
        {
            echo "<form action=\"$php_self\" method=\"post\">";
            echo "<td valign=\"top\"><table>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_date'].":</b></td><td>".date("d.m.Y",time())."</td></tr>";
            echo "<tr><td height=\"10\"></td></tr>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_email'].":</b></td><td>".$user_mail."</td></tr>";

            //if(empty($topic))$topic="Re: ".$aus_message->topic;
            if(empty($topic))$topic="Re: ".$aus_message->topic;

            if(!empty($aus_settings->sendin_sig) && empty($message))
                $message = $aus_settings->sendin_sig;

            echo "<tr><td><b>".$lang['sendin_subject']."</b></td><td><input type=\"text\" name=\"topic\" value=\"".$topic."\" style=\"width:230px;\"></td></tr>";
            echo "<tr><td valign=\"top\"><b>".$lang['sendin_message'].":</b></td><td><textarea name=\"message\" style=\"width:230px;height:150px;\">".$message."</textarea></td></tr>";
            echo "<tr><td height=\"8\"></td></tr>";
            echo "<tr><td></td><td><input type=\"submit\" name=\"send_out_ok\" value=\"".$lang['sendin_button_send']."\" style=\"width:230px;\"></td></tr>";

            echo "<input type=\"hidden\" name=\"to_mail\" value=\"".$aus_message->mail."\">";

            echo "</table></td>";
            echo "</form>";
        }
        else
        {

            $get_answer=$mysql->query("SELECT * FROM {$prefix}_send_out WHERE id_in='{$viewid}'");
            $aus_answer=$mysql->fetchObject($get_answer);

            $get_userans=$mysql->query("SELECT * FROM {$prefix}_intern_users WHERE id='{$aus_answer->id_user}'");
            $aus_userans=$mysql->fetchObject($get_userans);


            echo "<td valign=\"top\"><table>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_date'].":</b></td><td>".date("d.m.Y",$aus_answer->date)."</td></tr>";
            echo "<tr><td height=\"10\"></td></tr>";
            echo "<tr><td width=\"90\"><b>".$lang['sendin_email'].":</b></td><td>".$aus_userans->mail."</td></tr>";
            echo "<tr><td><b>Thema:</b></td><td>".$aus_answer->topic."</td></tr>";
            echo "<tr><td valign=\"top\"><b>".$lang['sendin_message'].":</b></td><td>".$aus_answer->message."</td></tr>";
            echo "</table></td>";

        }

    echo "</td></table>";
}

#####################################################################

if(!$viewid)
{
    echo "<table>";
    echo "<tr><td width=\"16\"></td><td width=\"200\"><u>".$lang['sendin_subject']."</u></td><td width=\"80\"><u>".$lang['sendin_date']."</u></td></tr>";

    $fontcolor="#000000";


	$page_temp=$page;
    if(!$page)
    {
    $page="1";
    }
    $page--;
    $limit=20*$page;

	$view_ids=explode(",",$user_viewed);
    $get_messages=$mysql->query("SELECT * FROM {$prefix}_send_in ORDER BY date DESC LIMIT $limit,20");
    while($aus_messages=$mysql->fetchObject($get_messages))
    {
        if($aus_messages->answered=="0" && (in_array($aus_messages->id,$view_ids)==true) )
        {
            $fontcolor="#000000";
            $image="icon_sendin_viewed.gif";
        }
        elseif($aus_messages->answered=="1")
        {
            $fontcolor="#000000";
            $image="icon_sendin_answered.gif";
        }
        else
        {
            $fontcolor="#FF9900";
            $image="icon_sendin_standard.gif";
        }

		if(empty($aus_messages->topic))$show_topic="&lt;".$lang['sendin_nosubject']."&gt;";
		else $show_topic=$aus_messages->topic;

        echo "<tr><td><img src=\"images/".$image."\"></td><td><a href=\"".$inclusion_path."s=$s&viewid=".$aus_messages->id."&page=$page_temp\" style=\"color:".$fontcolor.";\">".$show_topic."</a></td><td>".date("d.m.Y",$aus_messages->date)."</td><td><a href=\"".$inclusion_path."s=$s&delid=".$aus_messages->id."\" onClick=\"return confirm('".$lang['sendin_sure']."?')\"><img src=\"".$file_root."/images/delicon.gif\" border=\"0\"></a></td></tr>";
    }
	echo "</table>";


	echo "<table cellspacing=\"0\" cellpadding=\"0\">";

            #########################################################
            ################ Seitenzahlen anzeigen ##################

            echo "<tr><td height=\"12\"></td></tr>";
            echo "<tr><td width=\"20\"></td><td><table>";

            echo "<tr><td><b>[</b> ";

                $get_countid=$mysql->query("SELECT count(id) AS countid FROM {$prefix}_send_in");
                $aus_countid=$mysql->fetchObject($get_countid);
                $while_limit=$aus_countid->countid/20;
                $while_limit=ceil($while_limit);

                if($page=="0")
                {
                $snr=$page+1;
                }
                else if($page!="0")
                {
                $snr=$page;

                    if($page>1)
                    {
                    $snr_b=$page-1;
                    echo "<b><a href=\"".$inclusion_path."s=$s&page=$snr_b\">$font_a"."«"."$font_b</a></b> ";
                    }
                }
                else
                {
                $snr=$page+2;
                echo "<b><a href=\"".$inclusion_path."s=$s&page=$snr_n\">$font_a"."«"."$font_b</a></b>";
                }

                while($snr<=$while_limit)
                {

                        if($snr!=$while_limit)
                        {
                            $snr_c=$snr-1;
                            if($snr_c==$page)
                            echo "<a href=\"".$inclusion_path."s=$s&page=$snr\">$font_a"."<u>$snr</u>"."$font_b</a> . ";
                            else
                            echo "<a href=\"".$inclusion_path."s=$s&page=$snr\">$font_a"."$snr"."$font_b</a> . ";
                        }
                        else if($snr==$while_limit)
                        {
                            $snr_c=$snr-1;
                            if($snr_c==$page)
                            echo "<a href=\"".$inclusion_path."s=$s&page=$snr\">$font_a"."<u>$snr</u>"."$font_b</a>";
                            else
                            echo "<a href=\"".$inclusion_path."s=$s&page=$snr\">$font_a"."$snr"."$font_b</a>";
                        }

                        $if_limit=$page+4;
                        if($snr>=$if_limit)
                        {
                        $snr_n=$snr+1;

                            $c1=$while_limit-3;
                            $c2=$page+1;
                            if($c1!=$c2)
                            {
                            echo " <b><a href=\"".$inclusion_path."s=$s&page=$snr_n\">$font_a"."»"."$font_b</a></b>";
                            }


                        break;
                        }

                $snr++;
                }

            echo " <b>]</b>"."$font_b</td></tr>";

			echo "</table>";

echo "</table>";
}

}
else
	echo "No Access!";
?>
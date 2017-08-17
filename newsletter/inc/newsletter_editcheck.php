<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


    	$datum=date("Y-m-d");


        $get_blacklist_check=$mysql->query("SELECT mail FROM $prefix"."_blacklist WHERE mail='$mail'");
        if($mysql->numRows($get_blacklist_check)==0)
        {
            $mail=trim($mail);
            if(!preg_match( '/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/' , $mail))
            {
                if($aus_settings->message_type==1)
                {
                	if($aus_language->language_name=="English")
                	{
                	?>
                        <script type="text/javascript">
                        <!--
                        alert("Please verify the E-Mail address!");
                        //-->
                        </script>
                    <?php
                	}
                	else
                	{
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Mail Adresse auf Richtigkeit &uuml;berpr&uuml;fen!");
                        //-->
                        </script>
                    <?php
                    }
                }
                else
                {
                	if($aus_settings->newsletter_form==0)
                		$subscribe_message = $lang['onl_checkemail'];
                	else
                		$flash_message = $lang['onl_checkemail'];
                }
            }
            elseif($aus_settings->group_choice==1 && empty($_POST['group_id']) && $aus_settings->newsletter_form==0)
            {
                if($aus_settings->message_type==1)
                {
                	if($aus_language->language_name=="English")
                	{
                	?>
                        <script type="text/javascript">
                        <!--
                        alert("Please select at least one group!");
                        //-->
                        </script>
                	<?php
                	}
                	else
                	{
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Bitte mindestens eine Gruppe ausw&auml;hlen!");
                        //-->
                        </script>
                    <?php
                    }
                }
                else
                {
                	$subscribe_message = $lang['onl_checkgroup_edit'];
                }
            }
            else
            {
                $get_settings = $mysql->query("SELECT * FROM $prefix"."_settings");
    			$aus_settings = $mysql->fetchObject($get_settings);

            	#Daten editieren #

				$mysql->query("UPDATE {$prefix}_entries SET mail='{$mail}', title='{$title}', forename='{$forename}', surname='{$surname}' WHERE id_unique='{$PROFILE_ID}'");


                if($aus_settings->group_choice == 1)
                {
                    $get_userid=$mysql->query("SELECT * FROM {$prefix}_entries WHERE id_unique='{$PROFILE_ID}'");
                   	$aus_userid=$mysql->fetchObject($get_userid);
                    $id_user = $aus_userid->id;
                    $group_id = $_POST['group_id'];


					if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 0)
					{
                        $mysql->query("DELETE FROM {$prefix}_group_def WHERE id_user='{$id_user}' AND (SELECT hidden FROM {$prefix}_groups WHERE {$prefix}_groups.id={$prefix}_group_def.id_group) <> 1");


                        $i = 1;
                        $get_groups = $mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
                        while($aus_groups = $mysql->fetchObject($get_groups))
                        {
                            if(!empty($group_id[$i]))
                                $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('{$id_user}','{$group_id[$i]}')");

                            $i++;
                        }

					}
					else if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 1)
					{
						$mysql->query("DELETE FROM {$prefix}_group_def WHERE id_user='{$id_user}' AND (SELECT hidden FROM {$prefix}_groups WHERE {$prefix}_groups.id={$prefix}_group_def.id_group) <> 1");

                        $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('{$id_user}','{$group_id}')");
				
					}


/*
alternative:

                    $get_groups = $mysql->query("SELECT DISTINCT id, groupname FROM {$prefix}_groups AS g, {$prefix}_group_def AS def WHERE g.id=def.id_group AND g.hidden<>1");
                    while($aus_groups = $mysql->fetchObject($get_groups))
                    {
						mysql_query("DELETE FROM {$prefix}_group_def WHERE id_user='{$id_user}' AND id_group='{$aus_groups->id}' ");
					}
*/


                }


                if($aus_settings->message_type==1)
                {
                    if($aus_language->language_name=="English")
                    {
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Successfully edited your profile!");
                        //-->
                        </script>
                    <?php
                    }
                    else
                    {
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Erfolgreich dein Profil editiert!");
                        //-->
                        </script>
                    <?php
                    }
                }
                else
                {
                	$subscribe_message = $lang['onl_success_edit'];
                }

                unset($mail);
            }
        }

        else
        {
            if($aus_settings->message_type==1)
            {
                if($aus_language->language_name=="English")
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("E-Mail is forbidden!");
                    //-->
                    </script>
                <?php
                }
                else
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("E-Mail wurde vom Admin verboten!");
                    //-->
                    </script>
                <?php
                }
            }
            else
            {
            	$subscribe_message = $lang['onl_error_edit'];
        	}
        }
?>
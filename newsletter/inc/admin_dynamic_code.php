<?php
$code00 = <<<code
  \$get_mailaddi  = \$mysql->query("SELECT id, id_unique, mail, title, forename, surname "
                                . "FROM {\$prefix}_entries WHERE id={\$aus_id_user->id_user}");
  \$aus_mailaddi  = \$mysql->fetchObject(\$get_mailaddi);

  \$nletter_title = \$aus_mailaddi->title;
  \$id_unique     = \$aus_mailaddi->id_unique;
  \$id            = \$aus_mailaddi->id;
code;
$code01 = <<<code
  \$nletter_title = \$aus_id_user->title;
  \$id_unique     = \$aus_id_user->id_unique;
  \$id            = \$aus_id_user->id;
code;

$code02 = <<<code
  \$nletter_title_string = (\$nletter_title == 0) ? \$aus_settings->replace_form_title_mr : \$aus_settings->replace_form_title_mrs;
code;
$code03 = <<<code
  \$unsublink = "{\$job['acturl']}/newsletter.php?unlink_mail={\$id_unique}";
code;
$code04 = <<<code
  \$profilelink = "{\$job['acturl']}/newsletter.php?profile_id={\$id_unique}";
code;

$code05 = <<<code
  unset(\$nletter_groups);
  \$get_usergroups = \$mysql->query("SELECT id_group FROM {\$prefix}_group_def WHERE id_user={\$id}");
  while(\$aus_usergroups = \$mysql->fetchObject(\$get_usergroups))
  {
    \$get_usergroups_name = \$mysql->query("SELECT groupname FROM {\$prefix}_groups WHERE id={\$aus_usergroups->id_group}");
    \$aus_usergroups_name = \$mysql->fetchObject(\$get_usergroups_name);
    \$nletter_groups .= "{\$aus_usergroups_name->groupname}, ";
  }
  \$nletter_groups = substr(\$nletter_groups, 0, -2);
code;

?>
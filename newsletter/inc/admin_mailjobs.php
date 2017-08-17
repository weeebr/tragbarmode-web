<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

  error_reporting(0);
  include('../settings/connect.php');

  header('Cache-Control: no-cache, must-revalidate', true);
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT', true);

  $mysql->query("DELETE FROM {$prefix}_mailjobs WHERE finished<".(time()-(3*60))." AND finished!=0");

  if (array_key_exists('abort', $_COOKIE))
  {
    $mysql->query("UPDATE {$prefix}_mailjobs SET finished=".time()." WHERE timestamp={$_COOKIE['abort']} AND finished=0");
    die();
  }

  $response = '';
  if (!$result = $mysql->query("SELECT timestamp,mailSent,mailTotal,finished,lastID,lastTimestamp FROM {$prefix}_mailjobs"))
    die();

  while ($job = $mysql->fetchRow($result))
    $response .= '#' . implode('|', $job);

  $mysql->freeResult($result);

  echo $_COOKIE['challenge'];
  if ($response)
    echo '#'.time().'000' . $response;
?>
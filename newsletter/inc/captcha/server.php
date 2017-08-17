<?php
/**
 * CAPTCHA image server
 *
 */

require_once ( './class.captcha_x.php');
require_once ( '../../settings/connect.php');

$server = &new captcha_x ();
$server->handle_request ();

?>
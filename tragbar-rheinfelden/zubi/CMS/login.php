<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<link rel="stylesheet" type="text/css" href="CMSdesign.css">
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error" align="center">Fehler beim Anmelden. Versuchen Sie es erneut oder wenden Sie sich an Ihren Systemadministrator.</p>';
        }
       
        if (isset($_GET['notlogged'])) {
            echo '<p class="notlogged" align="center">Sie sind nicht angemeldet. Bitte melden Sie sich an.</p>';
        }
		
		if (isset($_GET['loggedout'])) {
            echo '<p class="loggedout" align="center">Sie wurden erfolgreich abgemeldet.</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">
		<table border="0" align="center">
		<tr>
		<td>
            Benutzername: 
		</td>
		<td>
			<input type="text" name="email" />
		</td>
		</tr>
		<tr>
		<td>
            Passwort: 
		</td>
		<td>
			<input type="password" 
                             name="password" 
                             id="password"/>
		</td>
		</tr>
		<tr>
		<td colspan="2" align="center">
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" />
		</td>
		</tr>
		</table>
        </form>
    </body>
</html>
<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


###################################################
#################### Tooltips #####################
###################################################


$lang['tooltip_1']="Hier Ihre DB Daten eintragen. Diese haben Sie von Ihrem ISP (Internet Service Provider) erhalten.<br>Der Host ist meist \"localhost\", daher k&ouml;nnen Sie dies standardm&aumlﬂig stehen lassen.<br>F&uuml;r SQLite muss bei Host die Datei der Datenbank gew&auml;hlt werden.";

$lang['tooltip_2']="Sollten Sie NLetter mehrmals in der selben Datenbank installieren wollen, muss hier ein anderer Prefix angegeben werden, damit die anderen DB Tabellen nicht &uuml;berschrieben werden.";

$lang['tooltip_3']="Benutzername, Mail und Passwort Ihrer Wahl eintragen";

$lang['tooltip_4']="Sp&auml;ter im Admin Bereich noch umstellbar";

$lang['tooltip_5']="Ist der vorgeschlagene Pfad falsch, kann er hier korrigiert werden";

$lang['tooltip_6']="Die URL muss so als Cronjob eingetragen werden:<br>
http://user:passwort@".$file_root."/newsletter_cron.php<br><br>
Als User und Passwort die Logindaten des Scripts verwenden.";

$lang['tooltip_7']="F&uuml;r direkte Anrede in der Mail,<br>Platzhalter {FORENAME} benutzen";

$lang['tooltip_8']="Ben&ouml;tigt f&uuml;r Link aus der Aktivierungsmail";

$lang['tooltip_9']="Wird an die, in den Newsletter-Einstellungen eingetragene E-Mail-Adresse, geschickt";

$lang['tooltip_10']="Hier den Datenbank Prefix<br>von NEWSolved Professional angeben";

$lang['tooltip_11']="Diese Mail Adresse ist f&uuml;r die Nachrichten bei neuem/abgemeldeten Abonnementen, Test-Mails und Kontaktformularbenachrichtigungen";

$lang['tooltip_12']="Hier eine Adresse wie z.B. <b>mail.ihr_provider.net</b> eingeben, der Port ist meist standardm&auml;ﬂig <b>25</b>";

$lang['tooltip_13']="
<b>PHP Mail:</b>
<br>Hier werden eMails &uuml;ber den internen PHP Mailer verschickt.";
/*<br><br>
<u>Vorteil:</u><br>
- Kein SMTP Server ben&ouml;tigt
<br><br>
<u>Nachteil:</u>
<br>
- H&ouml;here Server CPU Last
<br>
- Langsam
<br><br>
<b>SMTP Relay:</b><br>
z.Z. noch nicht implementiert
*/

$lang['tooltip_14']="L&auml;uft auf Linux Servern oder Windows Servern ab PHP Version 5.0. Dadurch wird die CPU etwas entlastet und ist die Zeit, die Pause gemacht wird, nach jeder verschickten E-Mail. Ist die Versandart \"live\" deaktiviert, sollte hier ein Wert von etwa 3000ms (3s) eingetragen werden.";

$lang['tooltip_15']="Wenn HTML Codierung gew&auml;hlt wurde, k&ouml;nnen auch Templates importiert werden. Diese m&uuml;ssen im <u>*.html</u> Format in das Verzeichnis <u>html_templates</u> geladen werden";

$lang['tooltip_16']="Wenn das Flashformular aktiviert wurde, muss hier \"Nein\" gew&auml;hlt sein.";

$lang['tooltip_17']="Keine Gruppenwahl verf&uuml;gbar, wenn als Formular <b>Flash</b> gew&auml;hlt wurde.";

$lang['tooltip_18']="Bei gesetztem Haken wird die Versandmethode \"live\" deaktiviert. Dies ist f&uuml;r Server und Browser, die mit der aktuellen Variante nicht zurecht kommen. Auch wenn PHP Safe Mode angeschaltet ist, funktioniert die neue Methode nur partiell, da es dann zu einem PHP Timeout w&auml;hrend des Versandes kommen kann.";

$lang['tooltip_18_1'] = "Hinweis: Funktion \"live\" kann genutzt werden!";

$lang['tooltip_19']="Dies ist nur verf&uuml;gbar, wenn HTML eMails aktiviert wurden.";

$lang['tooltip_20']="Nur sichtbar bei aktivierten HTML eMails.";

$lang['tooltip_21']="Wenn der Platzhalter {PROFILE_LINK} in eMails benutzt werden soll,<br>muss hier das Template daf&uuml;r aktiviert werden.<br><br>
Hinweis:<br>Die Profile sind nicht Passwortgesch&uuml;tzt und k&ouml;nnen durch<br>Erraten der 12-Stelligen Benutzer ID von jedem eingesehen werden!";

$lang['tooltip_22']="F&uuml;r direkte Anrede in der Mail,<br>Platzhalter {SURNAME} benutzen";

$lang['tooltip_23']="F&uuml;r Anrede in der Mail,<br>Platzhalter {TITLE} benutzen";

$lang['tooltip_24']="Wenn 'Ja' gew&auml;hlt wurde, werden die Radiobuttons bei der Newsletterformular-Ausgabe,<br>zur Wahl ob man sich ein- oder austragen m&ouml;chte, ausgeblendet. Dann sollte allerdings<br>der Platzhalter {UNSUBSCRIBE_LINK} verwendet werden, damit die M&ouml;glichkeit besteht sich dar&uuml;ber auszutragen.";

$lang['tooltip_25']="Das Verschicken von groﬂen Anh&auml;ngen bei langen eMail-Listen kann zu groﬂer Serverlast f&uuml;hren.";

$lang['tooltip_26']="Bei aktivierten HTML-Mails und neuer Versandart wird ein 1x1 Pixel groﬂes Bild in die Mail einf&uuml;gt, welches eine Verbindung zu ihrem Server aufbaut und einen Counter hochz&auml;hlt wie oft die E-Mail gelesen wurde.<br><br>Bitte weisen Sie in ihren Datenschutz-Klauseln den Benutzer des Newsletteres darauf hin, dass eine Statistik erhoben wird. Ansonsten deaktivieren sie dieses Feature.<br><br>Beachten sie, dass dies nur eine ungef&auml;hre Auskunft gibt, da einige Mail-Clients das Nachladen von Bildern unterbinden.";

$lang['tooltip_27']="Das Ajax-Formular benutzt JavaScript zur Auswertung der Benutzereingaben.<br>Daher muss die Seite nicht neu geladen werden beim Eintragen.";

###################################################
################## Installation ###################
###################################################


$lang['inst_s2_headline']="Datenbank - Konfiguration: Schritt 2";
$lang['inst_s2_error']="Fehler";
$lang['inst_s2_host']="Host";
$lang['inst_s2_dbtype']="Datenbank Typ";
$lang['inst_s2_dbname']="Datenbankname";
$lang['inst_s2_user']="Benutzername";
$lang['inst_s2_password']="Passwort";
$lang['inst_s2_prefix']="Prefix";
$lang['inst_s2_back']="Zur&uuml;ck";
$lang['inst_s2_cont']="Weiter";

$lang['inst_s3_headline']="Benutzerdaten - Konfiguration: Schritt 3";
$lang['inst_s3_error']="Fehler";
$lang['inst_s3_user']="Benutzername";
$lang['inst_s3_email']="Mail";
$lang['inst_s3_password']="Passwort";
$lang['inst_s3_rpassword']="Passwort wiederholen";
$lang['inst_s3_scriptpath']="Pfad zum Script";
$lang['inst_s3_usecockies']="Cookies verwenden";
$lang['inst_s3_usesessions']="Sessions verwenden";
$lang['inst_s3_permanentlogin']="Dauerhafter Login";
$lang['inst_s3_limitedtime']="Begrenzte Zeit";
$lang['inst_s3_back']="Zur&uuml;ck";
$lang['inst_s3_install']="Installieren";

$lang['inst_s4_headline']="Fertig - Konfiguration: Schritt 4";
$lang['inst_s4_success']="Installation von NLetter erfolgreich";
$lang['inst_s4_output1']="Um zur Ausgabe zu gelangen, bitte auf folgenden Link klicken";
$lang['inst_s4_output2']="NLetter";
$lang['inst_s4_admin1']="Um zum Admin Center zu gelangen, bitte auf folgenden Link klicken";
$lang['inst_s4_admin2']="Admin Bereich";

$lang['inst_error_headline']="Fehler";
$lang['inst_error_host']="Bitte einen Host eingeben";
$lang['inst_error_dbname']="Bitte den Datenbanknamen eingeben";
$lang['inst_error_dbuser']="Bitte den Usernamen der Datenbank eingeben";
$lang['inst_error_dbpw']="Bitte das Passwort der Datenbank eingeben";
$lang['inst_error_dbno']="Datenbank nicht vorhanden";
$lang['inst_error_dbset']="&Uuml;berpr&uuml;fen Sie nochmal Ihre Datenbankeinstellungen";
$lang['inst_error_user']="Bitte einen Benutzernamen eingeben";
$lang['inst_error_pw']="Bitte ein Passwort eingeben";
$lang['inst_error_pwr']="Bitte die Passwort Wiederholung eingeben";
$lang['inst_error_pwsame']="Die beiden Passw&ouml;rter sind nicht die Gleichen";
$lang['inst_error_mail']="Bitte eine Mail Adresse eingeben";
$lang['inst_error_mailcheck']="Bitte die Mail Adresse auf Richtigkeit &uuml;berpr&uuml;fen";
$lang['inst_error_prefix1']="Achtung: Eine Installation mit diesem Prefix existiert bereits!";
$lang['inst_error_prefix2']="Wenn Sie fortfahren, wird die vorhandene Installation &uuml;berschrieben.";



###################################################
###################### Login ######################
###################################################


$lang['login_user']="Benutzername";
$lang['login_pw']="Passwort";
$lang['login_login']="Einloggen";
$lang['login_forgotpw']="Passwort vergessen?";
$lang['login_error1']="Login Falsch";
$lang['login_error2']="Zur&uuml;ck";

$lang['login_back']="Zur&uuml;ck";
$lang['login_username']="Benutzername";
$lang['login_email']="Mail";
$lang['login_requestpw']="Passwort anfordern";

$lang['login_check_user']="Bitte Benutzernamen eingeben";
$lang['login_check_email1']="Bitte Mail Adresse eingeben";
$lang['login_check_email2']="Bitte die Mail Adresse auf Richtigkeit &uuml;berpr&uuml;fen";
$lang['login_subject']="Neues Passwort";
$lang['login_mail1']="Hallo";
$lang['login_mail2']="du hast ein neues Passwort angefordert. Die neuen Logindaten sind:";
$lang['login_mail3']="Username";
$lang['login_mail4']="Passwort";
$lang['login_mailsent1']="Mail an";
$lang['login_mailsent2']="gesendet";
$lang['login_wrongdata']="Falsche Daten";




###################################################
###################### Admin ######################
###################################################


$lang['admin_lang_button']="OK";
$lang['admin_logout']="Logout";
$lang['admin_deinstall']="Deinstallieren";
$lang['admin_deinstall_info']="Damit wird das komplette Newsletter Script unbrauchbar und s&auml;mtliche Inhalte dessen in der Datenbank gel&ouml;scht. Dies sollten sie nur tun wenn sie das Newsletter Script nicht mehr brauchen. Sind Sie sich sicher das sie das Newsletter Script l&ouml;schen wollen?";
$lang['admin_to_cookies']="Login Methode in Cookies";
$lang['admin_to_sessions']="Login Methode in Sessions";
$lang['admin_to_change']=" &auml;ndern";
$lang['admin_output_newsletter']="Ausgabe vom Newsletterformular...";
$lang['admin_output_contactform']="Ausgabe vom Kontaktformular...";


$lang['admin_group_email']="E-Mail";
$lang['admin_group_unlock']="User manuell freischalten";
$lang['admin_group_unlock_button']="Freischalten";
$lang['admin_group_unlock_success']="User erfolgreich freigeschaltet";
$lang['admin_group_forename']="Vorname";
$lang['admin_group_surname']="Nachname";
$lang['admin_group_groupname']="Gruppenname";
$lang['admin_group_rel']="Zugewiesen";
$lang['admin_group_none']="Keine Gruppen vorhanden";
$lang['admin_group_edit']="Editieren";

$lang['admin_bl_blocked']="Gesperrte Mail Adressen";
$lang['admin_bl_sure']="Sind Sie sich sicher";
$lang['admin_bl_del']="L&ouml;schen";
$lang['admin_bl_alldel']="Alle Adressen l&ouml;schen";
$lang['admin_bl_sofar']="Biser keine";

$lang['admin_archive_addr']="Absender";
$lang['admin_archive_subject']="Betreff";
$lang['admin_archive_date']="Datum";
$lang['admin_archive_msg']="Text";
$lang['admin_archive_group']="Gruppe";
$lang['admin_archive_views']="Angeklickt";
$lang['admin_archive_t1']="Wurde an";
$lang['admin_archive_t2']="Empf&auml;nger der Gruppe $aus_groupname->groupname gesendet";


$lang['admin_menu_headline']="Allgemeine Einstellungen";
$lang['admin_menu_newsletter']="Newsletter Allgemein";
$lang['admin_menu_newslettertext']="Newsletter Textdefinitionen";
$lang['admin_menu_contactform']="Kontaktformular";
$lang['admin_menu_misc']="Sonstiges";



###################################################
#################### Licence ######################
###################################################


$lang['admin_licence_headline']		= "Lizenz";
$lang['admin_licence_domain']		= "Domain";
$lang['admin_licence_key']			= "Key";
$lang['admin_licence_submit']		= "Lizenz best&auml;tigen";
$lang['admin_licence_updated']		= "Datenbank aktualisiert";



###################################################
###################### Start ######################
###################################################


$lang['start_headline']="NLetter Statistik";
$lang['start_newsletter']="Newsletter";
$lang['start_sentnewsletter']="Verschickte Newsletter";
$lang['start_receivers']="Abonnementen";
$lang['start_contactform']="Kontaktformular";
$lang['start_allmsg']="Nachrichten insgesamt";
$lang['start_answered']="Davon beantwortet";
$lang['start_unopen']="Von Ihnen unge&ouml;ffnet";



###################################################
##################### Setuser #####################
###################################################

$lang['setuser_headline']="Benutzer verwalten";
$lang['setuser_lockeduser']="Zeige noch nicht freigeschaltete User";
$lang['setuser_firstletter']="Anfangsbuchstabe";
$lang['setuser_all']="Alle";
$lang['setuser_filter']="Filtern";
$lang['setuser_number']="Anzahl";
$lang['setuser_ok']="OK";
$lang['setuser_searchemail']="Nach Mail suchen";
$lang['setuser_searchemailok']="Suchen";
$lang['setuser_searchdate']="Nach Datum suchen";
$lang['setuser_searchdateok']="Suchen";
$lang['setuser_suretodelemails']="Sind Sie sich sicher, dass alle Mail-Adressen gel&ouml;scht werden sollen? Dies ist unwiederrufbar!";
$lang['setuser_hemailadress']="Mail Adresse";
$lang['setuser_hname']="Name";
$lang['setuser_hgroup']="Gruppe";
$lang['setuser_hregdate']="Registrierungsdatum";
$lang['setuser_hdelete']="L&ouml;schen";
$lang['setuser_noresults']="Keine Ergebnisse";
$lang['setuser_edit']="Editieren";
$lang['setuser_delete']="L&ouml;schen";
$lang['setuser_all']="Alle";
$lang['setuser_suredelselemail']="Sind Sie sich sicher, dass die gew&auml;hlten Adresse gel&ouml;scht werden sollen?";
$lang['setuser_groupmanage']="Gruppen verwalten";
$lang['setuser_hidden']="Unsichtbar";
$lang['setuser_default']="Standard";
$lang['setuser_add']="Hinzuf&uuml;gen";
$lang['setuser_sure']="Sind Sie sich sicher?";
$lang['setuser_delgroup']="L&ouml;schen";
$lang['setuser_default_entry_group']="User standardm&auml;ﬂig in folgende Gruppe eintragen";
$lang['setuser_editgroup']="Edit";
$lang['setuser_empty']="Leeren";
$lang['setuser_userheadline']			= "Benutzer manuell hinzuf&uuml;gen";
$lang['success_new_user']				= "Neuen Benutzer hinzugef&uuml;gt";
$lang['notice_new_user']				= "Mail-Adresse bereits in Datenbank vorhanden!";



###################################################
################### Ex- Import ####################
###################################################

$lang['exim_error']						= "Export nicht m&ouml;glich da dem Ordner '/settings' nicht der CHMOD 777 zugewiesen wurde!";
$lang['exim_addradded']					= "Adressen der Mail Liste hinzugef&uuml;gt";
$lang['exim_filerror']					= "Datei korrupt";
$lang['exim_up_bladded']				= "Adressen der Blacklist hinzugef&uuml;gt";
$lang['exim_up_bladded_single']			= "Adresse der Blacklist hinzugef&uuml;gt";
$lang['exim_up_bladded_single_error']	= "Adresse bereits vorhanden";
$lang['exim_up_removed']				= "Adressen aus der DB entfernt";
$lang['exim_headline']					= "Ex- und Import f&uuml;r NLetter";
$lang['exim_addsqlemails']				= "E-Mail Adressen aus SQL Datei der Datenbank hinzuf&uuml;gen";
$lang['exim_exportsqlemails']			= "E-Mail Adressen in SQL Datei exportieren";
$lang['exim_export_allemails']			= "Alle E-Mail Adressen inkl. Gruppen und Gruppenzuordnung exportieren";
$lang['exim_export_agroup']				= "Nur E-Mail Adressen dieser Gruppe exportieren";
$lang['exim_exportsqlemails_truncate']	= "Mit 'Empty Table' Befehl";
$lang['exim_eximforeign']				= "Ex- und Import von und f&uuml;r Fremdscripts";
$lang['exim_addemailsfromtext']			= "Mail Adressen aus Text Datei der Datenbank hinzuf&uuml;gen";
$lang['exim_exportmailsintext']			= "Mail Adressen in Text Datei exportieren";
$lang['exim_attention']					= "Achtung: nicht wiederverwertbar in diesem Script";
$lang['exim_blacklist']					= "Blacklist";
$lang['exim_showlist']					= "Liste ansehen";
$lang['exim_addtobl']					= "E-Mail Adressen aus Text Datei zur Blacklist hinzuf&uuml;gen";
$lang['exim_addsinglemailtobl']			= "E-Mail Adresse manuell zur Blacklist hinzuf&uuml;gen";
$lang['exim_removeadress']				= "Adressen aus der DB austragen";
$lang['exim_adressesfromtext']			= "Mail Adressen aus Text Datei";
$lang['exim_delete']					= "L&ouml;schen";
$lang['exim_add']						= "Hinzuf&uuml;gen";
$lang['exim_group']						= "Gruppe";
$lang['exim_startexport']				= "E-Mail/Gruppen Export starten";
$lang['exim_startexport_emails']		= "E-Mail Export starten";
$lang['exim_nogroups']					= "Keine Gruppen vorhanden";
$lang['exim_allowdouble']				= "doppelte Adressen in der Datenbank zulassen";



###################################################
#################### Settings #####################
###################################################

$lang['settings_no']="Nein";
$lang['settings_yes']="Ja";

$lang['settings_oldpw_notcorrect']="Das alte Passwort war nicht korrekt!";
$lang['settings_notfilledout']="Nicht vollst&auml;ndig ausgef&uuml;llt!";
$lang['settings_pwmatch']="Die beiden neuen Passw&ouml;rter stimmen nicht &uuml;berein!";
$lang['settings_pwchange1']="Passwort von";
$lang['settings_pwchange2']="in";
$lang['settings_pwchange3']="ge&auml;ndert";
$lang['settings_edited']="Editiert";


$lang['settings_misc_newgroupcreated']		= "Neue Gruppe angelegt";
$lang['settings_misc_typepw']				= "Bitte Passwort angeben";
$lang['settings_misc_typeuser']				= "Bitte Benutzernamen angeben";
$lang['settings_misc_typeemail']			= "Bitte korrekte E-Mail Adresse angeben";
$lang['settings_misc_groupdeleted']			= "Gruppe gel&ouml;scht! User die in der Gruppe waren m&uuml;ssen neu zugewiesen werden!";
$lang['settings_misc_userdeleted']			= "Benutzer gel&ouml;scht";
$lang['settings_misc_groupedited']			= "Gruppe editiert";
$lang['settings_misc_usermanagement']		= "Benutzerverwaltung";
$lang['settings_misc_owndata']				= "Eigene Daten";
$lang['settings_misc_nogroups']				= "Keine Gruppen vorhanden";
$lang['settings_misc_newuserhead']			= "Neuer Benutzer";
$lang['settings_misc_password']				= "Passwort";
$lang['settings_misc_passwordrepeat']		= "Passwort wiederholen";
$lang['settings_misc_nogroups']				= "Keine Gruppen vorhanden";
$lang['settings_misc_newuser']				= "Neuen Benutzer anlegen";
$lang['settings_misc_editused']				= "Benutzer editieren";
$lang['settings_misc_undefined']			= "Undefiniert";
$lang['settings_misc_admin']				= "Admin";
$lang['settings_misc_group']				= "Gruppe";
$lang['settings_misc_nogroups']				= "Keine Gruppen vorhanden";
$lang['settings_misc_createnewuser']		= "Neuen Benutzer anlegen";
$lang['settings_misc_usereditbutton']		= "Benutzer editieren";
$lang['settings_misc_groupmanagement']		= "Gruppenverwaltung";
$lang['settings_misc_newgroup']				= "Neue Gruppe anlegen";
$lang['settings_misc_groupname']			= "Gruppenname";
$lang['settings_misc_creategroupbutton']	= "Gruppe anlegen";
$lang['settings_misc_groupedit']			= "Gruppe editieren";
$lang['settings_misc_edit']					= "Editieren";
$lang['settings_misc_nogroupsbutadmin']		= "Keine Gruppen neben 'Admin' vorhanden.";
$lang['settings_misc_deletegroup']			= "Gruppe l&ouml;schen";


$lang['settings_nl_headline']="Newsletter Allgemein";
$lang['settings_nl_layout']="Layout";
$lang['settings_nl_width']="Tabellenbreite";
$lang['settings_nl_tfwidth']="Textfeldbreite";
$lang['settings_nl_bgcolor']="Hintergrundfarbe";
$lang['settings_nl_background']="Hintergrundbild";
$lang['settings_nl_fontcolor']="Schriftfarbe";
$lang['settings_nl_fontsize']="Schriftgr&ouml;ﬂe";
$lang['settings_nl_fonttype']="Schriftart";
$lang['settings_nl_default']="Standards";
$lang['settings_nl_charset']="Charset festlegen";
$lang['settings_nl_addresser']="Absendernamen festlegen";
$lang['settings_nl_email']="E-Mail festlegen";
$lang['settings_nl_subject']="Betreff festlegen";
$lang['settings_nl_sig']="Signatur festlegen";
$lang['settings_nl_default_unsubscribe']="Austragungslink Text";
$lang['settings_nl_default_subscribe']="Aktivierungs-Mail Text";
$lang['settings_nl_default_welcome']="Willkommenstext";
$lang['settings_nl_default_alternatetext']="Textanzeige, wenn User keine HTML Mails anzeigen kann";
$lang['settings_nl_settings']="Einstellungen";
$lang['settings_nl_mailsending']="Mailversand";
$lang['settings_nl_interval']="Intervall";
$lang['settings_nl_oldway']="Versandart \"live\" deaktivieren";
$lang['settings_nl_sec']="Millisekunden";
$lang['settings_nl_user_intv']="User / Intervall";
$lang['settings_nl_general']="Allgemein";
$lang['settings_nl_nlform']="Ausgabeformular";
$lang['settings_nl_nlprofile']="Aktiviere Profil Template";
$lang['settings_nl_nlform_html']="HTML";
$lang['settings_nl_nlform_flash']="Flash";
$lang['settings_nl_useractivation']="User Aktivierung";
$lang['settings_nl_instand']="Sofort";
$lang['settings_nl_viaemail']="Per Mail";
$lang['settings_nl_mailencoding']="Mail Codierung";
$lang['settings_nl_text']="Text";
$lang['settings_nl_html']="HTML";
$lang['settings_nl_wysiwyg']="WYSIWYG Editor";
$lang['settings_nl_image_upload']="Bilder Upload";
$lang['settings_nl_attachment_upload']="Anh&auml;nge verschicken";
$lang['settings_nl_attach_viewcount']="Klick-Z&auml;hler aktivieren";
$lang['settings_nl_unsubscribeinmail']="Austragen nur per Link in der E-Mail";
$lang['settings_nl_welcome']="Willkommens-Mail";
$lang['settings_nl_mailtoadmin']="Adminmail bei User Ein-/Austragung";
$lang['settings_nl_popup_msgs']="Popupmeldungen bei Ausgabe";
$lang['settings_nl_usergroup']="User kann Gruppe w&auml;hlen";
$lang['settings_nl_usergroup_radio']="Mehrfachauswahl unterbinden";
$lang['settings_nl_userselect']="Art";
$lang['settings_nl_titleinput']="Anrede-Eingabe bei Anmeldung";
$lang['settings_nl_forenameinput']="Vornamen-Eingabe bei Anmeldung";
$lang['settings_nl_surnameinput']="Nachnamen-Eingabe bei Anmeldung";
$lang['settings_nl_plugin_activate']="Aktiviere NEWSolved Pro. Plugin";
$lang['settings_nl_language']="Sprache";
$lang['settings_nl_plugin_prefix']="NEWSolved Prefix";
$lang['settings_nl_mailaddress']="Mail-Adresse";
$lang['settings_nl_scriptpath']="Pfad zum Script";
$lang['settings_nl_sendtype']="Versandtyp";
$lang['settings_nl_sendtype_type']="Typ";
$lang['settings_nl_sendtype_type1']="PHP Mail";
$lang['settings_nl_sendtype_type2']="SMTP Relay";
$lang['settings_nl_sendtype_exe']="Fast Extension";
$lang['settings_nl_sendtype_relay']="SMTP Server";
$lang['settings_nl_sendtype_port']="Port";
$lang['settings_nl_sendtype_user']="Benutzername";
$lang['settings_nl_sendtype_pw']="Passwort";
$lang['settings_nl_ajax']	= "Ajax Newsletterformular";
$lang['settings_nl_captcha']= "Captcha Code bei Anmeldung";

$lang['settings_cf_headline']="Kontaktformular";
$lang['settings_cf_layout']="Layout";
$lang['settings_cf_width']="Breite";
$lang['settings_cf_height']="H&ouml;he";
$lang['settings_cf_bgcolor']="Hintergrundfarbe";
$lang['settings_cf_background']="Hintergrundbild";
$lang['settings_cf_fontcolor']="Schriftfarbe";
$lang['settings_cf_fontcolorerror']="Schriftfarbe bei Fehler";
$lang['settings_cf_fontsize']="Schriftgr&ouml;ﬂe";
$lang['settings_cf_fonttype']="Schriftart";
$lang['settings_cf_settings']="Einstellungen";
$lang['settings_cf_sig']="Signatur";
$lang['settings_cf_title']="Anrede";
$lang['settings_cf_showname']="Zeige Vorname";
$lang['settings_cf_showsurname']="Zeige Nachname";
$lang['settings_cf_showcity']="Zeige Stadt";
$lang['settings_cf_showsubject']="Zeige Thema";
$lang['settings_cf_showtel']="Zeige Telefonnummer";
$lang['settings_cf_sendmail']="Sende Mail bei neuem Eingang";
$lang['settings_cf_captcha']="Aktiviere Captcha Code";

$lang['settings_ot_headline']="Sonstiges";
$lang['settings_ot_userdata']="Benutzerdaten";
$lang['settings_ot_username']="Benutzername";
$lang['settings_ot_mailaddress']="Mail Adresse";
$lang['settings_ot_oldpw']="Altes Passwort";
$lang['settings_ot_newpw']="Neues Passwort";
$lang['settings_ot_rnewpw']="Neues Passwort<br>wiederholen";

$lang['settings_savesettings']="Speichern";


####

$lang['settings_nltext_headline']					= "Newsletter Textdefinitionen";
$lang['settings_nltext_placeholdertoplacerholder']	= "Platzhalter zu Platzhalter Ersetzung";
$lang['settings_nltext_getsreplacedwith']			= "wird ersetzt durch";
$lang['settings_nltext_placeholdertoexpr']			= "Platzhalter zu Ausdruck Ersetzung";
$lang['settings_nltext_ifplaceholder']				= "Wenn Platzhalter";
$lang['settings_nltext_ifmale']						= "M&auml;nnlich, ersetze Platzhalter durch";
$lang['settings_nltext_iffemale']					= "Weiblich, ersetze Platzhalter durch";
$lang['settings_nltext_and']						= "und";
$lang['settings_nltext_empty']						= "Leer";
$lang['settings_nltext_alttitle']					= "Wenn Name <u>oder</u> Vorname nicht angegeben sind, forme Anrede um in";

$lang['settings_nltext_addresser']					= "Absender";
$lang['settings_nltext_definename']					= "Name festlegen";
$lang['settings_nltext_setasdefault']				= "Als Standard festlegen";
$lang['settings_nltext_isdefault']					= "Standard";
$lang['settings_nltext_delete']						= "L&ouml;schen";
$lang['settings_nltext_alert_address']				= "Nicht erlaubte Adresse!";
$lang['settings_nltext_alert_success']				= "Absender angelegt!";
$lang['settings_nltext_alert_nameemail']			= "Bitte Namen und E-Mail Adresse angeben!";
$lang['settings_nltext_alert_defaultset']			= "Absender als Standard festgelegt!";
$lang['settings_nltext_alert_addresserdelete']		= "Absender gel&ouml;scht!";



###################################################
#################### Sendform #####################
###################################################

$lang['sendform_markassent']="News als gesendet markiert";
$lang['sendform_markasnotsent']="News als ungesendet markiert";
$lang['sendform_checkaddresser']="Absender angeben";
$lang['sendform_checksubject']="Betreff angeben";
$lang['sendform_nonewsfound']="Keine News gefunden";
$lang['sendform_norecipient']="Keine Abonnementen";
$lang['sendform_sendnewsletter']="Newsletter versenden";
$lang['sendform_group']="Gruppe";

$lang['sendform_addresser']="Absender";
$lang['sendform_subject']="Betreff";
$lang['sendform_message']="Nachricht";
$lang['sendform_resizer_smaller']="Textfeld verkleinern";
$lang['sendform_resizer_bigger']="Textfeld vergr&ouml;ﬂern";

$lang['sendform_emailencoding']="Mail Codierung";
$lang['settings_sendmethod']="Versandtyp";
$lang['settings_sendphp']="PHP Mail";
$lang['settings_sendsmtp']="SMTP Relay";
$lang['sendform_break']="Absatz";
$lang['sendform_bold']="Fett";
$lang['sendform_italic']="Kursiv";
$lang['sendform_underline']="Unterstrichen";
$lang['sendform_cross']="Durchgestrichen";
$lang['sendform_textcolor']="Textfarbe";
$lang['sendform_textsize']="Textgr&oumlﬂe";
$lang['sendform_textfamily']="Schriftart";
$lang['sendform_insertimg']="Bild einf&uuml;gen";
$lang['sendform_insertlink']="Link einf&uuml;gen";
$lang['sendform_insertemaillink']="Mail-Link einf&uuml;gen";
$lang['sendform_center']="Zentrieren";
$lang['sendform_right']="Rechts ausrichten";
$lang['sendform_list']="Liste";
$lang['sendform_table']="Tabelle";
$lang['sendform_tableimg']="Tabelle / Bild";
$lang['sendform_missingemail']="Einen Standard-Absender (Name &amp; E-Mail) in den Newsletter Textdefinitionen eintragen unter \"Einstellungen\"";
$lang['sendform_button_sendnewsletter']="Newsletter senden";
$lang['sendform_button_sendnewsletter_q']	= "Mit Klick auf OK wird der Newsletter gesendet.";
$lang['sendform_button_simulate']="Simulieren";
$lang['sendform_simulate_msg']="Dadurch wird ein echter Sendevorgang simuliert!";
$lang['sendform_button_testmail']="Test E-Mail";
$lang['sendform_testmail_msg']="Dadurch wird eine Testmail an Ihre Mailadresse geschickt!";
$lang['sendform_button_saveemail']="Als Template speichern unter dem Namen";
$lang['sendform_button_saveemail_error']="Bitte gib einen Vorlagennamen ein";
$lang['sendform_button_saveemail_success']="Vorlage erfolgreich gespeichert";
$lang['sendform_button_saveemail_overwrite']="Vorhandene Vorlage erfolgreich &uuml;berschrieben";
$lang['sendform_button_saveemail_button']="Speichern";
$lang['sendform_button_preview']="Vorschau";
$lang['sendform_check2addresser']="Absender eintragen";
$lang['sendform_check2subject']="Betreff eintragen";
$lang['sendform_check2msg']="Nachricht eintragen";
$lang['sendform_newsletterinfo']="Newsletter Info";
$lang['sendform_lastnlettersend']="Letzten Newsletter erfolreich vor";
$lang['sendform_days']="Tagen verschickt.";
$lang['sendform_hours']="Stunden verschickt.";
$lang['sendform_minutes']="Minuten verschickt.";
$lang['sendform_nosent_sofar']="Bisher keine Newsletter verschickt";
$lang['sendform_sendingat']="Sendeversuch vom";
$lang['sendform_failed']="fehlgeschlagen";
$lang['sendform_resumeclick']="Hier klicken um zu resumen";
$lang['sendform_resume']="Resume";
$lang['sendform_whilesending']="Ist der Sendevorgang noch am Laufen, diese Mitteilung nicht beachten.";
$lang['sendform_newsletterarchive']="Newsletter Archiv";
$lang['sendform_lastnewsletter']="Letzten 10";
$lang['sendform_templates']="Gespeicherte Templates";
$lang['sendform_templates_deleted']="Template gel&ouml;scht";
$lang['sendform_prev']="Zur&uuml;ck";
$lang['sendform_next']="N&auml;chsten";
$lang['sendform_sure']="Sind Sie sich sicher?";
$lang['sendform_delete']="L&ouml;schen";
$lang['sendform_nothing']="Noch keine!";
$lang['sendform_newsolvedpro_plugin']="NEWSolved Professional Plugin";
$lang['sendform_ingeneral']="Allgemein";
$lang['sendform_latest1']="Die letzten";
$lang['sendform_latest2']="News verschicken";
$lang['sendform_date1']="News vom Datum";
$lang['sendform_date2']="verschicken";


$lang['sendform_button_save']="Speichern";
$lang['sendform_button_ok']="OK";

$lang['sendform_template']="Templates";
$lang['sendform_template_insert']="Eventuell bereits geschriebenes wird dadurch &uuml;berschrieben. Sind Sie sich sicher?";
$lang['sendform_template_no']="Keine Templates gefunden";
$lang['sendform_template_title_img']="Template einf&uuml;gen";
$lang['sendform_template_title_lnk']="Template ansehen";

$lang['sendform_attachment']="Anhang hochladen";
$lang['sendform_attachment_upload_ok']="Anh&auml;nge hochladen";
$lang['sendform_attachment_file']="Datei";
$lang['sendform_attachment_success1']="Die Datei(en)";
$lang['sendform_attachment_success2']="erfolgreich hochgeladen!";
$lang['sendform_attachment_error1']="Fehler bei folgenden Dateien aufgetreten:";
$lang['sendform_attachment_head']="Anh&auml;nge";


$lang['sendform_image']="Bilder hochladen";
$lang['sendform_image_upload_ok']="Bild hochladen";
$lang['sendform_image_chmodcheck']="CHMOD f&uuml;r das Verzeichnis ./upload muss auf '777' gesetzt werden";

$lang['sendform_image_upload_error1']="Ihre Datei ist &uuml;ber";
$lang['sendform_image_upload_error2']="groﬂ";
$lang['sendform_image_upload_error3']="Es gehen nur die Formate";
$lang['sendform_image_upload_error4_1']="Es muss ein Verzeichnis erstellt sein";
$lang['sendform_image_upload_error4_2']="Dies kann man in den Upload Einstellungen tun";
$lang['sendform_image_upload_exists']="Datei bereits vorhanden";
$lang['sendform_image_upload_error5']="Soll die vorhandene Datei &uuml;berschrieben werden";
$lang['sendform_image_upload_error5_1']="Ja";
$lang['sendform_image_upload_error5_2']="Nein";
$lang['sendform_image_upload_back']="Noch eine Datei hochladen";
$lang['sendform_image_upload_filename']="Dateiname";
$lang['sendform_image_upload_filesize']="Dateigr&ouml;ﬂe";
$lang['sendform_image_upload_imglink']="Bilderlink einf&uuml;gen";
$lang['sendform_image_upload_imgpaste']="Bild einf&uuml;gen";
$lang['sendform_image_upload_upimg']="Bild hochgeladen";

$lang['sendform_sm']="Als Template speichern";


###################################################
##################### Sendin ######################
###################################################

$lang['sendin_contact']="Eingeschickte Mails";
$lang['sendin_back']="Zur&uuml;ck";
$lang['sendin_date']="Datum";
$lang['sendin_title']="Anrede";
$lang['sendin_name']="Vorname";
$lang['sendin_surename']="Nachname";
$lang['sendin_city']="Stadt";
$lang['sendin_telephone']="Telefon";
$lang['sendin_date']="Datum";
$lang['sendin_email']="Mail";
$lang['sendin_emailtosend']="Empf&auml;nger Mail";
$lang['sendin_subject']="Thema";
$lang['sendin_message']="Nachricht";
$lang['sendin_forward']="E-Mail weiterleiten";
$lang['sendin_button_send']="Abschicken";
$lang['sendin_button_forward']="Weiterleiten";
$lang['sendin_nosubject']="kein thema";
$lang['sendin_sure']="Sind Sie sich sicher?";
$lang['sendin_originalmsg']="Originale Nachricht";
$lang['sendin_forwarderror']="Empf&auml;nger Mail angeben!";
$lang['sendin_forwardsuccess']="Erfolgreich verschickt!";


###################################################
#################### Sendmails ####################
###################################################

$lang['sendmails_sentwithnletter']="Dieser Newsletter wurde mit dem kostenlosen NLetter PHP Script verschickt. Die Autoren des Scripts k&ouml;nnen nicht &uuml;berpr&uuml;fen welche Inhalte damit verschickt werden. F&uuml;r den Inhalt der Newsletter sind allein die Versender verantwortlich";
$lang['sendmails_sendmsg1']="Newsletter bis jetzt an";
$lang['sendmails_sendmsg2']="Empf&auml;nger versendet";
$lang['sendmails_sendmsg3']="Noch";
$lang['sendmails_sendmsg4']="verbleiben";
$lang['sendmails_sendmsg5']="Bitte";
$lang['sendmails_sendmsg6']="Sekunden warten...";
$lang['sendmails_sendmsg7']="Schritt";
$lang['sendmails_success1']="Newsletter erfolgreich an";
$lang['sendmails_success2']="Empf&auml;nger versendet";
$lang['sendmails_finished']="Abgeschlossen";
$lang['sendmails_simfinished']="Simulation abgeschlossen";
$lang['sendmails_error']="Newsletter konnte nicht versendet werden da es bisher noch keine Abonomenten gibt";
$lang['sendmails_own1']="Newsletter erfolgreich nur an Ihre eigene Mail-Adresse";
$lang['sendmails_own2']="geschickt";
$lang['sendmails_own_error']="Keine Mail Adresse in dein Einstellungen gew&auml;hlt";



######################################################################################################
######################################################################################################
######################################################################################################



###################################################
################## Sendin Ouput ###################
###################################################


$lang['osendin_check_email']="Bitte eine Mail Adresse eingeben!";
$lang['osendin_check_emailcorrect']="Bitte die Mail Adresse auf Richtigkeit &uuml;berpr&uuml;fen!";
$lang['osendin_check_name']="Bitte den Vornamen eingeben!";
$lang['osendin_check_captcha']="Bitte den Captcha Code korrekt wiederholen";
$lang['osendin_check_surname']="Bitte den Nachnamen eingeben!";
$lang['osendin_check_city']="Bitte die Stadt angeben!";
$lang['osendin_check_subject']="Bitte ein Thema eingeben!";
$lang['osendin_check_msg']="Bitte die Nachricht eingeben!";
$lang['osendin_check_telephone']="Bitte die Telefonnummer eingeben!";
$lang['osendin_success']="Erfolgreich eingeschickt!";
$lang['osendin_email_new']="Neue Nachricht";
$lang['osendin_email_name']="Name";
$lang['osendin_email_address']="Mail";
$lang['osendin_email_msg']="Nachricht";
$lang['osendin_email_info']="Diese kann nun im Admin Bereich von NLetter abgerufen werden.";

$lang['osendin_contactform']="Kontaktformular";
$lang['osendin_title']="Anrede";
$lang['osendin_title_male']="Herr";
$lang['osendin_title_female']="Frau";
$lang['osendin_name']="Vorname";
$lang['osendin_surname']="Nachname";
$lang['osendin_city']="Stadt";
$lang['osendin_telephone']="Telefon";
$lang['osendin_email']="Mail";
$lang['osendin_subject']="Thema";
$lang['osendin_msg']="Nachricht";
$lang['osendin_captcha']="Captcha";
$lang['osendin_button_send']="Abschicken";


###################################################
################ Newsletter Ouput #################
###################################################

$lang['onl_newunsubscribe']="Neue Abmeldung";
$lang['onl_unsubscribed']="Ausgetragen!";
$lang['onl_emailunlocked']="Mail-Adresse erfolgreich freigeschaltet";
$lang['onl_newsubscriber']="Neue Anmeldung";
$lang['onl_subscribed_mail']="Newsletter Anmeldung";
$lang['onl_wrongid']="ID ist falsch oder Sie wurden schon freigeschaltet. &Uuml;berpr&uuml;fen Sie den Link nochmals!";
$lang['onl_checkemail']="Mail Adresse auf Richtigkeit &uuml;berpr&uuml;fen!";
$lang['onl_checkgroup']="Bitte mindestens eine Gruppe ausw&auml;hlen!";
$lang['onl_checkcaptcha']="Captcha Code falsch wiederholt!";
$lang['onl_checkgroup_edit']="Bitte mindestens eine Gruppe ausw&auml;hlen!";
$lang['onl_success']="Erfolgreich angemeldet!";
$lang['onl_success_edit']="Erfolgreich dein Profil editiert!";
$lang['onl_newsletterunlock']="Newsletter Freischaltung";
$lang['onl_mailavtivation']="Nach Klicken auf die URL der soeben geschickten Mail wird die Mail Adresse aktiviert!";
$lang['onl_error']="Schon eingetragen oder wurde vom Admin verboten!";
$lang['onl_error_edit'] = "E-Mail wurde vom Admin verboten!";
$lang['onl_nomail']="Mail Adresse nicht vorhanden!";
$lang['onl_formemail']="eMail Adresse";
$lang['onl_form_title']="Anrede";
$lang['onl_form_mr']="Herr";
$lang['onl_form_mrs']="Frau";
$lang['onl_form_forename']="Vorname";
$lang['onl_form_surname']="Nachname";
$lang['onl_group']="Gruppenwahl";
$lang['onl_subscribe']="Eintragen";
$lang['onl_unsubscrib']="Austragen";
$lang['onl_ok']="OK";
$lang['onl_suretounsubscribe']			= "Wollen Sie sich wirklich austragen?";
$lang['onl_suretounsubscribe_yes']		= "Ja";


###################################################
############### User Profile Ouput ################
###################################################

$lang['profile_edit_headline']	= "Profil editieren";
$lang['profile_edit']			= "Editieren";



###################################################
################### Error Codes ###################
###################################################

$lang['relaymail_fatal1']	= "Verbindung zum SMTP-Relay konnte nicht hergestellt werden";
$lang['relaymail_fatal2']	= "Unerwartete Antwort vom Server erhalten - ist die Portnummer richtig?";
$lang['relaymail_fatal3']	= "Das SMTP-Relay unterst&uuml;tzt kein ESMTP";
$lang['relaymail_fatal4']	= "Benutzername und/oder Passwort sind falsch";
$lang['relaymail_fatal5']	= "AUTH LOGIN ist fehlgeschlagen, m&ouml;glicherweise wurde dieses Schema serverseitig deaktiviert";
$lang['relaymail_fatal6']	= "Benutzername ist falsch";
$lang['relaymail_fatal7']	= "Passwort ist falsch";
$lang['relaymail_fatal8']	= "Das SMTP-Relay erzwingt ein Authentifikationsschema, das von NLetter nicht unterst&uuml;tzt wird";


###################################################
#################### Mailjobs #####################
###################################################

$lang['dispatchjob_successadded']	= "Mailjob wurde erfolgreich in Auftrag gegeben";
$lang['dispatchjob_successinfo']	= "Der Browser kann w&auml;hrend des Versandes auch geschlossen werden.";

$lang['dispatchjob_id']				= "ID";
$lang['dispatchjob_begin']			= "Job-Beginn";
$lang['dispatchjob_email']			= "eMails versandt";
$lang['dispatchjob_progress']		= "Fortschritt";
$lang['dispatchjob_elapsedtime']	= "Verstrichene Zeit";
$lang['dispatchjob_remainingtime']	= "Gesch&auml;tzte Restdauer";


?>
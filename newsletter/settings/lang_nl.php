<?php
##########################################################################
##########################  Script ? by       ############################
##########################  www.usolved.net   ############################
##########################################################################


###################################################
#################### Tooltips #####################
###################################################


$lang['tooltip_1']="Vul hier uw DB gegevens in. Deze zijn u verstrekt door uw ISP (Internet Service Provider).<br>Meestal is de hostnaam \"localhost\", dus wanneer u het niet zeker weet, gebruik dit als standaard.<br>Voor het gebruik met SQLite vult u hier uw database bestand in.";

$lang['tooltip_2']="Wanneer u Nletter meerdere keren in dezelfde database wil installeren, zullen de de bestaande tabellen worden overschreven. Daarom moet u dan een andere prefix gebruiken.";

$lang['tooltip_3']="Kies een gebruikersnaam, e-mail en wachtwoord";

$lang['tooltip_4']="Later te wijzigen in het Administratie center";

$lang['tooltip_5']="Wijzigen indien de getoonde niet juist is";

$lang['tooltip_6']="Op deze manier moet u de URL installen als Cronjob:<br>
http://user:passwort@".$file_root."/newsletter_cron.php<br><br>
Gebruik het script gebruikersnaam en wachtwoord.";

$lang['tooltip_7']="Voor persoonlijke benadering in de e-mail,<br>gebruik de placeholder {FORENAME}";

$lang['tooltip_8']="Nodig voor de link in de activatie e-mail";

$lang['tooltip_9']="Zal naar het E-Mail adres verzonden worden wat ingevuld is in Nieuwsbrief Instellingen";

$lang['tooltip_10']="Vul de database prefix in<br>voor NEWSolved Professional";

$lang['tooltip_11']="Dit E-mail adres is voor det test e-mails, gebruiker en contactformulier mededelingen";

$lang['tooltip_12']="Vul een adres in bv <b>mail.your_provider.net</b>, de poort is meestal <b>25</b>";;


$lang['tooltip_13']="
<b>PHP Mail:</b>
<br>E-mails worden verzonden met de PHP Mail functie.";
/*<br><br>
<u>Pro:</u><br>
- No SMTP Server needed
<br><br>
<u>Contra:</u>
<br>
- Higher server CPU load
<br>
- Slow
<br><br>
<b>SMTP Relay:</b><br>
not implemented yet
";
*/

$lang['tooltip_14']="Dit werkt op Linux en ook op Windows met PHP Version 5.0. Dit is voor CPU besparing.";

$lang['tooltip_15']="U kunt templates importeren wanneer HTML is geactiveerd. Deze moeten in het <u>*.html</u> formaat en moeten geupload worden in <u>html_templates</u>.";

$lang['tooltip_16']="Wanneer Flash-Formulier is geactiveerd, moet u deze instelling op \"nee\" zetten.";

$lang['tooltip_17']="Geen groeps keuze beschikbaar, indien u <b>Flash</b> als formulier heeft gekozen.";

$lang['tooltip_18']="Dit zal de verzend methode activeren vanaf versie 1.7 voor servers en browsers die met de huidige methode geen succes hebben.<br>De Browser moet geopend blijven tot alle e-mails verzonden zijn.";

$lang['tooltip_18_1'] = "Notice: Function \"live\" can be used!"; //Still english

$lang['tooltip_19']="Dit is alleen beschikbaar wanneer HTML E-mails geactiveerd zijn.";

$lang['tooltip_20']="Alleen zichtbaar met HTML encoding geactiveerd";

$lang['tooltip_21']="U moet de profiel template activeren,<br>wanneer u de placeholder {PROFILE_LINK} in E-mails wil gebruiken.<br><br>
Opmerking:<br>De profielen hebben geen gebruikerslogin, dus iedereen kan de user ID raden en het profiel bekijken!";

$lang['tooltip_22']="Voor persoonlijke benadering in de e-mail,<br>gebruik de placeholder {SURNAME}";

$lang['tooltip_23']="Voor persoonlijke benadering in de e-mail,<br>gebruik de placeholder {TITLE}";

$lang['tooltip_24']="Wanneer u 'Ja' heeft gekozen, zijn de radio knoppen op het nieuwsbrief formulier verborgen,<br>daarom moet u de placeholder {UNSUBSCRIBE_LINK} gebruiken in uw e-mail zodat uw igebruiker kunnen uitschrijven vie die link.";

$lang['tooltip_25']="Het verzenden van grote bijlagen naar een groot aantal gebruikers kan een grote server overload veroorzaken.";

$lang['tooltip_26']="Wanneer u HTML e-mails heeft geactiveerd en tevens de nieuwe verzend methode, een 1x1 pixel afbeelding zal worden ingevoegd die de aantal keren dat een nieuwsbrief beken wordt telt.<br><br>Informeer uw gebruikers dat bij het lezen van de Nieuwsbrief gegevens naar uw server verzonden worden. Anders deze optie uitschakelen.";

$lang['tooltip_27']="The Ajax-Form uses JavaScript to perform user inputs. There's no need for a page refresh after the submit.";	//still english

###################################################
################## Installation ###################
###################################################


$lang['inst_s2_headline']="Database - Configuratie: Stap 2";
$lang['inst_s2_error']="Fout";
$lang['inst_s2_host']="Host";
$lang['inst_s2_dbtype']="Database Type";
$lang['inst_s2_dbname']="Database naam";
$lang['inst_s2_user']="Gebruikersnaam";
$lang['inst_s2_password']="Wachtwoord";
$lang['inst_s2_prefix']="Database Prefix";
$lang['inst_s2_back']="Vorig";
$lang['inst_s2_cont']="Volgend";

$lang['inst_s3_headline']="Database - Configuratie: Stap 3";
$lang['inst_s3_error']="Fout";
$lang['inst_s3_user']="Gebruikersnaam";
$lang['inst_s3_email']="E-Mail";
$lang['inst_s3_password']="Wachtwoord";
//$lang['inst_s3_rpassword']="Re-type Passwort";
$lang['inst_s3_rpassword']="Wachtwoord opnieuw";
$lang['inst_s3_scriptpath']="Script Path";
$lang['inst_s3_usecockies']="Gebruik Cookies";
$lang['inst_s3_usesessions']="Gebruik Sessies";
$lang['inst_s3_permanentlogin']="Permanent ingelogd";
$lang['inst_s3_limitedtime']="Beperkte tijd";
$lang['inst_s3_back']="Vorig";
$lang['inst_s3_install']="Installeer";

$lang['inst_s4_headline']="Database - Configuratie: Stap 4";
$lang['inst_s4_success']="Installatie van NLetter succesvol afgerond";
//$lang['inst_s4_output1']="To access NLetter output script, please click the link below";
$lang['inst_s4_output1']="Om het aanmeld script van NLetter te bekijken, klikt u op de link hieronder";
$lang['inst_s4_output2']="NLetter";
$lang['inst_s4_admin1']="Om de Nletter Administratie te openen, klik hier";
$lang['inst_s4_admin2']="Nletter Administratie";

$lang['inst_error_headline']="Fout";
$lang['inst_error_host']="Vul een hostname in";
$lang['inst_error_dbname']="Vul de database naam in";
$lang['inst_error_dbuser']="Vul de database gebruikersnaam in";
$lang['inst_error_dbpw']="Vul het database wachtwoord in";
$lang['inst_error_dbno']="Database niet beschikbaar";
$lang['inst_error_dbset']="Controleer de database instellingen";
$lang['inst_error_user']="Controleer de gebruikersnaam";
$lang['inst_error_pw']="Controleer het wachtwoord";
$lang['inst_error_pwr']="Vul het wachtwoord opnieuw in";
$lang['inst_error_pwsame']="De gebruikte wachtwoorden zijn niet gelijk";
$lang['inst_error_mail']="Vul een e-mailadres in";
$lang['inst_error_mailcheck']="Controleer aub of uw wachtwoord wel juist is";
$lang['inst_error_prefix1']="Attention: Theres already an installation with this prefix!";			//still english
$lang['inst_error_prefix2']="When you continue, the existing installation will be overwritten.";	//still english


###################################################
###################### Login ######################
###################################################


$lang['login_user']="Gebruikersnaam";
$lang['login_pw']="Wachtwoord";
$lang['login_login']="Inloggen";
$lang['login_forgotpw']="Wachtwoord Vergeten?";
$lang['login_error1']="Inloggen niet juist";
$lang['login_error2']="Terug";

$lang['login_back']="Terug";
$lang['login_username']="Gebruikersnaam";
$lang['login_email']="E-Mail";
$lang['login_requestpw']="Wachtwoord Opvragen";

$lang['login_check_user']="Controleer uw gebruikersnaam";
$lang['login_check_email1']="Controleer uw E-mailadres";
$lang['login_check_email2']="Controleer aub of uw wachtwoord wel juist is";
$lang['login_subject']="Nieuw Wachtwoord";
//$lang['login_mail1']="Hallo";
$lang['login_mail1']="Hallo";
$lang['login_mail2']="U heeft een nieuw wachtwoord aangevraagd. Uw nieuwe gegevens zijn:";
$lang['login_mail3']="Gebruikersnaam";
$lang['login_mail4']="Wachtwoord";
$lang['login_mailsent1']="E-mail is verstuurd aan";
$lang['login_mailsent2']="";
$lang['login_wrongdata']="Verkeerde gegevens";



###################################################
###################### Admin ######################
###################################################


$lang['admin_lang_button']="OK";
$lang['admin_logout']="Uitloggen";
$lang['admin_deinstall']="Deinstalleren";
//$lang['admin_deinstall_info']="Through this action the complete Newssystem will be unusable and the comlete Database will be deleted. Are you sure to delete NLetter?";
$lang['admin_deinstall_info']="Door deze handeling wordt het complete Nieuwsbrievensysteem onbruikbaar en de complet database wordt verwijderd, weet u zeker dat u NLetter wil verwijderen?";
$lang['admin_to_cookies']="Wijzig inlog methode in cookies";
$lang['admin_to_sessions']="Wijzig inlog methode in sessies";
$lang['admin_to_change']="";
$lang['admin_output_newsletter']="Nieuwsbrief voorbeeld...";
$lang['admin_output_contactform']="Contactformulier voorbeeld...";

$lang['admin_group_email']="E-Mail";
$lang['admin_group_unlock']="Activeer gebruiker handmatig";
$lang['admin_group_unlock_button']="Activeer";
$lang['admin_group_unlock_success']="Gebruiker activer gelukt";
$lang['admin_group_forename']="Voornaam";
$lang['admin_group_surname']="Achternaam";
$lang['admin_group_groupname']="Groepsnaam";
$lang['admin_group_rel']="Gerelateerd";
$lang['admin_group_none']="Geen groepen beschikbaar";
$lang['admin_group_edit']="Bewerk";

$lang['admin_bl_blocked']="Geblokkeerde E-Mails";
$lang['admin_bl_sure']="Weet u het zeker";
$lang['admin_bl_del']="Verwijder";
$lang['admin_bl_alldel']="Verwijder alle E-Mails";
$lang['admin_bl_sofar']="Tot nu toe niets";

$lang['admin_archive_addr']="Geadresseerde";
$lang['admin_archive_subject']="Onderwerp";
$lang['admin_archive_date']="Datum";
$lang['admin_archive_msg']="Bericht";
$lang['admin_archive_group']="Groep";
$lang['admin_archive_views']="Bekeken";
//$lang['admin_archive_t1']="Has been send to";
$lang['admin_archive_t1']="Is verzonden naar";
//$lang['admin_archive_t2']="recipes from the group $aus_groupname->groupname";
$lang['admin_archive_t2']="ontvangers van de groep $aus_groupname->groupname";

$lang['admin_menu_headline']="Algemen Instellingen";
$lang['admin_menu_newsletter']="Nieuwsbrief";
$lang['admin_menu_newslettertext']="Nieuwsbrief tekst-definities";
//$lang['admin_menu_contactform']="Kontaktformular";
$lang['admin_menu_contactform']="Contact Formulier";
//$lang['admin_menu_misc']="Sonstiges";
$lang['admin_menu_misc']="Diversen";



###################################################
#################### Licence ######################
###################################################


$lang['admin_licence_headline']		= "Licentie";
$lang['admin_licence_domain']		= "Domein";
$lang['admin_licence_key']			= "Sleutel";
$lang['admin_licence_submit']		= "Submit licence";			//still english
$lang['admin_licence_updated']		= "Database updated";

###################################################
###################### Start ######################
###################################################


$lang['start_headline']="NLetter statistieken";
$lang['start_newsletter']="Nieuwsbrief";
$lang['start_sentnewsletter']="Verstuur nieuwsbrief";
$lang['start_receivers']="Ontvangers";
$lang['start_contactform']="Contact formulier";
$lang['start_allmsg']="Alle berichten";
$lang['start_answered']="Beantwoorde berichten";
//$lang['start_unopen']="Unopen messages";
$lang['start_unopen']="Ongeopende berichten";



###################################################
##################### Setuser #####################
###################################################

$lang['setuser_headline']="Gebruiker Beheer";
$lang['setuser_lockeduser']="Bekijk niet geactiveerde gebruikers";
$lang['setuser_firstletter']="Eerste Letter";
$lang['setuser_all']="Alle";
$lang['setuser_filter']="Filter";
$lang['setuser_number']="Nummer";
$lang['setuser_ok']="OK";
$lang['setuser_searchemail']="E-Mail zoeken";
$lang['setuser_searchemailok']="Zoek";
$lang['setuser_searchdate']="Datum zoeken";
$lang['setuser_searchdateok']="Zoek";
//$lang['setuser_suretodelemails']="Are you sure to delete all E-Mail addresses? This action can't be undo!";
$lang['setuser_suretodelemails']="Weet u zeker dat u alle E-mail adressen wil verwijderen? Dit is dan definitief en kan niet ongedaan gemaakt worden!";
$lang['setuser_hemailadress']="E-Mail Adres";
$lang['setuser_hname']="Naam";
$lang['setuser_hgroup']="Groep";
$lang['setuser_hregdate']="Registratie datum";
$lang['setuser_hdelete']="Verwijder";
$lang['setuser_noresults']="Geen resultaten";
$lang['setuser_edit']="Bewerk";
$lang['setuser_delete']="Verwijder";
$lang['setuser_all']="Allemaal";
//$lang['setuser_suredelselemail']="Are you sure to delete the selected E-Mail adress?";
$lang['setuser_suredelselemail']="Weet u zeker dat u het gekozen E-mailadres wil verwijderen?";
$lang['setuser_groupmanage']="Groepen Beheer";
$lang['setuser_hidden']="Onzichtbaar";
$lang['setuser_default']="Standaard";
$lang['setuser_add']="Voeg toe";
$lang['setuser_sure']="Weet u het zeker?";
$lang['setuser_delgroup']="Verwijder";
$lang['setuser_default_entry_group']="Put user in this group by default";	//still english
$lang['setuser_editgroup']="Bewerk";
$lang['setuser_empty']="Leeg";
$lang['setuser_userheadline']="Voeg gebruiker handmatig toe";
$lang['success_new_user']="Nieuwe gebruiker toegevoegd";
$lang['notice_new_user']				= "The e-mail address already exists in the database!";	//still english



###################################################
################### Ex- Import ####################
###################################################

$lang['exim_error']						= "Exporteren niet mogelijk omdat de folder '/settings' geen juiste schrijf permissies heeft(CHMOD 777)!";
$lang['exim_addradded']					= "Adressen toegevoegd aan de E-Mail lijst";
$lang['exim_filerror']					= "Bestands fout";
$lang['exim_up_bladded']				= "Adressen aan de zwarte lijst toegevoegd";
$lang['exim_up_bladded_single']			= "Adres aan de zwarte lijst toegevoegd";
$lang['exim_up_bladded_single_error']	= "Adres bestaat reeds";
$lang['exim_up_removed']				= "Adressen uit de database verwijderd";
$lang['exim_headline']					= "Ex- en Importeren voor NLetter";
$lang['exim_addsqlemails']				= "Voeg E-Mail adressen aan de database toe vanuit een SQL bestand";
$lang['exim_exportsqlemails']			= "Exporteer E-Mail adressen in een SQL bestand";
$lang['exim_export_allemails']			= "Exporteer alle E-Mail adessen met groepen en groeps definities";
$lang['exim_export_agroup']				= "Alleen E-mails van deze groep exporteren";
$lang['exim_exportsqlemails_truncate']	= "Met 'Leeg Tabel' Commando";
$lang['exim_eximforeign']				= "Ex- en Importeren van en voor vreemde scripts";
$lang['exim_addemailsfromtext']			= "Voeg E-Mail adressen aan de database toe vanuit een tekst bestand";
$lang['exim_exportmailsintext']			= "Export E-Mail adressen in een tekst bestand";
$lang['exim_attention']					= "Attentie: niet voor later gebruik in dit script";
$lang['exim_blacklist']					= "Zwarte lijst";
$lang['exim_showlist']					= "Bekijk lijst";
$lang['exim_addtobl']					= "Voeg E-Mail adressen aan de Zwarte lijst toe vanuit een tekst bestand";
$lang['exim_addsinglemailtobl']			= "Voeg E-Mail adressen handmatig aan de Zwarte lijst toe";
$lang['exim_removeadress']				= "Adressen verwijderen uit de Database";
$lang['exim_adressesfromtext']			= "E-Mail adressen van uit een tekst bestand";
$lang['exim_delete']					= "Verwijder";
$lang['exim_add']						= "Toevoegen";
$lang['exim_group']						= "Groep";
$lang['exim_startexport']				= "Start E-Mail/Groep export";
$lang['exim_startexport_emails']		= "Start E-Mail export";
$lang['exim_nogroups']					= "Geen groepen beschikbaar";
$lang['exim_allowdouble']				= "allow duplicate addresses to be inserted into the database";	//still english


###################################################
#################### Settings #####################
###################################################


$lang['settings_no']="Nee";
$lang['settings_yes']="Ja";

$lang['settings_oldpw_notcorrect']="Oud wachtwoord niet juist!";
$lang['settings_notfilledout']="Niet volledig ingevuld!";
$lang['settings_pwmatch']="De ingevulde wachtwoorden zijn niet gelijk!";
$lang['settings_pwchange1']="Wachtwoord gewijzigd van";
$lang['settings_pwchange2']="naar";
$lang['settings_pwchange3']="";
$lang['settings_edited']="Bewerkt";

$lang['settings_misc_newgroupcreated']		= "New group created";							//still english
$lang['settings_misc_typepw']				= "Type in a password";							//still english
$lang['settings_misc_typeuser']				= "Type in a user name";						//still english
$lang['settings_misc_typeemail']			= "Please type in a correct e-mail address";	//still english
$lang['settings_misc_groupdeleted']			= "Group deleted! User that were in this group must be redefined!";		//still english
$lang['settings_misc_userdeleted']			= "User deleted";							//still english
$lang['settings_misc_groupedited']			= "Group edited";							//still english
$lang['settings_misc_usermanagement']		= "User management";						//still english
$lang['settings_misc_owndata']				= "Own data";								//still english
$lang['settings_misc_nogroups']				= "No groups available";					//still english
$lang['settings_misc_newuserhead']			= "New user";								//still english
$lang['settings_misc_password']				= "Password";								//still english
$lang['settings_misc_passwordrepeat']		= "Repeat the Password";					//still english
$lang['settings_misc_nogroups']				= "No groups available";					//still english
$lang['settings_misc_newuser']				= "Create new user";						//still english
$lang['settings_misc_editused']				= "Edit user";								//still english
$lang['settings_misc_undefined']			= "Undefined";								//still english
$lang['settings_misc_admin']				= "Admin";									//still english
$lang['settings_misc_group']				= "Group";									//still english
$lang['settings_misc_nogroups']				= "No groups available";					//still english
$lang['settings_misc_usereditbutton']		= "Edit user";								//still english
$lang['settings_misc_groupmanagement']		= "Group management";						//still english
$lang['settings_misc_newgroup']				= "Create new group";						//still english
$lang['settings_misc_createnewuser']		= "Create new user";						//still english
$lang['settings_misc_groupname']			= "Group name";								//still english
$lang['settings_misc_creategroupbutton']	= "Create group";							//still english
$lang['settings_misc_groupedit']			= "Edit group";								//still english
$lang['settings_misc_edit']					= "Edit";									//still english
$lang['settings_misc_nogroupsbutadmin']		= "No groups available besides 'Admin'.";	//still english
$lang['settings_misc_deletegroup']			= "Delete group";							//still english

$lang['settings_nl_headline']="Nieuwsbrief";
$lang['settings_nl_layout']="Layout";
$lang['settings_nl_width']="Tabel breedte";
$lang['settings_nl_tfwidth']="Tekstveld breedte";
$lang['settings_nl_bgcolor']="Achtergrond kleur";
$lang['settings_nl_background']="Achtergrond afbeelding";
$lang['settings_nl_fontcolor']="Font kleur";
$lang['settings_nl_fontsize']="Font grootte";
$lang['settings_nl_fonttype']="Font family";
$lang['settings_nl_default']="Standaard opties";
$lang['settings_nl_charset']="Bepaal Charset";
$lang['settings_nl_addresser']="Bepaal Geadresseerde";
$lang['settings_nl_email']="Bepaal eMail";
$lang['settings_nl_subject']="Bepaal Subject";
$lang['settings_nl_sig']="Bepaal Onderschrift";
$lang['settings_nl_default_unsubscribe']="Uitschrijf link tekst";
$lang['settings_nl_default_subscribe']="Inschrijf tekst";
$lang['settings_nl_default_welcome']="Welkomst tekst";
$lang['settings_nl_default_alternatetext']="Show text if user can't display HTML E-Mails";	//still english
$lang['settings_nl_settings']="Instellingen";
$lang['settings_nl_mailsending']="E-Mail versturen";
$lang['settings_nl_interval']="Interval";
$lang['settings_nl_oldway']="Deactivate send method \"live\"";	//still english
$lang['settings_nl_sec']="Milliseconden";
$lang['settings_nl_user_intv']="Gebruiker / Interval";
$lang['settings_nl_general']="In Algemeen";
$lang['settings_nl_nlform']="Output-Formulier";
$lang['settings_nl_nlprofile']="Activeer Profiel Template";
$lang['settings_nl_nlform_html']="HTML";
$lang['settings_nl_nlform_flash']="Flash";
$lang['settings_nl_useractivation']="Gebruiker activatie";
$lang['settings_nl_instand']="Direct";
$lang['settings_nl_viaemail']="E-Mail";
$lang['settings_nl_mailencoding']="E-Mail encoding";
$lang['settings_nl_text']="Tekst";
$lang['settings_nl_html']="HTML";
$lang['settings_nl_wysiwyg']="WYSIWYG Editor";
$lang['settings_nl_image_upload']="Afbeelding Uploaden";
$lang['settings_nl_attachment_upload']="Verstuur bijlagen";
$lang['settings_nl_attach_viewcount']="Activeer View-Counts";
$lang['settings_nl_unsubscribeinmail']="Schrijf u uit dmv de <br>link in de E-Mail";
$lang['settings_nl_welcome']="Welkomst E-Mail";
$lang['settings_nl_mailtoadmin']="Stuur een E-Mail naar de admin wanneer<br>een gebruiker in- of uitschrijft";
$lang['settings_nl_popup_msgs']="Popup berichten<br>in de output";
$lang['settings_nl_usergroup']="Gebruiker kan een groep kiezen";
$lang['settings_nl_usergroup_radio']="Meerdere keuzes niet toestaan?";
$lang['settings_nl_userselect']="Type";				//still english
$lang['settings_nl_titleinput']="Titel invullen wanneer<br>gebruiker inschrijft";
$lang['settings_nl_forenameinput']="Voornaam invullen wanneer<br>gebruiker inschrijft";
$lang['settings_nl_surnameinput']="Achternaam invullen wanneer<br>gebruiker inschrijft";
$lang['settings_nl_plugin_activate']="Activeer<br>NEWSolved Pro. Plugin";
$lang['settings_nl_language']="Taal";
$lang['settings_nl_plugin_prefix']="NEWSolved Prefix";
$lang['settings_nl_mailaddress']="Mail-Adres";
$lang['settings_nl_scriptpath']="Path naar het script";
$lang['settings_nl_sendtype']="Verzend type";
$lang['settings_nl_sendtype_type']="Type";
$lang['settings_nl_sendtype_type1']="PHP Mail";
$lang['settings_nl_sendtype_type2']="SMTP Relay";
$lang['settings_nl_sendtype_exe']="Fast Extension";
$lang['settings_nl_sendtype_relay']="SMTP Server";
$lang['settings_nl_sendtype_port']="Port";
$lang['settings_nl_sendtype_user']="Gebruikersnaam";
$lang['settings_nl_sendtype_pw']="Wachtwoord";
$lang['settings_nl_ajax']	= "Ajax newsletter form";					//still english
$lang['settings_nl_captcha']= "Captcha-code for registration";			//still english

$lang['settings_cf_headline']="Contact formulier";
$lang['settings_cf_layout']="Layout";
$lang['settings_cf_width']="Breedte";
$lang['settings_cf_height']="Hoogte";
$lang['settings_cf_bgcolor']="Achtergrond kleur";
$lang['settings_cf_background']="Achtergrond afbeelding";
$lang['settings_cf_fontcolor']="Font kleur";
$lang['settings_cf_fontcolorerror']="Foute font kleur";
$lang['settings_cf_fontsize']="Font grootte";
$lang['settings_cf_fonttype']="Font family";
$lang['settings_cf_settings']="Instellingen";
$lang['settings_cf_sig']="Onderschrift";
$lang['settings_cf_title']="Titel";
$lang['settings_cf_showname']="Laat voornaam zien";
$lang['settings_cf_showsurname']="Laat achternaam zien";
$lang['settings_cf_showcity']="Laat plaats zien";
$lang['settings_cf_showsubject']="Laat onderwerp zien";
$lang['settings_cf_showtel']="Laat telefoonnummer zien";
//$lang['settings_cf_sendmail']="Send E-Mail when new subscriber";
$lang['settings_cf_sendmail']="Verstuur een E-mail wanneer er een nieuwe inschrijver is";
$lang['settings_cf_captcha']="Activate Captcha Code";	//still english

$lang['settings_ot_headline']="Diversen";
$lang['settings_ot_userdata']="Gerbruiker gegevens";
$lang['settings_ot_username']="Gebruikersnaam";
$lang['settings_ot_mailaddress']="E-Mail adres";
$lang['settings_ot_oldpw']="Oud wachtwoord";
$lang['settings_ot_newpw']="Nieuw wachtwoord";
$lang['settings_ot_rnewpw']="Herhaal nieuw<br>wachtwoord";

$lang['settings_savesettings']="Instellingen opslaan";


#####


$lang['settings_nltext_headline']					= "Nieuwsbrief tekst definities";
$lang['settings_nltext_placeholdertoplacerholder']	= "Placeholder naar Placeholder vervanging";
$lang['settings_nltext_getsreplacedwith']			= "wordt vervangen door";
$lang['settings_nltext_placeholdertoexpr']			= "Placeholder naar Uitdrukking vervanging";
$lang['settings_nltext_ifplaceholder']				= "Wanneer placeholder";
$lang['settings_nltext_ifmale']						= "Man, vervang placeholder met";
$lang['settings_nltext_iffemale']					= "Vrouw, vervang placeholder met";
$lang['settings_nltext_and']						= "en";
$lang['settings_nltext_empty']						= "Leeg";
$lang['settings_nltext_alttitle']					= "Wanneer er geen voornaam <u>of</u> naam is ingevuld, wijzig titel in";

$lang['settings_nltext_addresser']					= "Addresser";	//still english
$lang['settings_nltext_definename']					= "Define name";	//still english
$lang['settings_nltext_setasdefault']				= "Set as default";	//still english
$lang['settings_nltext_isdefault']					= "default";	//still english
$lang['settings_nltext_delete']						= "Delete";	//still english
$lang['settings_nltext_alert_address']				= "Address not allowed!";	//still english
$lang['settings_nltext_alert_success']				= "Addresser created!";	//still english
$lang['settings_nltext_alert_nameemail']			= "Type in a name and email address!";	//still english
$lang['settings_nltext_alert_defaultset']			= "Addresser has been set as default!";	//still english
$lang['settings_nltext_alert_addresserdelete']		= "Addresser deleted!";	//still english

###################################################
#################### Sendform #####################
###################################################

$lang['sendform_markassent']="Markeer nieuws als zijnde verzonden";
$lang['sendform_markasnotsent']="Markeer nieuws als zijnde niet verzonden";
$lang['sendform_checkaddresser']="Controleer geadresseerden";
$lang['sendform_checksubject']="Controleer onderwerp";
$lang['sendform_nonewsfound']="Geen nieuws gevonden";
$lang['sendform_norecipient']="Geen ontvangers";
$lang['sendform_sendnewsletter']="Nieuwsbrief verzonden";
$lang['sendform_group']="Groep";

$lang['sendform_addresser']="Geadresseerden";
$lang['sendform_subject']="Onderwerp";
$lang['sendform_message']="Bericht";
$lang['sendform_resizer_smaller']="Maakt tekstveld kleiner";
$lang['sendform_resizer_bigger']="Maak tekstveld groter";

$lang['sendform_emailencoding']="E-Mail encoding";
$lang['settings_sendmethod']="Verzend-Type";
$lang['settings_sendphp']="PHP Mail";
$lang['settings_sendsmtp']="SMTP Relay";
$lang['sendform_break']="Break";
$lang['sendform_bold']="Vet";
$lang['sendform_italic']="Cursief";
$lang['sendform_underline']="Understreept";
$lang['sendform_cross']="Crossed";
$lang['sendform_textcolor']="Font kleur";
$lang['sendform_textsize']="Font grootte";
$lang['sendform_textfamily']="Font family";
$lang['sendform_insertimg']="Afbeelding invoegen";
$lang['sendform_insertlink']="Link invoegen";
$lang['sendform_insertemaillink']="E-Mail link invoegen";
$lang['sendform_center']="Centreren";
$lang['sendform_right']="Rechts uilijnen";
$lang['sendform_list']="List";
$lang['sendform_table']="Tabel";
$lang['sendform_tableimg']="Tabel / Afbeelding";
$lang['sendform_missingemail']="Bepaal een standaard e-mail adres in de nieuwsbrief tekst definitie instellingen";
$lang['sendform_button_sendnewsletter']="Nieuwsbrief Versturen";
$lang['sendform_button_sendnewsletter_q']	= "Click OK to send the newsletter";	//still english
$lang['sendform_button_simulate']="Simuleren";
$lang['sendform_simulate_msg']="Op deze manier manier wordt de echte verzend procedure gesimuleerd!";
$lang['sendform_button_testmail']="Test E-Mail";
$lang['sendform_testmail_msg']="Dit zal een test E-mail naar uw e-mailadres verzenden!";
$lang['sendform_button_saveemail']="Sla de E-mail op als template met de naam";
$lang['sendform_button_saveemail_button']="Opslaan";
$lang['sendform_button_saveemail_error']="Vul aub een template naam in";
$lang['sendform_button_saveemail_success']="Template is opgeslagen";
$lang['sendform_button_saveemail_overwrite']="Huidige template is met succes overschreven";
$lang['sendform_button_preview']="Voorbeeld";
$lang['sendform_check2addresser']="Controleer geadresserde";
$lang['sendform_check2subject']="Controleer onderwerp";
$lang['sendform_check2msg']="Controleer bericht";
$lang['sendform_newsletterinfo']="Nieuwsbrieven info";
$lang['sendform_lastnlettersend']="Laatste Nieuwsbrief verstuurd";
$lang['sendform_days']="dagen geleden.";
$lang['sendform_hours']="uur geleden.";
$lang['sendform_minutes']="minuten geleden.";
$lang['sendform_nosent_sofar']="Tot nu toe geen nieuwsbrieven verstuurd";
$lang['sendform_sendingat']="Procedure versturen van";
$lang['sendform_failed']="niet gelukt";
$lang['sendform_resumeclick']="Klik hier om door te gaan";
$lang['sendform_resume']="Doorgaan";
$lang['sendform_whilesending']="Let niet op deze melding, weanneer de verstuur procedure bezig is.";
$lang['sendform_newsletterarchive']="Nieuwsbrieven archief";
$lang['sendform_lastnewsletter']="Laatste 10";
$lang['sendform_templates']="Opgeslagen Templates";
$lang['sendform_templates_deleted']="Template verwijdert";
$lang['sendform_prev']="Vorig";
$lang['sendform_next']="Volgend";
$lang['sendform_sure']="Weet u het zeker?";
$lang['sendform_delete']="Verwijder";
$lang['sendform_nothing']="Niets to nu toe!";
$lang['sendform_newsolvedpro_plugin']="NEWSolved Professional Plugin";
$lang['sendform_ingeneral']="In algemeen";
$lang['sendform_latest1']="Verstuur het laatste";
$lang['sendform_latest2']="nieuws";
$lang['sendform_date1']="Nieuws versturen vanaf de datum";
$lang['sendform_date2']="";


$lang['sendform_button_save']="Opslaan";
$lang['sendform_button_ok']="OK";

$lang['sendform_template']="Templates";
$lang['sendform_template_insert']="Reeds aanwezige tekst zal met deze actie overschreven worden. Weet U het zeker?";
$lang['sendform_template_no']="Geen Templates gevonden";
$lang['sendform_template_title_img']="Template Invoegen";
$lang['sendform_template_title_lnk']="Bekijk Template";

$lang['sendform_attachment']="Bijlage Uploaden";
$lang['sendform_attachment_upload_ok']="Bijlagen Uploaden";
$lang['sendform_attachment_file']="Bestand";
$lang['sendform_attachment_success1']="Deze bestanden zijn succesvol geupload:";
$lang['sendform_attachment_success2']="";
//$lang['sendform_attachment_error1']="Error while uploading the fallowing files:";
$lang['sendform_attachment_error1']="Fout tijdens uploaden van de volgende bestanden:";
$lang['sendform_attachment_head']="Bijlages";

$lang['sendform_image']="Plaatjes Uploaden";
$lang['sendform_image_upload_ok']="Plaatje Uploaden";
$lang['sendform_image_chmodcheck']="CHMOD for folder ./upload must be set to '777'";

$lang['sendform_image_upload_error1']="Uw bestand is groter dan";
$lang['sendform_image_upload_error2']="";
//$lang['sendform_image_upload_error3']="Only the fallowing files are allowed";
$lang['sendform_image_upload_error3']="Alleen de volgende bestanden zijn toegestaan";
//$lang['sendform_image_upload_error4_1']="A dir must have been created";
$lang['sendform_image_upload_error4_1']="Een directory moet gemaakt worden";
$lang['sendform_image_upload_error4_2']="Dit kan in de Upload instelingen gedaan worden";
$lang['sendform_image_upload_exists']="Het bestand bestaat reeds";
$lang['sendform_image_upload_error5']="Bestand overschrijven?";
$lang['sendform_image_upload_error5_1']="Ja";
$lang['sendform_image_upload_error5_2']="Nee";
$lang['sendform_image_upload_upbutton']="Bestand Uploaden";
$lang['sendform_image_upload_filename']="Bestands naam";
$lang['sendform_image_upload_filesize']="Bestands grootte";

$lang['sendform_sm']="Opslaan als Template";


###################################################
##################### Sendin ######################
###################################################

$lang['sendin_contact']="Sent in E-Mails";
$lang['sendin_back']="Terug";
$lang['sendin_date']="Datum";
$lang['sendin_title']="Titel";
$lang['sendin_name']="Voornaam";
$lang['sendin_surename']="Achternaam";
$lang['sendin_city']="Plaats";
$lang['sendin_telephone']="Telefoon";
$lang['sendin_date']="Datum";
$lang['sendin_email']="E-Mail";
$lang['sendin_emailtosend']="E-Mail ontvanger";
$lang['sendin_subject']="Onderwerp";
$lang['sendin_message']="Bericht";
$lang['sendin_forward']="E-Mail doorsturen";
$lang['sendin_button_send']="Verstuur";
$lang['sendin_button_forward']="Doorsturen";
$lang['sendin_nosubject']="geen onderwerp";
$lang['sendin_sure']="Weet u het zeker?";
$lang['sendin_originalmsg']="Oorspronkelijk bericht";
$lang['sendin_forwarderror']="Vul een ontvangers e-mailadres in";
$lang['sendin_forwardsuccess']="Verstuurd!";


###################################################
#################### Sendmail #####################
###################################################

$lang['sendmails_sentwithnletter']="Deze Nieuwsbrief is verzonden met het gratis NLetter PHP Script. De auteurs kunnen de inhoud van de verstuurde nieuwsbrief niet checken. Alleen de afzender van deze nieuwsbrief is verantwoordelijk voor de inhoud";
$lang['sendmails_sendmsg1']="Niewsbrief is verstuurd naar";
$lang['sendmails_sendmsg2']="ontvangers tot nu toe";
$lang['sendmails_sendmsg3']="Nog";
$lang['sendmails_sendmsg4']="resterend";
$lang['sendmails_sendmsg5']="Even wachten aub";
$lang['sendmails_sendmsg6']="seconden...";
$lang['sendmails_sendmsg7']="Stap";
$lang['sendmails_success1']="Nieuwsbrief is verstuurd naar";
$lang['sendmails_success2']="ontvangers";
$lang['sendmails_finished']="Gereed";
$lang['sendmails_simfinished']="Simulatie beeindigd";
$lang['sendmails_error']="Nieuwsbrief kon niet verzonden worden omdat er tot nu nog geen inschrijvingen zijn";
$lang['sendmails_own1']="Nieuwsbrief is succesvo verzonden naar uw eigen e-mailadres";
$lang['sendmails_own2']="";
$lang['sendmails_own_error']="Geen e-mailadres gekozen in de instellingen";



######################################################################################################
######################################################################################################
######################################################################################################



###################################################
//################## Sendin Ouput ###################
################## Sending Ouput ###################
###################################################


$lang['osendin_check_email']="Vul aub een E-mailadres in!";
$lang['osendin_check_emailcorrect']="Controleer aub uw E-mailadres op juistheid!";
$lang['osendin_check_name']="Vul aub een voornaam in!";
$lang['osendin_check_captcha']="Please repeat the catpcha code correctly!";	//still english
$lang['osendin_check_surname']="Vul aub een achternaam in!";
$lang['osendin_check_city']="Vul aub een plaats in!";
$lang['osendin_check_subject']="Vul aub een onderwerp in!";
$lang['osendin_check_msg']="Vul aub een bericht in!";
$lang['osendin_check_telephone']="Vul aub een telefoonnmummer in!";
$lang['osendin_success']="Verstuurd!";
$lang['osendin_email_new']="Nieuw bericht";
$lang['osendin_email_name']="Voornaam";
$lang['osendin_email_address']="E-Mail";
$lang['osendin_email_msg']="Bericht";
$lang['osendin_email_info']="Access this message in the admin center of NLetter.";

$lang['osendin_contactform']="Contact formulier";
$lang['osendin_title']="Titel";
$lang['osendin_title_male']="Mijnh.";
$lang['osendin_title_female']="Mevr.";
$lang['osendin_name']="Voornaam";
$lang['osendin_surname']="Achternaam";
$lang['osendin_city']="Plaats";
$lang['osendin_telephone']="Telefoon";
$lang['osendin_email']="E-Mail";
$lang['osendin_subject']="Onderwerp";
$lang['osendin_msg']="Bericht";
$lang['osendin_captcha']="Captcha";	//still english
$lang['osendin_button_send']="Verstuur";


###################################################
################ Newsletter Ouput #################
###################################################

$lang['onl_newunsubscribe']="Nieuwe uitschrijving";
$lang['onl_unsubscribed']="Uitgeschreven!";
$lang['onl_emailunlocked']="E-Mailadres activatie gelukt";
$lang['onl_newsubscriber']="Nieuwe inschrijving";
$lang['onl_subscribed_mail']="Nieuwsbrief ingeschreven";
$lang['onl_wrongid']="Verkeerd ID of het E-mailadres is reeds geactiveerd. Controleer de link opnieuw!";
$lang['onl_checkemail']="Controleer aub het E-mailadres!";
$lang['onl_checkgroup']="Kies aub tenminste 1 groep!";
$lang['onl_checkcaptcha']="Wrong captcha code!";	//still english
$lang['onl_checkgroup_edit']="Kies aub tenminste 1 groep!";
$lang['onl_success']="De inschrijving is gelukt!";
$lang['onl_success_edit']="Uw profiel is succesvol bewerkt!";
$lang['onl_newsletterunlock']="Activeer Nieuwsbrief";
$lang['onl_mailavtivation']="Het E-mailadres za,l geactiveerd wanneer u klikt op de link in de aan u gestuurde E-mail!";
$lang['onl_error']="Reeds ingeschreven of verboden door de admin!";
$lang['onl_error_edit'] = "E-mail is niet toegestaan!";
$lang['onl_nomail']="E-mail adres niet gevonden!";
$lang['onl_formemail']="E-mail Adres";
$lang['onl_form_title']="Titel";
$lang['onl_form_mr']="Mijnh.";
$lang['onl_form_mrs']="Mevr.";
$lang['onl_form_forename']="Voornaam";
$lang['onl_form_surname']="Achternaam";
$lang['onl_group']="Kies groep";
$lang['onl_subscribe']="Inschrijven";
$lang['onl_unsubscrib']="Uitschrijven";
$lang['onl_ok']="Aanmelden";
$lang['onl_suretounsubscribe']			= "Are you sure to unsubscribe your e-mail address?";	//still english
$lang['onl_suretounsubscribe_yes']		= "Ja";


###################################################
############### User Profile Ouput ################
###################################################

$lang['profile_edit_headline']	= "Bewerk profiel";
$lang['profile_edit']			= "Bewerk";



###################################################
################### Error Codes ###################
###################################################

$lang['relaymail_fatal1']	= "Er kon geen verbinding met de SMTP server opgebouwd worden";
$lang['relaymail_fatal2']	= "Onverwacht antwoord van de server - is het poortnummer wel juist?";
//$lang['relaymail_fatal3']	= "The SMTP relay doesn\'t support ESMTP";
$lang['relaymail_fatal3']	= "Het SMTP relay ondersteund geen ESMTP";
$lang['relaymail_fatal4']	= "Gebruikersnaam en/of wachtwoord is fout";
$lang['relaymail_fatal5']	= "AUTH LOGIN failed, maybe this scheme was deactivated server-side";
$lang['relaymail_fatal6']	= "Gebruikersnaam is fout";
$lang['relaymail_fatal7']	= "Wachtwoord is fout";
$lang['relaymail_fatal8']	= "De SMTP verbinding benodigt verificatie en dat wordt niet ondersteund NLetter";


###################################################
#################### Mailjobs #####################
###################################################

$lang['dispatchjob_successadded']	= "Mailopdracht is toegevoegd";
//$lang['dispatchjob_successinfo']	= "You can close your browse while eMails are sending.";
$lang['dispatchjob_successinfo']	= "U mag uw browser sluiten tijdens het verzenden van de Emails.";

$lang['dispatchjob_id']				= "ID";
$lang['dispatchjob_begin']			= "Opdracht-Begin";
$lang['dispatchjob_email']			= "Verzonden Emails";
$lang['dispatchjob_progress']		= "Voortgang";
$lang['dispatchjob_elapsedtime']	= "Verstreken tijd";
//$lang['dispatchjob_remainingtime']	= "Reamaining time";
$lang['dispatchjob_remainingtime']	= "Resterende tijd";

?>
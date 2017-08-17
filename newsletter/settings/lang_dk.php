<?php
##########################################################################
##########################  Script � by       ############################
##########################  www.usolved.net   ############################
##########################################################################


###################################################
#################### Tooltips #####################
###################################################


$lang['tooltip_1']="Skriv dine DB data ind her. Dem har du f�et af din ISP (Internet Service Provider).<br>V�rtsnavnet er som reglen \"localhost\", s� hvis du er usikker, s� brug dette som default.<br>For brug med SQLite tilf�j din database fil i Host field.";

$lang['tooltip_2']="Hvis du �nsker at installere nyhedssystemet flere gange til den samme database, vil de eksisterende db tabeller blive overskrevet. SDerfor b�r du v�lge et andet prefix.";

$lang['tooltip_3']="V�lg brugernavn, email og password";

$lang['tooltip_4']="Kan redigeres senere i admin center";

$lang['tooltip_5']="Korriger stien her, hvis den foresl�ede er forkert";

$lang['tooltip_6']="Det er s�dan du s�tter URLen som Cronjob:<br>
http://user:passwort@".$file_root."/newsletter_cron.php<br><br>
Brug scriptets brugernavn and password.";

$lang['tooltip_7']="For direkte hilsen i email,<br>brug placeholder {FORENAME}";

$lang['tooltip_8']="N�dvendigt for linket i aktiveringsemailen";

$lang['tooltip_9']="Vil blive sendt til den angvine emailaddresse under Nyhedsbrev indstillinger";

$lang['tooltip_10']="Tilf�j din database prefix<br>for NEWSolved Professional";

$lang['tooltip_11']="Denne emailadresse er til test emails, underretning om tilmeldning og kontaktformular";

$lang['tooltip_12']="Skriv en adresse som <b>mail.din_udbyder.net</b>, porten er som reglen <b>25</b>";;


$lang['tooltip_13']="
<b>PHP Mail:</b>
<br>Emails vil blive sendt med internal PHP Mailer.";
/*<br><br>
<u>Pro:</u><br>
- Ingen SMTP Server n�dvendig
<br><br>
<u>Kontra:</u>
<br>
- H�jere server CPU load
<br>
- Langsom
<br><br>
<b>SMTP Relay:</b><br>
Endnu ikke implementeret
";
*/

$lang['tooltip_14']="Dette k�rer p� Linux s� vel som Windows med PHP Version 5.0. Dette er for at aflaste CPU.";

$lang['tooltip_15']="Du kan importerer skabeloner hvis HTML er aktiveret. Disse skal v�re i <u>*.html</u> format og uploaded via ftp til <u>html_templates</u>.";

$lang['tooltip_16']="Hvis Flash-Form er aktiveret, skal du s�tte disse indstillinger til \"nej\".";

$lang['tooltip_17']="Intet gruppevalg til r�dighed, hvis du har valgt <b>Flash</b> som form.";

$lang['tooltip_18']="Dette vil aktivere sendemetoden fra version 1.7 for server og browser som ikke kan bruge den nuv�rende metode.<br>Browseren skal v�re �ben til alle emails er sendt.";

$lang['tooltip_18_1'] = "Notice: Function \"live\" can be used!";

$lang['tooltip_19']="Dette er kun til r�dighed hvis HTML emails er aktiveret.";

$lang['tooltip_20']="Kun synligt med aktiveret HTML encoding";

$lang['tooltip_21']="Du skal aktivere profilskabelonen,<br>hvis du vil bruge place holder {PROFILE_LINK} i emails.<br><br>
Note:<br>Profilerne har ikke et brugerlogin, s� alle, der kan g�tte bruger-id kan se profilen!";

$lang['tooltip_22']="For direkte hilsen i email,<br>brug placeholder {SURNAME}";

$lang['tooltip_23']="For direkte hilsen i email,<br>brug placeholder {TITLE}";

$lang['tooltip_24']="Hvis du har valgt 'Ja', er radio buttons p� nyhedsbrevformularen, hvor man kan v�lge til og framelding gemt ,<br>sa du skal bruge place holder {UNSUBSCRIBE_LINK} i din email s� brugere kan framelde via link.";

$lang['tooltip_25']="At sende store vedh�ftede filer til mange tilmeldte kan f�re til massiv serverbelastning.";

$lang['tooltip_26']="Hvis du har aktiveret HTML emails og den nye sendemetode, et 1x1 pixel billede vil blive indsat i emails. Dette t�ller visninger af nyhedsbrevet.<br><br>V�r venlig at informere de tilmeldte at nyhedsbrevet sender informationer til din server n�r de �bner det. Ellers s�t denne mulighed ud af drift.";

$lang['tooltip_27']="The Ajax-Form uses JavaScript to perform user inputs. There's no need for a page refresh after the submit.";	//still english

###################################################
################## Installation ###################
###################################################


$lang['inst_s2_headline']="Database - Konfiguration: Trin 2";
$lang['inst_s2_error']="Fejl";
$lang['inst_s2_host']="Host";
$lang['inst_s2_dbtype']="Datanbase Type";
$lang['inst_s2_dbname']="Database navn";
$lang['inst_s2_user']="Brugernavn";
$lang['inst_s2_password']="Password";
$lang['inst_s2_prefix']="Database Prefix";
$lang['inst_s2_back']="Forrige";
$lang['inst_s2_cont']="N�ste";

$lang['inst_s3_headline']="Database - Konfiguration: Trin 3";
$lang['inst_s3_error']="Fejl";
$lang['inst_s3_user']="Brugernavn";
$lang['inst_s3_email']="Email";
$lang['inst_s3_password']="Password";
$lang['inst_s3_rpassword']="Skriv Password igen";
$lang['inst_s3_scriptpath']="Scriptets sti";
$lang['inst_s3_usecockies']="Brug cookies";
$lang['inst_s3_usesessions']="Brug sessions";
$lang['inst_s3_permanentlogin']="Permanent login";
$lang['inst_s3_limitedtime']="Begr�nset tid";
$lang['inst_s3_back']="Forrige";
$lang['inst_s3_install']="Installer";

$lang['inst_s4_headline']="Database - Konfiguration: Step 4";
$lang['inst_s4_success']="Installation af NLetter er fuldendt korrekt";
$lang['inst_s4_output1']="For at f� adgang til NLetter, klik p� linket herunder";
$lang['inst_s4_output2']="NLetter";
$lang['inst_s4_admin1']="For at f� adgang til Admin Center, klik her";
$lang['inst_s4_admin2']="Admin Center";

$lang['inst_error_headline']="Fejl";
$lang['inst_error_host']="V�r venlig at tilf�je host navn";
$lang['inst_error_dbname']="V�r venlig at tilf�je databasens navn";
$lang['inst_error_dbuser']="V�r venlig at tilf�je database brugernavn";
$lang['inst_error_dbpw']="V�r venlig at tilf�je database password";
$lang['inst_error_dbno']="Database ikke til r�dighed";
$lang['inst_error_dbset']="V�r venlig at tjekke databaseindstillinger";
$lang['inst_error_user']="V�r venlig at tjekke brugernavn";
$lang['inst_error_pw']="V�r venlig at tjekke password";
$lang['inst_error_pwr']="V�r venlig at skrive password igen";
$lang['inst_error_pwsame']="De angivne passwords matcher ikke";
$lang['inst_error_mail']="V�r venlig at tilf�je en emailadresse";
$lang['inst_error_mailcheck']="V�r venlig at verificere at din emailadresse er korrekt";
$lang['inst_error_prefix1']="Attention: Theres already an installation with this prefix!";			//still english
$lang['inst_error_prefix2']="When you continue, the existing installation will be overwritten.";	//still english


###################################################
###################### Login ######################
###################################################


$lang['login_user']="Brugernavn";
$lang['login_pw']="Password";
$lang['login_login']="Login";
$lang['login_forgotpw']="Glemt Password?";
$lang['login_error1']="Forkert login";
$lang['login_error2']="Tilbage";

$lang['login_back']="Tilbage";
$lang['login_username']="Brugernavn";
$lang['login_email']="Email";
$lang['login_requestpw']="Bed om password";

$lang['login_check_user']="Tjek venligst brugernavn";
$lang['login_check_email1']="Tjek venligst email adresse";
$lang['login_check_email2']="V�r venlig at verificere at din email-adresse er korrekt";
$lang['login_subject']="Nyt Password";
$lang['login_mail1']="Hej";
$lang['login_mail2']="Du har bedt om et nyt password. Dit nye login er:";
$lang['login_mail3']="Brugernavn";
$lang['login_mail4']="Password";
$lang['login_mailsent1']="Mail sendt til";
$lang['login_mailsent2']="";
$lang['login_wrongdata']="Forkerte data";



###################################################
###################### Admin ######################
###################################################


$lang['admin_lang_button']="OK";
$lang['admin_logout']="Log ud";
$lang['admin_deinstall']="Afinstaller";
$lang['admin_deinstall_info']="Gennem denne aktion vil hele nyhedssystemet blive ubrugeligt og hele databasen slettet. Er du sikker p�, du vil slette NLetter?";
$lang['admin_to_cookies']="Skift login metode til cookies";
$lang['admin_to_sessions']="Skift login metode til sessions";
$lang['admin_to_change']="";
$lang['admin_output_newsletter']="Nyhedsbrev form output...";
$lang['admin_output_contactform']="Kontaktformular output...";

$lang['admin_group_email']="Email";
$lang['admin_group_unlock']="L�s brugere op manuelt";
$lang['admin_group_unlock_button']="L�s op";
$lang['admin_group_unlock_success']="Bruger er korrekt l�st op";
$lang['admin_group_forename']="Fornavn";
$lang['admin_group_surname']="Efternavn";
$lang['admin_group_groupname']="Gruppenavn";
$lang['admin_group_rel']="Relateret";
$lang['admin_group_none']="Ingen gruppe til r�dighed";
$lang['admin_group_edit']="Rediger";

$lang['admin_bl_blocked']="Blokkerede emails";
$lang['admin_bl_sure']="Er du sikker";
$lang['admin_bl_del']="Slet";
$lang['admin_bl_alldel']="Slet alle emails";
$lang['admin_bl_sofar']="Endnu ingen";

$lang['admin_archive_addr']="Adresser";
$lang['admin_archive_subject']="Overskrift";
$lang['admin_archive_date']="Dato";
$lang['admin_archive_msg']="Meddelelse";
$lang['admin_archive_group']="Gruppe";
$lang['admin_archive_views']="Visninger";
$lang['admin_archive_t1']="Er blevet sendt til";
$lang['admin_archive_t2']="modtagere fra gruppen $aus_groupnavn->gruppenavn";

$lang['admin_menu_headline']="Generelle indstillinger";
$lang['admin_menu_newsletter']="Nyhedsbrev";
$lang['admin_menu_newslettertext']="Nyhedsbrev tekstdefinitioner";
$lang['admin_menu_contactform']="Kontaktformular";
$lang['admin_menu_misc']="Forskelligt";



###################################################
#################### Licence ######################
###################################################


$lang['admin_licence_headline']		= "Licens";
$lang['admin_licence_domain']		= "Dom�ne";
$lang['admin_licence_key']			= "Key";
$lang['admin_licence_submit']		= "Submit licence";
$lang['admin_licence_updated']		= "Database updated";

###################################################
###################### Start ######################
###################################################


$lang['start_headline']="NLetter statistik";
$lang['start_newsletter']="Nyhedsbrev";
$lang['start_sentnewsletter']="Sendte nyhedsbreve";
$lang['start_receivers']="Modtagere";
$lang['start_contactform']="Kontaktformular";
$lang['start_allmsg']="Alle meddelelser";
$lang['start_answered']="Besvarede meddelelser";
$lang['start_unopen']="U�bnede meddelelser";



###################################################
##################### Setuser #####################
###################################################

$lang['setuser_headline']="Brugerh�ndtering";
$lang['setuser_lockeduser']="Vis l�ste brugere";
$lang['setuser_firstletter']="F�rste brev";
$lang['setuser_all']="Alle";
$lang['setuser_filter']="Filter";
$lang['setuser_number']="Nummer";
$lang['setuser_ok']="OK";
$lang['setuser_searchemail']="Emails�gning";
$lang['setuser_searchemailok']="S�g";
$lang['setuser_searchdate']="Datos�gning";
$lang['setuser_searchdateok']="S�g";
$lang['setuser_suretodelemails']="Er du sikker p�, du vil slette alle emailadresser? Denne aktion kan ikke g�res ugjort!";
$lang['setuser_hemailadress']="Emailadresse";
$lang['setuser_hname']="Navn";
$lang['setuser_hgroup']="Gruppe";
$lang['setuser_hregdate']="Registreringsdato";
$lang['setuser_hdelete']="Slet";
$lang['setuser_noresults']="Ingen resultater";
$lang['setuser_edit']="Rediger";
$lang['setuser_delete']="Slet";
$lang['setuser_all']="Alle";
$lang['setuser_suredelselemail']="Er du sikker p�, du vil slette den valgte email-adresse?";
$lang['setuser_groupmanage']="Gruppeh�ndtering";
$lang['setuser_hidden']="Usynlig";
$lang['setuser_default']="Default";
$lang['setuser_add']="Tilf�j";
$lang['setuser_sure']="Er du sikker?";
$lang['setuser_delgroup']="Slet";
$lang['setuser_default_entry_group']="Put user in this group by default";	//still english
$lang['setuser_editgroup']="Rediger";
$lang['setuser_empty']="Tom";
$lang['setuser_userheadline']="Tilf�j bruger manuelt";
$lang['success_new_user']="Ny bruger er korrekt tilf�jet";
$lang['notice_new_user']				= "The e-mail address already exists in the database!";	//still english




###################################################
################### Ex- Import ####################
###################################################

$lang['exim_error']						= "Eksport er ikke muligt, p� grund af manglende CHMOD 777 til folder '/settings'!";
$lang['exim_addradded']					= "Adresser f�jet til email-listen";
$lang['exim_filerror']					= "Filfejl";
$lang['exim_up_bladded']				= "Adresser f�jet til Blacklisten";
$lang['exim_up_bladded_single']			= "Adresse f�jet til Blacklisten";
$lang['exim_up_bladded_single_error']	= "Adressen eksisterer allerede";
$lang['exim_up_removed']				= "Adresser fjernet fra DB";
$lang['exim_headline']					= "Ex- og Import af NLetter";
$lang['exim_addsqlemails']				= "F�j adresser til DB fra en SQL fil";
$lang['exim_exportsqlemails']			= "Eksporter emailadresser til en SQL fil";
$lang['exim_export_allemails']			= "Eksporter emails med grupper and gruppedefinition";
$lang['exim_export_agroup']				= "Eksporter kun emails fra denne gruppe";
$lang['exim_exportsqlemails_truncate']	= "Med 'Empty Table' kommando";
$lang['exim_eximforeign']				= "Eks- og Import fra og til fremmede scripts";
$lang['exim_addemailsfromtext']			= "Tilf�j emailadresser til DB fra en tekst fil";
$lang['exim_exportmailsintext']			= "Eksporter emailadresser til en tekstfil";
$lang['exim_attention']					= "Giv agt: Ikke for senere brug i dette script";
$lang['exim_blacklist']					= "Blackliste";
$lang['exim_showlist']					= "Vis liste";
$lang['exim_addtobl']					= "F�j emailadresser Blacklisten fra en tekstfil";
$lang['exim_addsinglemailtobl']			= "F�j emailadresser manuelt til Blacklisten";
$lang['exim_removeadress']				= "Fjern adresser fra DB";
$lang['exim_adressesfromtext']			= "Emailadresser fra tekstfil";
$lang['exim_delete']					= "Slet";
$lang['exim_add']						= "Tilf�j";
$lang['exim_group']						= "Gruppe";
$lang['exim_startexport']				= "Start Email/Gruppe eksport";
$lang['exim_startexport_emails']		= "Start Email eksport";
$lang['exim_nogroups']					= "Ingen grupper til r�dighed";
$lang['exim_allowdouble']				= "allow duplicate addresses to be inserted into the database";	//still english


###################################################
#################### Settings #####################
###################################################


$lang['settings_no']="Nej";
$lang['settings_yes']="Ja";

$lang['settings_oldpw_notcorrect']="Gammelt password var ikke korrekt!";
$lang['settings_notfilledout']="Ikke helt udfyldt!";
$lang['settings_pwmatch']="De angivne passwords matcher ikke!";
$lang['settings_pwchange1']="Skiftet password fra";
$lang['settings_pwchange2']="til";
$lang['settings_pwchange3']="";
$lang['settings_edited']="Redigeret";

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
$lang['settings_misc_createnewuser']		= "Create new user";						//still english
$lang['settings_misc_usereditbutton']		= "Edit user";								//still english
$lang['settings_misc_groupmanagement']		= "Group management";						//still english
$lang['settings_misc_newgroup']				= "Create new group";						//still english
$lang['settings_misc_groupname']			= "Group name";								//still english
$lang['settings_misc_creategroupbutton']	= "Create group";							//still english
$lang['settings_misc_groupedit']			= "Edit group";								//still english
$lang['settings_misc_edit']					= "Edit";									//still english
$lang['settings_misc_nogroupsbutadmin']		= "No groups available besides 'Admin'.";	//still english
$lang['settings_misc_deletegroup']			= "Delete group";							//still english

$lang['settings_nl_headline']="Nyhedsbrev";
$lang['settings_nl_layout']="Layout";
$lang['settings_nl_width']="Table width";
$lang['settings_nl_tfwidth']="Textfield width";
$lang['settings_nl_bgcolor']="Background color";
$lang['settings_nl_background']="Background image";
$lang['settings_nl_fontcolor']="Font color";
$lang['settings_nl_fontsize']="Font size";
$lang['settings_nl_fonttype']="Font family";
$lang['settings_nl_default']="Default options";
$lang['settings_nl_charset']="Definer charset";
$lang['settings_nl_addresser']="Definer adresser";
$lang['settings_nl_email']="Definer email";
$lang['settings_nl_subject']="Definer overskrift";
$lang['settings_nl_sig']="Definer signatur";
$lang['settings_nl_default_unsubscribe']="Linktekst til framelding";
$lang['settings_nl_default_subscribe']="Tilmeldingstekst";
$lang['settings_nl_default_welcome']="Velkomsttekst";
$lang['settings_nl_default_alternatetext']="Show text if user can't display HTML E-Mails";	//still english
$lang['settings_nl_settings']="Indstillinger";
$lang['settings_nl_mailsending']="Emailforsendelse";
$lang['settings_nl_interval']="Interval";
$lang['settings_nl_oldway']="Deactivate send method \"live\"";	//still english
$lang['settings_nl_sec']="Millisekunder";
$lang['settings_nl_user_intv']="Bruger / Interval";
$lang['settings_nl_general']="Generelt";
$lang['settings_nl_nlform']="Output-Form";
$lang['settings_nl_nlprofile']="Aktiver profilskabelon";
$lang['settings_nl_nlform_html']="HTML";
$lang['settings_nl_nlform_flash']="Flash";
$lang['settings_nl_useractivation']="Brugeraktivering";
$lang['settings_nl_instand']="�jeblikkelig";
$lang['settings_nl_viaemail']="Email";
$lang['settings_nl_mailencoding']="Email encoding";
$lang['settings_nl_text']="Text";
$lang['settings_nl_html']="HTML";
$lang['settings_nl_wysiwyg']="WYSIWYG Editor";
$lang['settings_nl_image_upload']="Hent billede";
$lang['settings_nl_attachment_upload']="Send vedh�ftet fil";
$lang['settings_nl_attach_viewcount']="Aktiver visningst�ller";
$lang['settings_nl_unsubscribeinmail']="Frameld via<br>link i emailen";
$lang['settings_nl_welcome']="Velkomst email";
$lang['settings_nl_mailtoadmin']="Send email til admin hvis<br bruger til- eller framelder";
$lang['settings_nl_popup_msgs']="Popup meddelelser<br>i output";
$lang['settings_nl_usergroup']="Bruger kan v�lge gruppe";
$lang['settings_nl_usergroup_radio']="Forbyd flere valg?";
$lang['settings_nl_userselect']="Type";				//still english
$lang['settings_nl_titleinput']="Tilf�j titel n�r<br>bruger tilmelder sig";
$lang['settings_nl_forenameinput']="Tilf�j fornavn n�r<br>bruger tilmelder sig";
$lang['settings_nl_surnameinput']="Tilf�j efternavn n�r<br>bruger tilmelder sig";
$lang['settings_nl_plugin_activate']="Activate<br>NEWSolved Pro. Plugin";
$lang['settings_nl_language']="Language";		//still english
$lang['settings_nl_plugin_prefix']="NEWSolved Prefix";
$lang['settings_nl_mailaddress']="Mailadresse";
$lang['settings_nl_scriptpath']="Sti til script";
$lang['settings_nl_sendtype']="Sende-type";
$lang['settings_nl_sendtype_type']="Type";
$lang['settings_nl_sendtype_type1']="PHP Mail";
$lang['settings_nl_sendtype_type2']="SMTP Relay";
$lang['settings_nl_sendtype_exe']="Fast Extension";
$lang['settings_nl_sendtype_relay']="SMTP Server";
$lang['settings_nl_sendtype_port']="Port";
$lang['settings_nl_sendtype_user']="Brugernavn";
$lang['settings_nl_sendtype_pw']="Password";
$lang['settings_nl_ajax']	= "Ajax newsletter form";					//still english
$lang['settings_nl_captcha']= "Captcha-code for registration";			//still english

$lang['settings_cf_headline']="Kontaktformular";
$lang['settings_cf_layout']="Layout";
$lang['settings_cf_width']="Width";
$lang['settings_cf_height']="Height";
$lang['settings_cf_bgcolor']="Background color";
$lang['settings_cf_background']="Background image";
$lang['settings_cf_fontcolor']="Font color";
$lang['settings_cf_fontcolorerror']="Fejl font color";
$lang['settings_cf_fontsize']="Font size";
$lang['settings_cf_fonttype']="Font family";
$lang['settings_cf_settings']="Indstillinger";
$lang['settings_cf_sig']="Signatur";
$lang['settings_cf_title']="Titel";
$lang['settings_cf_showname']="Vis navn";
$lang['settings_cf_showsurname']="Vis efternavn";
$lang['settings_cf_showcity']="Vis by";
$lang['settings_cf_showsubject']="Vis overskrift";
$lang['settings_cf_showtel']="Vis telefonnummer";
$lang['settings_cf_sendmail']="Send email n�r en ny tilmelder sig";
$lang['settings_cf_captcha']="Activate Captcha Code";	//still english

$lang['settings_ot_headline']="Forskelligt";
$lang['settings_ot_userdata']="Brugerdata";
$lang['settings_ot_username']="Brugernavn";
$lang['settings_ot_mailaddress']="Email-addresse";
$lang['settings_ot_oldpw']="Gammelt password";
$lang['settings_ot_newpw']="Nyt password";
$lang['settings_ot_rnewpw']="Gentag nyt<br>password";

$lang['settings_savesettings']="Gem indstillinger";


#####


$lang['settings_nltext_headline']					= "Nyhedsbrev tekstdefinitioner";
$lang['settings_nltext_placeholdertoplacerholder']	= "Placerholder til Placeholder erstatning";
$lang['settings_nltext_getsreplacedwith']			= "bliver erstatet med";
$lang['settings_nltext_placeholdertoexpr']			= "Placeholder til Expression erstatning";
$lang['settings_nltext_ifplaceholder']				= "Hvis placeholder";
$lang['settings_nltext_ifmale']						= "Male, erstat placeholder med";
$lang['settings_nltext_iffemale']					= "Female, erstat placeholder med";
$lang['settings_nltext_and']						= "og";
$lang['settings_nltext_empty']						= "Tom";

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

$lang['sendform_markassent']="Marker nyheder som sendt";
$lang['sendform_markasnotsent']="Marker nyheder som usendte";
$lang['sendform_checkaddresser']="Tjek adresser";
$lang['sendform_checksubject']="Tjek overskrift";
$lang['sendform_nonewsfound']="Ingen nyheder fundet";
$lang['sendform_norecipient']="Ingen modtagere";
$lang['sendform_sendnewsletter']="Send nyhedsbrev";
$lang['sendform_group']="Gruppe";

$lang['sendform_addresser']="Dit navn";
$lang['sendform_subject']="Overskrift";
$lang['sendform_message']="Meddelelse";
$lang['sendform_resizer_smaller']="Indskr�nk tekstfelt";
$lang['sendform_resizer_bigger']="Udvid tekstfelt";

$lang['sendform_emailencoding']="E-Mail encoding";
$lang['settings_sendmethod']="Send-Type";
$lang['settings_sendphp']="PHP Mail";
$lang['settings_sendsmtp']="SMTP Relay";
$lang['sendform_break']="Break";
$lang['sendform_bold']="Bold";
$lang['sendform_italic']="Italic";
$lang['sendform_underline']="Underline";
$lang['sendform_cross']="Crossed";
$lang['sendform_textcolor']="Font color";
$lang['sendform_textsize']="Font size";
$lang['sendform_textfamily']="Font family";
$lang['sendform_insertimg']="Inds�t billede";
$lang['sendform_insertlink']="Inds�t link";
$lang['sendform_insertemaillink']="Inds�t email link";
$lang['sendform_center']="Center";
$lang['sendform_right']="Align right";
$lang['sendform_list']="Liste";
$lang['sendform_table']="Table";
$lang['sendform_tableimg']="Table / Image";
$lang['sendform_missingemail']="Definer en default email addresse i Nyhedsbrev tekstdefinitionsindstillinger";
$lang['sendform_button_sendnewsletter']="Send nyhedsbrev";
$lang['sendform_button_sendnewsletter_q']	= "Click OK to send the newsletter";	//still english
$lang['sendform_button_simulate']="Simuler";
$lang['sendform_simulate_msg']="Dette vil simulere en rigtig forsendelsesprocedure!";
$lang['sendform_button_testmail']="Test email";
$lang['sendform_testmail_msg']="Dette vil sende en test email til din addresse!";
$lang['sendform_button_saveemail']="Gem email som skabelon under navnet";
$lang['sendform_button_saveemail_button']="Gem";
$lang['sendform_button_saveemail_error']="V�r venlig at skrive et skabelonnavn";
$lang['sendform_button_saveemail_success']="Skabelon korekt tilf�jet";
$lang['sendform_button_saveemail_overwrite']="Nuv�rende skabelon korrekt overskrevet";
$lang['sendform_button_preview']="Smugkig";
$lang['sendform_check2addresser']="Tjek addresser";
$lang['sendform_check2subject']="Tjek overskrift";
$lang['sendform_check2msg']="Tjek meddelelse";
$lang['sendform_newsletterinfo']="Nyhedsbrev info";
$lang['sendform_lastnlettersend']="Seneste nyhedsbrev sendt for";
$lang['sendform_days']="dage siden.";
$lang['sendform_hours']="timer siden.";
$lang['sendform_minutes']="minutter siden.";
$lang['sendform_nosent_sofar']="Ingen nyhedsbreve er sendt endnu";
$lang['sendform_sendingat']="Forsendelsesprocedure fra";
$lang['sendform_failed']="mislykkedes";
$lang['sendform_resumeclick']="Klik her for opsumering";
$lang['sendform_resume']="Opsumering";
$lang['sendform_whilesending']="Tag ikke hensyn til denne meddelelse, mens  forsendelsesproceduren k�rer.";
$lang['sendform_newsletterarchive']="Nyhedsbrev arkiv";
$lang['sendform_lastnewsletter']="Seneste 10";
$lang['sendform_templates']="Gemte skabeloner";
$lang['sendform_templates_deleted']="Skabelon slettet";
$lang['sendform_prev']="Forrige";
$lang['sendform_next']="N�ste";
$lang['sendform_sure']="Er du sikker?";
$lang['sendform_delete']="Slet";
$lang['sendform_nothing']="Intet endnu!";
$lang['sendform_newsolvedpro_plugin']="NEWSolved Professional Plugin";
$lang['sendform_ingeneral']="Generelt";
$lang['sendform_latest1']="Send den seneste";
$lang['sendform_latest2']="nyheder";
$lang['sendform_date1']="Send nyheder fra dato";
$lang['sendform_date2']="";


$lang['sendform_button_save']="Gem";
$lang['sendform_button_ok']="OK";

$lang['sendform_template']="Skabeloner";
$lang['sendform_template_insert']="Allerede skreven tekst vil blive overskrevet ved denne handling. Er du sikker?";
$lang['sendform_template_no']="Ingen skabeloner fundet";
$lang['sendform_template_title_img']="Inds�t skabelon";
$lang['sendform_template_title_lnk']="Se skabelon";

$lang['sendform_attachment']="Hent vedh�ftet fil";
$lang['sendform_attachment_upload_ok']="Hent vedh�ftede filer";
$lang['sendform_attachment_file']="Fil";
$lang['sendform_attachment_success1']="Disse filer er korrekt hentet:";
$lang['sendform_attachment_success2']="";
$lang['sendform_attachment_error1']="Fejl under hentning af f�lgende filer:";
$lang['sendform_attachment_head']="vedh�ftede filer";

$lang['sendform_image']="Hent billeder";
$lang['sendform_image_upload_ok']="Hent billede";
$lang['sendform_image_chmodcheck']="CHMOD for folder ./upload skal s�ttes til '777'";

$lang['sendform_image_upload_error1']="Din fil er st�rre end";
$lang['sendform_image_upload_error2']="";
$lang['sendform_image_upload_error3']="Kun f�lgende filer er tilladt";
$lang['sendform_image_upload_error4_1']="En mappe skal oprettes";
$lang['sendform_image_upload_error4_2']="Dette kan g�res i indstillinger for hentning";
$lang['sendform_image_upload_exists']="Filen eksisterer allerede";
$lang['sendform_image_upload_error5']="Skal denne fil overskrives";
$lang['sendform_image_upload_error5_1']="Ja";
$lang['sendform_image_upload_error5_2']="Nej";
$lang['sendform_image_upload_upbutton']="Hent fil";
$lang['sendform_image_upload_filename']="Fil navn";
$lang['sendform_image_upload_filesize']="Fil st�rrelse";

$lang['sendform_sm']="Gem som skabelon";


###################################################
##################### Sendin ######################
###################################################

$lang['sendin_contact']="Sendt i emails";
$lang['sendin_back']="Tilbage";
$lang['sendin_date']="Dato";
$lang['sendin_title']="Titel";
$lang['sendin_name']="Navn";
$lang['sendin_surename']="Efternavn";
$lang['sendin_city']="By";
$lang['sendin_telephone']="Telefon";
$lang['sendin_date']="Dato";
$lang['sendin_email']="Email";
$lang['sendin_emailtosend']="Modtager-email";
$lang['sendin_subject']="Overskrift";
$lang['sendin_message']="Meddelelse";
$lang['sendin_forward']="Forward email";
$lang['sendin_button_send']="Send";
$lang['sendin_button_forward']="Forward";
$lang['sendin_nosubject']="no overskrift";
$lang['sendin_sure']="Er du sikker?";
$lang['sendin_originalmsg']="Original meddelelse";
$lang['sendin_forwarderror']="Skriv en modtager email";
$lang['sendin_forwardsuccess']="Successfully sendt!";


###################################################
#################### Sendmail #####################
###################################################


$lang['sendmails_sentwithnletter']="Dette nyhedsbrev er sendt med NLetter PHP Script.Forfatterne af scriptet kan ikke kontrollerer indholdet. For indholdet af nyhedsbrevet er kun afsenderen ansvarlig";
$lang['sendmails_sendmsg1']="Nyhedsbrev er blevet sendt til";
$lang['sendmails_sendmsg2']="modtagere indtil nu";
$lang['sendmails_sendmsg3']="Stadig";
$lang['sendmails_sendmsg4']="er tilbage";
$lang['sendmails_sendmsg5']="Vent venligst";
$lang['sendmails_sendmsg6']="sekunder...";
$lang['sendmails_sendmsg7']="Trin";
$lang['sendmails_success1']="Nyhedsbrevet er sendt til";
$lang['sendmails_success2']="modtagere";
$lang['sendmails_finished']="Afsluttet";
$lang['sendmails_simfinished']="Simulering afsluttet";
$lang['sendmails_error']="Nyhedsbrevet kunne ikke sendes fordi der endnu ingen tilmeldte er";
$lang['sendmails_own1']="Nyhedsbrevet er sendt til din egen emailaddresse";
$lang['sendmails_own2']="";
$lang['sendmails_own_error']="Ingen emailaddresse valgt i indstillinger";



######################################################################################################
######################################################################################################
######################################################################################################



###################################################
################## Sendin Ouput ###################
###################################################


$lang['osendin_check_email']="V�r venlig at tilf�je en emailaddresse!";
$lang['osendin_check_emailcorrect']="V�r venlig at verificere at din emailaddresse er korrekt!";
$lang['osendin_check_name']="V�r venlig at tilf�je et navn!";
$lang['osendin_check_captcha']="Please repeat the catpcha code correctly!";	//still english
$lang['osendin_check_surname']="V�r venlig at tilf�je et efternavn!";
$lang['osendin_check_city']="V�r venlig at tilf�je en by!";
$lang['osendin_check_subject']="V�r venlig at tilf�je en overskrift!";
$lang['osendin_check_msg']="V�r venlig at tilf�je en meddelelse!";
$lang['osendin_check_telephone']="V�r venlig at tilf�je et telefonnummer!";
$lang['osendin_success']="Korrekt sendt!";
$lang['osendin_email_new']="Ny meddelelse";
$lang['osendin_email_name']="Navn";
$lang['osendin_email_address']="E-Mail";
$lang['osendin_email_msg']="Meddelelse";
$lang['osendin_email_info']="F� adgang til denne meddelelse i NLetters Admin Center.";

$lang['osendin_contactform']="Kontaktform";
$lang['osendin_title']="Titel";
$lang['osendin_title_male']="Hr.";
$lang['osendin_title_female']="Fr.";
$lang['osendin_name']="Navn";
$lang['osendin_surname']="Efternavn";
$lang['osendin_city']="By";
$lang['osendin_telephone']="Telefon";
$lang['osendin_email']="Email";
$lang['osendin_subject']="Overskrift";
$lang['osendin_msg']="Meddelelse";
$lang['osendin_captcha']="Captcha";	//still english
$lang['osendin_button_send']="Send";


###################################################
################ Newsletter Ouput #################
###################################################

$lang['onl_newunsubscribe']="Ny framelding";
$lang['onl_unsubscribed']="Frameldt!";
$lang['onl_emailunlocked']="Emailadressen er aktiveret";
$lang['onl_newsubscriber']="Ny tilmelding";
$lang['onl_subscribed_mail']="Tilmeldt Nyhedsbrev";
$lang['onl_wrongid']="Forkert ID eller emailadressen er allerede l�st op. Tjek linket igen!";
$lang['onl_checkemail']="V�r venlig at verificere emailadresse!";
$lang['onl_checkgroup']="V�r venlig at v�lge en gruppe!";
$lang['onl_checkcaptcha']="Wrong captcha code!";	//still english
$lang['onl_checkgroup_edit']="V�r venlig at v�lge en gruppe!";
$lang['onl_success']="Du er nu tilmeldt!";
$lang['onl_success_edit']="Din profil er nu redigeret!";
$lang['onl_newsletterunlock']="Aktiver Nyhedsbrev";
$lang['onl_mailavtivation']="Emailadressen vil blive aktiveret n�r du har klikket p� linket i den sendte email!";
$lang['onl_error']="Allerede tilmeldt eller udelukket af admin!";
$lang['onl_error_edit'] = "Emailadresse ikke tilladt!";
$lang['onl_nomail']="Emailadresse ikke fundet!";
$lang['onl_formemail']="emailadresse";
$lang['onl_form_title']="Titel";
$lang['onl_form_mr']="Hr.";
$lang['onl_form_mrs']="Fr.";
$lang['onl_form_forename']="Fornavn";
$lang['onl_form_surname']="Efternavn";
$lang['onl_group']="V�lg gruppe";
$lang['onl_subscribe']="Tilmeld";
$lang['onl_unsubscrib']="Frameld";
$lang['onl_ok']="Tilmeld";
$lang['onl_suretounsubscribe']			= "Are you sure to unsubscribe your e-mail address?";	//still english
$lang['onl_suretounsubscribe_yes']		= "Yes";												//still english


###################################################
############### User Profile Ouput ################
###################################################

$lang['profile_edit_headline']	= "Rediger profil";
$lang['profile_edit']			= "Rediger";



###################################################
################### Error Codes ###################
###################################################

$lang['relaymail_fatal1']	= "Der kunne ikke etableres tilslutning til SMTP";
$lang['relaymail_fatal2']	= "Uventet svar fra server - er portnummer korrekt?";
$lang['relaymail_fatal3']	= "SMTP relay underst�tter ikke ESMTP";
$lang['relaymail_fatal4']	= "Brugernavn og/eller password er forkert";
$lang['relaymail_fatal5']	= "AUTH LOGIN mislykkedes, m�ske er dette deaktiveret fra server-side";
$lang['relaymail_fatal6']	= "Brugernavn er forkert";
$lang['relaymail_fatal7']	= "Password er forkert";
$lang['relaymail_fatal8']	= "SMTP relay pr�ver at gennemf�re et autorisationsskema. der ikke er underst�ttet af NLetter";


###################################################
#################### Mailjobs #####################
###################################################

$lang['dispatchjob_successadded']	= "Mailjob er tilf�jet";
$lang['dispatchjob_successinfo']	= "Du kan lukke din browser mens emails bliver sendt.";

$lang['dispatchjob_id']				= "ID";
$lang['dispatchjob_begin']			= "Job-start";
$lang['dispatchjob_email']			= "Sendte emails";
$lang['dispatchjob_progress']		= "Arbejder";
$lang['dispatchjob_elapsedtime']	= "Forbrugt time";
$lang['dispatchjob_remainingtime']	= "Resterende time";

?>
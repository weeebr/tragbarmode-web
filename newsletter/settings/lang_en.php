<?php
##########################################################################
##########################  Script ? by       ############################
##########################  www.usolved.net   ############################
##########################################################################


###################################################
#################### Tooltips #####################
###################################################


$lang['tooltip_1']="Type your DB data in here. These are given by your ISP (Internet Service Provider).<br>The host name is mostly \"localhost\", so if you aren't sure, use this by default.<br>For use with SQLite enter your database file into the Host field.";

$lang['tooltip_2']="If would like to install the newssystem multiple times into the same database, the existing db tables will be overwritten. So you should choose another prefix.";

$lang['tooltip_3']="Choose a username, e-mail and password";

$lang['tooltip_4']="Editable later in the admin center";

$lang['tooltip_5']="Correct the path here, if the suggested is wrong";

$lang['tooltip_6']="That's the way you have to set the URL as Cronjob:<br>
http://user:passwort@".$file_root."/newsletter_cron.php<br><br>
Use the script's username and password.";

$lang['tooltip_7']="For direct salutation in the email,<br>use the placeholder {FORENAME}";

$lang['tooltip_8']="Needed for the link in the activation e-mail";

$lang['tooltip_9']="Will be sent to the given E-Mail address under Newsletter Settings";

$lang['tooltip_10']="Enter your database prefix<br>of NEWSolved Professional";

$lang['tooltip_11']="This eMail address is for test e-mails, subscriber and contact form notification";

$lang['tooltip_12']="Type in a address like <b>mail.your_provider.net</b>, the port is mostly <b>25</b>";;


$lang['tooltip_13']="
<b>PHP Mail:</b>
<br>eMails will be send with the internal PHP Mailer.";
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

$lang['tooltip_14']="This is running on Linux as well as Windows with PHP Version 5.0. This is for CPU discharge.";

$lang['tooltip_15']="You can import templates if HTML is activated. These have to be in <u>*.html</u> format and uploaded to <u>html_templates</u>.";

$lang['tooltip_16']="If Flash-Form has been actived, you have to set this setting to \"no\".";

$lang['tooltip_17']="No group choice awailable, if you have chosen <b>Flash</b> as form.";

$lang['tooltip_18']="This will deactivate the \"live\" send method for servers and browsers that can't handle the other method.";

$lang['tooltip_18_1'] = "Notice: Function \"live\" can be used!";

$lang['tooltip_19']="This is just awailable if HTML eMails are activated.";

$lang['tooltip_20']="Just visible with activated HTML encoding";

$lang['tooltip_21']="You have to activate the profile template,<br>if you like to use the place holder {PROFILE_LINK} in eMails.<br><br>
Note:<br>The profiles don't have an user login, so everybody can guess the user id to view the profile!";

$lang['tooltip_22']="For direct salutation in the email,<br>use the placeholder {SURNAME}";

$lang['tooltip_23']="For direct salutation in the email,<br>use the placeholder {TITLE}";

$lang['tooltip_24']="If you have chosen 'Yes', the radio buttons on the newsletter form output are hidden,<br>so you have to use the place holder {UNSUBSCRIBE_LINK} in your e-mail so users can unsubscribe via link.";

$lang['tooltip_25']="Sending big attachments to a lot of subscribers can lead to massive server-load.";

$lang['tooltip_26']="If you have activated HTML e-mails and the new send method, a 1x1 pixel image will be inserted into e-mails which counts the views of the newsletter.<br><br>Please inform your subscribers that the newsletter sends informations to your server while opening the newsletter. Otherwise disable this option.";

$lang['tooltip_27']="The Ajax-Form uses JavaScript to perform user inputs. There's no need for a page refresh after the submit.";

###################################################
################## Installation ###################
###################################################


$lang['inst_s2_headline']="Database - Configuration: Step 2";
$lang['inst_s2_error']="Error";
$lang['inst_s2_host']="Host";
$lang['inst_s2_dbtype']="Datanbase Type";
$lang['inst_s2_dbname']="Database name";
$lang['inst_s2_user']="Username";
$lang['inst_s2_password']="Password";
$lang['inst_s2_prefix']="Database Prefix";
$lang['inst_s2_back']="Previous";
$lang['inst_s2_cont']="Next";

$lang['inst_s3_headline']="Database - Configuration: Step 3";
$lang['inst_s3_error']="Error";
$lang['inst_s3_user']="Username";
$lang['inst_s3_email']="E-Mail";
$lang['inst_s3_password']="Password";
//$lang['inst_s3_rpassword']="Re-type Passwort";
$lang['inst_s3_rpassword']="Re-type Password";
$lang['inst_s3_scriptpath']="Path of script";
$lang['inst_s3_usecockies']="Use Cookies";
$lang['inst_s3_usesessions']="Use Sessions";
$lang['inst_s3_permanentlogin']="Permanent login";
$lang['inst_s3_limitedtime']="Limited time";
$lang['inst_s3_back']="Previous";
$lang['inst_s3_install']="Install";

$lang['inst_s4_headline']="Database - Configuration: Step 4";
$lang['inst_s4_success']="Installation of NLetter completed sucessfully";
//$lang['inst_s4_output1']="To access NLetter output script, please click the link below";
$lang['inst_s4_output1']="To access the NLetter output script, please click the link below";
$lang['inst_s4_output2']="NLetter";
$lang['inst_s4_admin1']="To enter the Admin Center, please click here";
$lang['inst_s4_admin2']="Admin Center";

$lang['inst_error_headline']="Error";
$lang['inst_error_host']="Please enter host name";
$lang['inst_error_dbname']="Please enter database name";
$lang['inst_error_dbuser']="Please enter database username";
$lang['inst_error_dbpw']="Please enter database password";
$lang['inst_error_dbno']="Database not available";
$lang['inst_error_dbset']="Please check database settings";
$lang['inst_error_user']="Please check username";
$lang['inst_error_pw']="Please check password";
$lang['inst_error_pwr']="Please repeat your password";
$lang['inst_error_pwsame']="The provided passwords do not match";
$lang['inst_error_mail']="Please enter an e-mail address";
$lang['inst_error_mailcheck']="Please verify that your e-mail address is correct";
$lang['inst_error_prefix1']="Attention: Theres already an installation with this prefix!";
$lang['inst_error_prefix2']="When you continue, the existing installation will be overwritten.";



###################################################
###################### Login ######################
###################################################


$lang['login_user']="Username";
$lang['login_pw']="Password";
$lang['login_login']="Login";
$lang['login_forgotpw']="Forgot Password?";
$lang['login_error1']="Wrong login";
$lang['login_error2']="Back";

$lang['login_back']="Back";
$lang['login_username']="Username";
$lang['login_email']="E-Mail";
$lang['login_requestpw']="Request password";

$lang['login_check_user']="Please check username";
$lang['login_check_email1']="Please check e-mail adress";
$lang['login_check_email2']="Please verify that your e-mail address is correct";
$lang['login_subject']="New Password";
//$lang['login_mail1']="Hallo";
$lang['login_mail1']="Hello";
$lang['login_mail2']="you've requested a new password. Your new logins are:";
$lang['login_mail3']="Username";
$lang['login_mail4']="Password";
$lang['login_mailsent1']="Mail sent to";
$lang['login_mailsent2']="";
$lang['login_wrongdata']="Wrong data";



###################################################
###################### Admin ######################
###################################################


$lang['admin_lang_button']="OK";
$lang['admin_logout']="Logout";
$lang['admin_deinstall']="Deinstall";
//$lang['admin_deinstall_info']="Through this action the complete Newssystem will be unusable and the comlete Database will be deleted. Are you sure to delete NLetter?";
$lang['admin_deinstall_info']="Through this action the complete Newssystem will be unusable and the complete Database will be deleted. Are you sure you want to delete NLetter?";
$lang['admin_to_cookies']="Change login method to cookies";
$lang['admin_to_sessions']="Change login method to sessions";
$lang['admin_to_change']="";
$lang['admin_output_newsletter']="Newsletter form output...";
$lang['admin_output_contactform']="Contact form output...";

$lang['admin_group_email']="E-Mail";
$lang['admin_group_unlock']="Unlock user manually";
$lang['admin_group_unlock_button']="Unlock";
$lang['admin_group_unlock_success']="User successfully unlocked";
$lang['admin_group_forename']="Forename";
$lang['admin_group_surname']="Surname";
$lang['admin_group_groupname']="Group name";
$lang['admin_group_rel']="Related";
$lang['admin_group_none']="No groups awailable";
$lang['admin_group_edit']="Edit";

$lang['admin_bl_blocked']="Blocked E-Mails";
$lang['admin_bl_sure']="Are you sure";
$lang['admin_bl_del']="Delete";
$lang['admin_bl_alldel']="Delete all E-Mails";
$lang['admin_bl_sofar']="So far nothing";

$lang['admin_archive_addr']="Adresser";
$lang['admin_archive_subject']="Subject";
$lang['admin_archive_date']="Date";
$lang['admin_archive_msg']="Message";
$lang['admin_archive_group']="Group";
$lang['admin_archive_views']="Views";
//$lang['admin_archive_t1']="Has been send to";
$lang['admin_archive_t1']="Has been sent to";
//$lang['admin_archive_t2']="recipes from the group $aus_groupname->groupname";
$lang['admin_archive_t2']="recipients from the group $aus_groupname->groupname";

$lang['admin_menu_headline']="General Settings";
$lang['admin_menu_newsletter']="Newsletter";
$lang['admin_menu_newslettertext']="Newsletter text-definitions";
//$lang['admin_menu_contactform']="Kontaktformular";
$lang['admin_menu_contactform']="Contact Form";
//$lang['admin_menu_misc']="Sonstiges";
$lang['admin_menu_misc']="Miscellaneous";



###################################################
#################### Licence ######################
###################################################


$lang['admin_licence_headline']		= "Licence";
$lang['admin_licence_domain']		= "Domain";
$lang['admin_licence_key']			= "Key";
$lang['admin_licence_submit']		= "Submit licence";
$lang['admin_licence_updated']		= "Database updated";

###################################################
###################### Start ######################
###################################################


$lang['start_headline']="NLetter statistics";
$lang['start_newsletter']="Newsletter";
$lang['start_sentnewsletter']="Sent newsletter";
$lang['start_receivers']="Receivers";
$lang['start_contactform']="Contact form";
$lang['start_allmsg']="All messages";
$lang['start_answered']="Answered messages";
//$lang['start_unopen']="Unopen messages";
$lang['start_unopen']="Unopened messages";



###################################################
##################### Setuser #####################
###################################################

$lang['setuser_headline']="User Management";
$lang['setuser_lockeduser']="Show locked users";
$lang['setuser_firstletter']="First Letter";
$lang['setuser_all']="All";
$lang['setuser_filter']="Filter";
$lang['setuser_number']="Number";
$lang['setuser_ok']="OK";
$lang['setuser_searchemail']="E-Mail search";
$lang['setuser_searchemailok']="Search";
$lang['setuser_searchdate']="Date search";
$lang['setuser_searchdateok']="Search";
//$lang['setuser_suretodelemails']="Are you sure to delete all E-Mail addresses? This action can't be undo!";
$lang['setuser_suretodelemails']="Are you sure you want to delete all E-Mail addresses? This action can't be undone!";
$lang['setuser_hemailadress']="E-Mail Adress";
$lang['setuser_hname']="Name";
$lang['setuser_hgroup']="Group";
$lang['setuser_hregdate']="Registration date";
$lang['setuser_hdelete']="Delete";
$lang['setuser_noresults']="No results";
$lang['setuser_edit']="Edit";
$lang['setuser_delete']="Delete";
$lang['setuser_all']="All";
//$lang['setuser_suredelselemail']="Are you sure to delete the selected E-Mail adress?";
$lang['setuser_suredelselemail']="Are you sure you want to delete the selected E-Mail adress?";
$lang['setuser_groupmanage']="Group Management";
$lang['setuser_hidden']="Invisible";
$lang['setuser_default']="Default";
$lang['setuser_add']="Add";
$lang['setuser_sure']="Are you sure?";
$lang['setuser_delgroup']="Delete";
$lang['setuser_default_entry_group']="Put user in this group by default";
$lang['setuser_editgroup']="Edit";
$lang['setuser_empty']="Empty";
$lang['setuser_userheadline']="Add user manually";
$lang['success_new_user']="New user successfully added";
$lang['notice_new_user']				= "The e-mail address already exists in the database!";



###################################################
################### Ex- Import ####################
###################################################

$lang['exim_error']						= "Export is not possible due missing CHMOD 777 for folder '/settings'!";
$lang['exim_addradded']					= "Addresses added to the E-Mail list";
$lang['exim_filerror']					= "File error";
$lang['exim_up_bladded']				= "Addresses added to the Blacklist";
$lang['exim_up_bladded_single']			= "Address added to the Blacklist";
$lang['exim_up_bladded_single_error']	= "Address already exists";
$lang['exim_up_removed']				= "Addresses removed from the DB";
$lang['exim_headline']					= "Ex- and Import for NLetter";
$lang['exim_addsqlemails']				= "Add E-Mail addresses to the DB from a SQL file";
$lang['exim_exportsqlemails']			= "Export E-Mail addresses into a SQL file";
$lang['exim_export_allemails']			= "Export all E-Mails with groups and group definition";
$lang['exim_export_agroup']				= "Just export E-Mails from this group";
$lang['exim_exportsqlemails_truncate']	= "With 'Empty Table' Command";
$lang['exim_eximforeign']				= "Ex- and Import from and for foreign scripts";
$lang['exim_addemailsfromtext']			= "Add E-Mail addresses to the DB from a text file";
$lang['exim_exportmailsintext']			= "Export E-Mail addresses to a text file";
$lang['exim_attention']					= "Attention: not for later use in this script";
$lang['exim_blacklist']					= "Blacklist";
$lang['exim_showlist']					= "Show list";
$lang['exim_addtobl']					= "Add E-Mail addresses to the Blacklist from a text file";
$lang['exim_addsinglemailtobl']			= "Add E-Mail addresses manually to the Blacklist";
$lang['exim_removeadress']				= "Remove addresses from the DB";
$lang['exim_adressesfromtext']			= "E-Mail addresses from a text file";
$lang['exim_delete']					= "Delete";
$lang['exim_add']						= "Add";
$lang['exim_group']						= "Group";
$lang['exim_startexport']				= "Start E-Mail/Group export";
$lang['exim_startexport_emails']		= "Start E-Mail export";
$lang['exim_nogroups']					= "No groups awailable";
$lang['exim_allowdouble']				= "allow duplicate addresses to be inserted into the database";	//still english



###################################################
#################### Settings #####################
###################################################


$lang['settings_no']="No";
$lang['settings_yes']="Yes";

$lang['settings_oldpw_notcorrect']="Old password wasn't correct!";
$lang['settings_notfilledout']="Not completly filled out!";
$lang['settings_pwmatch']="The provided passwords do not match!";
$lang['settings_pwchange1']="Changed password from";
$lang['settings_pwchange2']="to";
$lang['settings_pwchange3']="";
$lang['settings_edited']="Edited";

$lang['settings_misc_newgroupcreated']		= "New group created";
$lang['settings_misc_typepw']				= "Type in a password";
$lang['settings_misc_typeuser']				= "Type in a user name";
$lang['settings_misc_typeemail']			= "Please type in a correct e-mail address";
$lang['settings_misc_groupdeleted']			= "Group deleted! User that were in this group must be redefined!";
$lang['settings_misc_userdeleted']			= "User deleted";
$lang['settings_misc_groupedited']			= "Group edited";
$lang['settings_misc_usermanagement']		= "User management";
$lang['settings_misc_owndata']				= "Own data";
$lang['settings_misc_nogroups']				= "No groups available";
$lang['settings_misc_newuserhead']			= "New user";
$lang['settings_misc_password']				= "Password";
$lang['settings_misc_passwordrepeat']		= "Repeat the Password";
$lang['settings_misc_nogroups']				= "No groups available";
$lang['settings_misc_newuser']				= "Create new user";
$lang['settings_misc_editused']				= "Edit user";
$lang['settings_misc_undefined']			= "Undefined";
$lang['settings_misc_admin']				= "Admin";
$lang['settings_misc_group']				= "Group";
$lang['settings_misc_nogroups']				= "No groups available";
$lang['settings_misc_createnewuser']		= "Create new user";
$lang['settings_misc_usereditbutton']		= "Edit user";
$lang['settings_misc_groupmanagement']		= "Group management";
$lang['settings_misc_newgroup']				= "Create new group";
$lang['settings_misc_groupname']			= "Group name";
$lang['settings_misc_creategroupbutton']	= "Create group";
$lang['settings_misc_groupedit']			= "Edit group";
$lang['settings_misc_edit']					= "Edit";
$lang['settings_misc_nogroupsbutadmin']		= "No groups available besides 'Admin'.";
$lang['settings_misc_deletegroup']			= "Delete group";

$lang['settings_nl_headline']="Newsletter";
$lang['settings_nl_layout']="Layout";
$lang['settings_nl_width']="Table width";
$lang['settings_nl_tfwidth']="Textfield width";
$lang['settings_nl_bgcolor']="Background color";
$lang['settings_nl_background']="Background image";
$lang['settings_nl_fontcolor']="Font color";
$lang['settings_nl_fontsize']="Font size";
$lang['settings_nl_fonttype']="Font family";
$lang['settings_nl_default']="Default options";
$lang['settings_nl_charset']="Define Charset";
$lang['settings_nl_addresser']="Define Addresser";
$lang['settings_nl_email']="Define eMail";
$lang['settings_nl_subject']="Define Subject";
$lang['settings_nl_sig']="Define Signature";
$lang['settings_nl_default_unsubscribe']="Unsubscribe link text";
$lang['settings_nl_default_subscribe']="Subscribe text";
$lang['settings_nl_default_welcome']="Welcome text";
$lang['settings_nl_default_alternatetext']="Show text if user can't display HTML E-Mails";
$lang['settings_nl_settings']="Settings";
$lang['settings_nl_mailsending']="E-Mail sending";
$lang['settings_nl_interval']="Interval";
$lang['settings_nl_oldway']="Deactivate send method \"live\"";
$lang['settings_nl_sec']="Milliseconds";
$lang['settings_nl_user_intv']="User / Interval";
$lang['settings_nl_general']="In general";
$lang['settings_nl_nlform']="Output-Form";
$lang['settings_nl_nlprofile']="Activate Profile Template";
$lang['settings_nl_nlform_html']="HTML";
$lang['settings_nl_nlform_flash']="Flash";
$lang['settings_nl_useractivation']="User activation";
$lang['settings_nl_instand']="Instand";
$lang['settings_nl_viaemail']="E-Mail";
$lang['settings_nl_mailencoding']="E-Mail encoding";
$lang['settings_nl_text']="Text";
$lang['settings_nl_html']="HTML";
$lang['settings_nl_wysiwyg']="WYSIWYG Editor";
$lang['settings_nl_image_upload']="Image Upload";
$lang['settings_nl_attachment_upload']="Send attachments";
$lang['settings_nl_attach_viewcount']="Activate View-Counts";
$lang['settings_nl_unsubscribeinmail']="Unsubscribe just via<br>link in the E-Mail";
$lang['settings_nl_welcome']="Welcome E-Mail";
$lang['settings_nl_mailtoadmin']="Send E-Mail to admin if<br>user sub- or unsubscribes";
$lang['settings_nl_popup_msgs']="Popup messages<br>in the output";
$lang['settings_nl_usergroup']="User can choose group";
$lang['settings_nl_usergroup_radio']="Forbid multiple selection?";
$lang['settings_nl_userselect']="Type";
$lang['settings_nl_titleinput']="Enter title when user subscribes";
$lang['settings_nl_forenameinput']="Enter forename when<br>user subscribes";
$lang['settings_nl_surnameinput']="Enter surname when<br>user subscribes";
$lang['settings_nl_plugin_activate']="Activate NEWSolved Pro. Plugin";
$lang['settings_nl_language']="Language";
$lang['settings_nl_plugin_prefix']="NEWSolved Prefix";
$lang['settings_nl_mailaddress']="Mail-Address";
$lang['settings_nl_scriptpath']="Path to script";
$lang['settings_nl_sendtype']="Send type";
$lang['settings_nl_sendtype_type']="Type";
$lang['settings_nl_sendtype_type1']="PHP Mail";
$lang['settings_nl_sendtype_type2']="SMTP Relay";
$lang['settings_nl_sendtype_exe']="Fast Extension";
$lang['settings_nl_sendtype_relay']="SMTP Server";
$lang['settings_nl_sendtype_port']="Port";
$lang['settings_nl_sendtype_user']="User name";
$lang['settings_nl_sendtype_pw']="Password";
$lang['settings_nl_ajax']	= "Ajax newsletter form";
$lang['settings_nl_captcha']= "Captcha-code for registration";

$lang['settings_cf_headline']="Contact form";
$lang['settings_cf_layout']="Layout";
$lang['settings_cf_width']="Width";
$lang['settings_cf_height']="Height";
$lang['settings_cf_bgcolor']="Background color";
$lang['settings_cf_background']="Background image";
$lang['settings_cf_fontcolor']="Font color";
$lang['settings_cf_fontcolorerror']="Error font color";
$lang['settings_cf_fontsize']="Font size";
$lang['settings_cf_fonttype']="Font family";
$lang['settings_cf_settings']="Settings";
$lang['settings_cf_sig']="Signature";
$lang['settings_cf_title']="Title";
$lang['settings_cf_showname']="Show name";
$lang['settings_cf_showsurname']="Show surname";
$lang['settings_cf_showcity']="Show city";
$lang['settings_cf_showsubject']="Show subject";
$lang['settings_cf_showtel']="Show telephone number";
//$lang['settings_cf_sendmail']="Send E-Mail when new subscriber";
$lang['settings_cf_sendmail']="Send E-Mail when there is a new subscriber";
$lang['settings_cf_captcha']="Activate Captcha Code";

$lang['settings_ot_headline']="Miscellaneous";
$lang['settings_ot_userdata']="User data";
$lang['settings_ot_username']="Username";
$lang['settings_ot_mailaddress']="E-Mail address";
$lang['settings_ot_oldpw']="Old password";
$lang['settings_ot_newpw']="New password";
$lang['settings_ot_rnewpw']="Repeat new<br>password";

$lang['settings_savesettings']="Save";


#####


$lang['settings_nltext_headline']					= "Newsletter text definitions";
$lang['settings_nltext_placeholdertoplacerholder']	= "Placerholder to Placeholder replacement";
$lang['settings_nltext_getsreplacedwith']			= "gets replaced with";
$lang['settings_nltext_placeholdertoexpr']			= "Placeholder to Expression replacement";
$lang['settings_nltext_ifplaceholder']				= "If placeholder";
$lang['settings_nltext_ifmale']						= "Male, replace placeholder with";
$lang['settings_nltext_iffemale']					= "Female, replace placeholder with";
$lang['settings_nltext_and']						= "and";
$lang['settings_nltext_empty']						= "Empty";
$lang['settings_nltext_alttitle']					= "If there's no surname <u>or</u> forename given, change title to";

$lang['settings_nltext_addresser']					= "Addresser";
$lang['settings_nltext_definename']					= "Define name";
$lang['settings_nltext_setasdefault']				= "Set as default";
$lang['settings_nltext_isdefault']					= "default";
$lang['settings_nltext_delete']						= "Delete";
$lang['settings_nltext_alert_address']				= "Address not allowed!";
$lang['settings_nltext_alert_success']				= "Addresser created!";
$lang['settings_nltext_alert_nameemail']			= "Type in a name and email address!";
$lang['settings_nltext_alert_defaultset']			= "Addresser has been set as default!";
$lang['settings_nltext_alert_addresserdelete']		= "Addresser deleted!";

###################################################
#################### Sendform #####################
###################################################

$lang['sendform_markassent']="Mark news as sent";
$lang['sendform_markasnotsent']="Mark news as not sent";
$lang['sendform_checkaddresser']="Check addresser";
$lang['sendform_checksubject']="Check subject";
$lang['sendform_nonewsfound']="No news found";
$lang['sendform_norecipient']="No recipients";
$lang['sendform_sendnewsletter']="Newsletter sent";
$lang['sendform_group']="Group";

$lang['sendform_addresser']="Addresser";
$lang['sendform_subject']="Subject";
$lang['sendform_message']="Message";
$lang['sendform_resizer_smaller']="Shrink Textfield";
$lang['sendform_resizer_bigger']="Expand Textfield";

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
$lang['sendform_insertimg']="Insert image";
$lang['sendform_insertlink']="Insert link";
$lang['sendform_insertemaillink']="Insert E-Mail link";
$lang['sendform_center']="Center";
$lang['sendform_right']="Align right";
$lang['sendform_list']="List";
$lang['sendform_table']="Table";
$lang['sendform_tableimg']="Table / Image";
$lang['sendform_missingemail']="Define a default email address in the newsletter text definition settings";
$lang['sendform_button_sendnewsletter']="Send newsletter";
$lang['sendform_button_sendnewsletter_q']	= "Click OK to send the newsletter";
$lang['sendform_button_simulate']="Simulate";
$lang['sendform_simulate_msg']="This will simulate a real sending procedure!";
$lang['sendform_button_testmail']="Test E-Mail";
$lang['sendform_testmail_msg']="This will send a test E-Mail to your address!";
$lang['sendform_button_saveemail']="Save eMail as template under the name of";
$lang['sendform_button_saveemail_button']="Save";
$lang['sendform_button_saveemail_error']="Please type in a template name";
$lang['sendform_button_saveemail_success']="Template successfully added";
$lang['sendform_button_saveemail_overwrite']="Present template successfully overwritten";
$lang['sendform_button_preview']="Preview";
$lang['sendform_check2addresser']="Check addresser";
$lang['sendform_check2subject']="Check subject";
$lang['sendform_check2msg']="Check message";
$lang['sendform_newsletterinfo']="Newsletter info";
$lang['sendform_lastnlettersend']="Last Newsletter sent";
$lang['sendform_days']="days ago.";
$lang['sendform_hours']="hours ago.";
$lang['sendform_minutes']="minutes ago.";
$lang['sendform_nosent_sofar']="No newsletter sent so far";
$lang['sendform_sendingat']="Sending procedure from";
$lang['sendform_failed']="failed";
$lang['sendform_resumeclick']="Click here to resume";
$lang['sendform_resume']="Resume";
$lang['sendform_whilesending']="Do not pay attention to this message, while the sending procedure is running.";
$lang['sendform_newsletterarchive']="Newsletter archive";
$lang['sendform_lastnewsletter']="Latest 10";
$lang['sendform_templates']="Saved Templates";
$lang['sendform_templates_deleted']="Template deleted";
$lang['sendform_prev']="Previous";
$lang['sendform_next']="Next";
$lang['sendform_sure']="Are you sure?";
$lang['sendform_delete']="Delete";
$lang['sendform_nothing']="Nothing so far!";
$lang['sendform_newsolvedpro_plugin']="NEWSolved Professional Plugin";
$lang['sendform_ingeneral']="In general";
$lang['sendform_latest1']="Send the latest";
$lang['sendform_latest2']="news";
$lang['sendform_date1']="Send news from the date";
$lang['sendform_date2']="";


$lang['sendform_button_save']="Save";
$lang['sendform_button_ok']="OK";

$lang['sendform_template']="Templates";
$lang['sendform_template_insert']="Already written text will be overwritten through this action. Are you sure?";
$lang['sendform_template_no']="No Templates found";
$lang['sendform_template_title_img']="Insert Template";
$lang['sendform_template_title_lnk']="View Template";

$lang['sendform_attachment']="Upload Attachment";
$lang['sendform_attachment_upload_ok']="Upload Attachments";
$lang['sendform_attachment_file']="File";
$lang['sendform_attachment_success1']="Successfully uploaded these files:";
$lang['sendform_attachment_success2']="";
//$lang['sendform_attachment_error1']="Error while uploading the fallowing files:";
$lang['sendform_attachment_error1']="Error while uploading the following files:";
$lang['sendform_attachment_head']="Attachments";

$lang['sendform_image']="Upload Pictures";
$lang['sendform_image_upload_ok']="Upload Picture";
$lang['sendform_image_chmodcheck']="CHMOD for folder ./upload must be set to '777'";

$lang['sendform_image_upload_error1']="Your file is bigger than";
$lang['sendform_image_upload_error2']="";
//$lang['sendform_image_upload_error3']="Only the fallowing files are allowed";
$lang['sendform_image_upload_error3']="Only the following files are allowed";
//$lang['sendform_image_upload_error4_1']="A dir must have been created";
$lang['sendform_image_upload_error4_1']="A dir must be created";
$lang['sendform_image_upload_error4_2']="This can be done in the Upload Settings";
$lang['sendform_image_upload_exists']="The file already exists";
$lang['sendform_image_upload_error5']="Should the file be overwritten";
$lang['sendform_image_upload_error5_1']="Yes";
$lang['sendform_image_upload_error5_2']="No";
$lang['sendform_image_upload_upbutton']="Upload File";
$lang['sendform_image_upload_filename']="File name";
$lang['sendform_image_upload_filesize']="File size";

$lang['sendform_sm']="Save as Template";


###################################################
##################### Sendin ######################
###################################################

$lang['sendin_contact']="Sent in E-Mails";
$lang['sendin_back']="Back";
$lang['sendin_date']="Date";
$lang['sendin_title']="Title";
$lang['sendin_name']="Name";
$lang['sendin_surename']="Surname";
$lang['sendin_city']="City";
$lang['sendin_telephone']="Telephone";
$lang['sendin_date']="Date";
$lang['sendin_email']="E-Mail";
$lang['sendin_emailtosend']="Recipient E-Mail";
$lang['sendin_subject']="Subject";
$lang['sendin_message']="Message";
$lang['sendin_forward']="Forward E-Mail";
$lang['sendin_button_send']="Send";
$lang['sendin_button_forward']="Forward";
$lang['sendin_nosubject']="no subject";
$lang['sendin_sure']="Are you sure?";
$lang['sendin_originalmsg']="Original Message";
$lang['sendin_forwarderror']="Type in a recipient e-mail";
$lang['sendin_forwardsuccess']="Successfully sent!";


###################################################
#################### Sendmail #####################
###################################################

$lang['sendmails_sentwithnletter']="This Newsletter has been sent with the free NLetter PHP Script. The authors can not proof the content of the sent newsletter. Only the sender of this newsletter is responsible for the content";
$lang['sendmails_sendmsg1']="Newsletter has been sent to";
$lang['sendmails_sendmsg2']="recipients so far";
$lang['sendmails_sendmsg3']="Still";
$lang['sendmails_sendmsg4']="are remaining";
$lang['sendmails_sendmsg5']="Please wait";
$lang['sendmails_sendmsg6']="seconds...";
$lang['sendmails_sendmsg7']="Step";
$lang['sendmails_success1']="Newsletter successfully sent to";
$lang['sendmails_success2']="recipients";
$lang['sendmails_finished']="Finished";
$lang['sendmails_simfinished']="Simulation finished";
$lang['sendmails_error']="Newsletter couln't be sent because there are no subscribers so far";
$lang['sendmails_own1']="Newsletter successfully sent to your own E-Mail address";
$lang['sendmails_own2']="";
$lang['sendmails_own_error']="No e-mail address chosen in the settings";



######################################################################################################
######################################################################################################
######################################################################################################



###################################################
//################## Sendin Ouput ###################
################## Sending Ouput ###################
###################################################


$lang['osendin_check_email']="Please enter an E-Mail address!";
$lang['osendin_check_emailcorrect']="Please verify that your e-mail address is correct!";
$lang['osendin_check_name']="Please enter a name!";
$lang['osendin_check_captcha']="Please repeat the catpcha code correctly!";
$lang['osendin_check_surname']="Please enter a surname!";
$lang['osendin_check_city']="Please enter a city!";
$lang['osendin_check_subject']="Please enter a subject!";
$lang['osendin_check_msg']="Please enter a message!";
$lang['osendin_check_telephone']="Please enter a telephone number!";
$lang['osendin_success']="Successfully sent!";
$lang['osendin_email_new']="New message";
$lang['osendin_email_name']="Name";
$lang['osendin_email_address']="E-Mail";
$lang['osendin_email_msg']="Message";
$lang['osendin_email_info']="Access this message in the admin center of NLetter.";

$lang['osendin_contactform']="Contact form";
$lang['osendin_title']="Title";
$lang['osendin_title_male']="Mr.";
$lang['osendin_title_female']="Mrs.";
$lang['osendin_name']="Name";
$lang['osendin_surname']="Surname";
$lang['osendin_city']="City";
$lang['osendin_telephone']="Telephone";
$lang['osendin_email']="E-Mail";
$lang['osendin_subject']="Subject";
$lang['osendin_msg']="Message";
$lang['osendin_captcha']="Captcha";
$lang['osendin_button_send']="Send";


###################################################
################ Newsletter Ouput #################
###################################################

$lang['onl_newunsubscribe']="New unsubscriber";
$lang['onl_unsubscribed']="Unsubscribed!";
$lang['onl_emailunlocked']="E-Mail address successfully activated";
$lang['onl_newsubscriber']="New subscriber";
$lang['onl_subscribed_mail']="Newsletter subscribed";
$lang['onl_wrongid']="Wrong ID or the E-Mail is already being unlocked. Check the link again!";
$lang['onl_checkemail']="Please verify the E-Mail address!";
$lang['onl_checkgroup']="Please select at least one group!";
$lang['onl_checkcaptcha']="Wrong captcha code!";
$lang['onl_checkgroup_edit']="Please select at least one group!";
$lang['onl_success']="Successfully subscribed!";
$lang['onl_success_edit']="Successfully edited your profile!";
$lang['onl_newsletterunlock']="Activate Newsletter";
$lang['onl_mailavtivation']="The E-Mail address will be avtivated after clicking the link in the sent E-Mail!";
$lang['onl_error']="Already signed in or forbidden by the admin!";
$lang['onl_error_edit'] = "E-Mail is forbidden!";
$lang['onl_nomail']="E-Mail address not found!";
$lang['onl_formemail']="eMail Address";
$lang['onl_form_title']="Title";
$lang['onl_form_mr']="Mr.";
$lang['onl_form_mrs']="Mrs.";
$lang['onl_form_forename']="Forename";
$lang['onl_form_surname']="Surname";
$lang['onl_group']="Select group";
$lang['onl_subscribe']="Subscribe";
$lang['onl_unsubscrib']="Unsubscribe";
$lang['onl_ok']="Sign up";
$lang['onl_suretounsubscribe']			= "Are you sure to unsubscribe your e-mail address?";
$lang['onl_suretounsubscribe_yes']		= "Yes";



###################################################
############### User Profile Ouput ################
###################################################

$lang['profile_edit_headline']	= "Edit Profile";
$lang['profile_edit']			= "Edit";



###################################################
################### Error Codes ###################
###################################################

$lang['relaymail_fatal1']	= "No connection to the SMTP relay could be established";
$lang['relaymail_fatal2']	= "Unexpected answer from server - is the port number correct?";
//$lang['relaymail_fatal3']	= "The SMTP relay doesn\'t support ESMTP";
$lang['relaymail_fatal3']	= "The SMTP relay doesn't support ESMTP";
$lang['relaymail_fatal4']	= "Username and/or password are wrong";
$lang['relaymail_fatal5']	= "AUTH LOGIN failed, maybe this scheme was deactivated server-side";
$lang['relaymail_fatal6']	= "Username is wrong";
$lang['relaymail_fatal7']	= "Password is wrong";
$lang['relaymail_fatal8']	= "The SMTP relay enforces an authentication scheme that is not supported by NLetter";


###################################################
#################### Mailjobs #####################
###################################################

$lang['dispatchjob_successadded']	= "Mailjob has been successfully added";
//$lang['dispatchjob_successinfo']	= "You can close your browse while eMails are sending.";
$lang['dispatchjob_successinfo']	= "You can close your browser while eMails are being sent.";

$lang['dispatchjob_id']				= "ID";
$lang['dispatchjob_begin']			= "Job-Begin";
$lang['dispatchjob_email']			= "Sent eMails";
$lang['dispatchjob_progress']		= "Progress";
$lang['dispatchjob_elapsedtime']	= "Elapsed time";
//$lang['dispatchjob_remainingtime']	= "Reamaining time";
$lang['dispatchjob_remainingtime']	= "Remaining time";

?>
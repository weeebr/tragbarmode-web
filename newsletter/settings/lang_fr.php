<?php
##########################################################################
##########################  Script � by       ############################
##########################  www.usolved.net   ############################
##########################################################################


###################################################
#################### Tooltips #####################
###################################################


$lang['tooltip_1']="Entrez votre base de donn�es ici. Ce nom est fourni par votre ISP(Internet Service Provider).<br>Le \"host name\" est la plupart du temps \"localhost\", ainsi, si vous n'�tes pas s�r, utilisez ce nom par d�faut.<br>Pour une utilisation avec SQLite, entrez le nom de fichier de votre base dans le champ Host.";

$lang['tooltip_2']="Si vous d�sirez installer l'application plusieurs fois et afin d'�viter une r��criture compl�te de la base de donn�es, changer le pr�fixe.";

$lang['tooltip_3']="Choisissez un nom d'utilisateur, un mot de passe et entrez votre e-mail.";

$lang['tooltip_4']="Editable dans la console d'administration.";

$lang['tooltip_5']="Corrigez le chemin ici si celui propos� n'est pas correct.";

$lang['tooltip_6']="Ceci est la mani�re de param�trer l'URL en tant que Cronjob:<br>
http://user:passwort@".$file_root."/newsletter_cron.php<br><br>
Utilisez le nom d'utilisateur et le mot de passe de l'application.";

$lang['tooltip_7']="Pour introduire les salutations directement dans le courriel,<br>utilisez la cha�ne de substitution {FORENAME}";

$lang['tooltip_8']="Utilis� pour le lien dans le courriel d'activation";

$lang['tooltip_9']="Le courriel sera envoy� � l'adresse �lectronique parametr� sous \"Newsletter Settings\"";

$lang['tooltip_10']="Entrez le pr�fixe de votre base de donn�es NEWSolved Professional";

$lang['tooltip_11']="Ce courriel est une adresse test pour l'envoi, repsectivement la r�ception, la souscription et les formulaires de notification.";

$lang['tooltip_12']="Entrez une adresse de type<b>mail.votredomaine.net</b>, le port est en g�n�ral <b>25</b>";

$lang['tooltip_13']="
<b>PHP Mail:</b>
<br>Les courriels seront envoy�s avec l'application interne PHP Mailer.";
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

$lang['tooltip_14']="Interval d'envoi pour une application tournant sous Linux ou Windows avec PHP Version 5.0.<br> Cet valeur permet la d�charge CPU.";

$lang['tooltip_15']="Vous pouvez importer des mod�les si HTML est activ�. Ceux-ce doivent �tre avec une extension <u>*.html</u> et t�l�charg� dans <u>html_templates</u>.";

$lang['tooltip_16']="Si \"Flash-Form\" a �t� activ�, placez ce param�tre sur \"non\".";

$lang['tooltip_17']="Aucun choix de groupe actif si vous avez choisi <b>Flash</b> comme formulaire.";

$lang['tooltip_18']="Ceci active la m�thode d'envoi � partir de la version 1.7 pour les serveurs et navigateurs ne pouvant g�rer la m�thode actuelle.<br>Le navigateur doit rest� ouvert tant que tous les courriels n'ont pas �t� envoy�s.";

$lang['tooltip_18_1'] = "Notice: Function \"live\" can be used!"; //Still english

$lang['tooltip_19']="Ceci est disponible seulement si les courriels HTML ont �t� activ�s.";

$lang['tooltip_20']="Seulement visible si vous avez activez l'encodage HTML.";

$lang['tooltip_21']="Vous devez activer le \"profil des mod�les\"<br>si vous d�sirez utiliser la cha�ne de substitution PROFILE_LINK} dans vos courriels.<br><br>
Note:<br>Attention: les profils ne sont pas prot�g�s. Chacun peut donc utiliser l'identification utilisateur pour visualiser le profil!";

$lang['tooltip_22']="Pour placer le nom de l'abonn� automatiquement dans le courriel<br>utilisez la cha�ne de substitution {SURNAME}";

$lang['tooltip_23']="Pour placer le titre de l'abonn� automatiquement dans le courriel<br>utilisez la cha�ne de substitution {TITLE}";

$lang['tooltip_24']="Si vous s�lectionnez \"oui\", Les boutons radios sur le formulaire de la lettre d'information seront cach�s.<br>Placez le texte de substitution {UNSUBSCRIBE_LINK} dans vos courriels pour permettre aux utilisateurs de se d�sabonner.";

$lang['tooltip_25']="Envoyer des fichiers joints peut surcharger s�rieusement le serveur et provoquer des erreurs de fonctionnement machine.";

$lang['tooltip_26']="If you have activated HTML e-mails and the new send method, a 1x1 pixel image will be inserted into e-mails which counts the views of the newsletter.<br><br>Please inform your subscribers that the newsletter sends informations to your server while opening the newsletter. Otherwise disable this option.";		//still english

$lang['tooltip_27']="The Ajax-Form uses JavaScript to perform user inputs. There's no need for a page refresh after the submit.";	//still english

###################################################
################## Installation ###################
###################################################


$lang['inst_s2_headline']="Base de donn�es - Configuration: �tape 2";
$lang['inst_s2_error']="Erreur";
$lang['inst_s2_host']="Host";
$lang['inst_s2_dbtype']="Type de base de donn�es";
$lang['inst_s2_dbname']="Nom de la base de donn�es";
$lang['inst_s2_user']="Nom d'utilisateur";
$lang['inst_s2_password']="Mot de passe";
$lang['inst_s2_prefix']="Pr�fixe de la base de donn�es";
$lang['inst_s2_back']="Pr�c�dent";
$lang['inst_s2_cont']="Suivant";

$lang['inst_s3_headline']="Base de donn�es - Configuration: �tape 3";
$lang['inst_s3_error']="Erreur";
$lang['inst_s3_user']="Nom d'utilsateur";
$lang['inst_s3_email']="Courriel";
$lang['inst_s3_password']="Mot de passe";
$lang['inst_s3_rpassword']="V�rification mot de passe";
$lang['inst_s3_scriptpath']="Chemin d'acc�s au script";
$lang['inst_s3_usecockies']="Utiliser les Cookies";
$lang['inst_s3_usesessions']="Utiliser les Sessions";
$lang['inst_s3_permanentlogin']="Login permanant";
$lang['inst_s3_limitedtime']="Temps limit�";
$lang['inst_s3_back']="Pr�c�dent";
$lang['inst_s3_install']="Installer";

$lang['inst_s4_headline']="Base de donn�es - Configuration: �tape 4";
$lang['inst_s4_success']="L'installation de NLetter s'est termin�e avec succ�s";
$lang['inst_s4_output1']="Pour acc�der NLetter utilisateur, cliquez le lien ci-dessous";
$lang['inst_s4_output2']="NLetter";
$lang['inst_s4_admin1']="Pour acc�der � la console d'administration, cliquez ici";
$lang['inst_s4_admin2']="Console d'administration";

$lang['inst_error_headline']="Erreur";
$lang['inst_error_host']="Veuillez entrer le nom du \"Host\" (hostname)";
$lang['inst_error_dbname']="Veuillez entrer le nom de la base de donn�es";
$lang['inst_error_dbuser']="Veuillez entrer le nom d'utilisateur pour la base de donn�es";
$lang['inst_error_dbpw']="Veuillez entrer le mot de passe pour la base de donn�es";
$lang['inst_error_dbno']="Base de donn�es inatteignable";
$lang['inst_error_dbset']="Veuillez contr�ler les param�tres de la base de donn�es";
$lang['inst_error_user']="Veuillez contr�ler le nom d'utilisateur";
$lang['inst_error_pw']="Veuillez contr�ler le mot de passe";
$lang['inst_error_pwr']="Veuillez r�p�ter votre mot de passe";
$lang['inst_error_pwsame']="Les mots de passes entr�s ne correspondent pas";
$lang['inst_error_mail']="Veuillez entrer une adresse de courrier �lectronique";
$lang['inst_error_mailcheck']="Veuillez v�rifier l'exactitude de votre adresse de courrier �lectronique";
$lang['inst_error_prefix1']="Attention: Theres already an installation with this prefix!";			//still english
$lang['inst_error_prefix2']="When you continue, the existing installation will be overwritten.";	//still english


###################################################
###################### Login ######################
###################################################


$lang['login_user']="Nom d'utilisateur";
$lang['login_pw']="Mot de passe";
$lang['login_login']="Login";
$lang['login_forgotpw']="Mot de passe oubli�?";
$lang['login_error1']="Mauvais login";
$lang['login_error2']="Retour";

$lang['login_back']="Retour";
$lang['login_username']="Nom d'utilisateur";
$lang['login_email']="Courriel";
$lang['login_requestpw']="Mot de passe requis";

$lang['login_check_user']="Veuillez contr�ler le nom d'utilisateur";
$lang['login_check_email1']="Veuillez contr�ler votre adresse courriel";
$lang['login_check_email2']="Veuillez v�rifier l'exactitude de votre adresse de courrier �lectronique";
$lang['login_subject']="Nouveau mot de passe";
$lang['login_mail1']="Bonjour";
$lang['login_mail2']="Vous avez demand� un nouveau mot de passe. Vos nouvelles donn�es de connexion sont:";
$lang['login_mail3']="Nom d'utilisateur";
$lang['login_mail4']="Mot de passe";
$lang['login_mailsent1']="Courrier envoy� �";
$lang['login_mailsent2']="";
$lang['login_wrongdata']="Donn�es incorrectes";



###################################################
###################### Admin ######################
###################################################


$lang['admin_lang_button']="OK";
$lang['admin_logout']="D�connexion";
$lang['admin_deinstall']="D�sinstaller";
$lang['admin_deinstall_info']="En �xecutant cette action, le syst�me de Newsletter sera inutilisable et la base de donn�es compl�te sera effac�e. Etes-vous certain de vouloir effacer NLetter?";
$lang['admin_to_cookies']="Changer le type de connexion en \"Cookies\"";
$lang['admin_to_sessions']="Changer le type de connexion en \"Sessions\"";
$lang['admin_to_change']="";
$lang['admin_output_newsletter']="Formulaire d'abonnement � la Newsletter...";
$lang['admin_output_contactform']="Formulaire de contact...";

$lang['admin_group_email']="Courriel";
$lang['admin_group_unlock']="D�v�rouiller un utilisateur manuellement";
$lang['admin_group_unlock_button']="D�v�rouiller";
$lang['admin_group_unlock_success']="L'utilisateur a �t� d�v�rouill�";
$lang['admin_group_forename']="Pr�nom";
$lang['admin_group_surname']="Nom";
$lang['admin_group_groupname']="Nom de groupe";
$lang['admin_group_rel']="Connexe";
$lang['admin_group_none']="Aucun groupe disponible";
$lang['admin_group_edit']="Editer";

$lang['admin_bl_blocked']="V�rouiller des courriels";
$lang['admin_bl_sure']="Etes-vous s�r?";
$lang['admin_bl_del']="Effacer";
$lang['admin_bl_alldel']="Effacer tous les courriels";
$lang['admin_bl_sofar']="Actuellement vide";

$lang['admin_archive_addr']="Exp�diteur";
$lang['admin_archive_subject']="Sujet";
$lang['admin_archive_date']="Date";
$lang['admin_archive_msg']="Message";
$lang['admin_archive_group']="Groupe";
$lang['admin_archive_views']="Views";			//still english
$lang['admin_archive_t1']="A �t� envoy� �";
$lang['admin_archive_t2']="destinataires du groupe $aus_groupname->groupname";

$lang['admin_menu_headline']="Configuration g�n�rale";
$lang['admin_menu_newsletter']="Newsletter";
$lang['admin_menu_newslettertext']="D�finitions des textes";
$lang['admin_menu_contactform']="Formulaire de contact";
$lang['admin_menu_misc']="Autres";



###################################################
#################### Licence ######################
###################################################


$lang['admin_licence_headline']		= "Licence";			//still english
$lang['admin_licence_domain']		= "Domain";			//still english
$lang['admin_licence_key']			= "Key";				//still english
$lang['admin_licence_submit']		= "Submit licence";			//still english
$lang['admin_licence_updated']		= "Database updated";

###################################################
###################### Start ######################
###################################################


$lang['start_headline']="Statistiques NLetter";
$lang['start_newsletter']="Newsletter";
$lang['start_sentnewsletter']="Newsletters envoy�es";
$lang['start_receivers']="D�stinataires";
$lang['start_contactform']="Formulaire de contact";
$lang['start_allmsg']="Tous les messages";
$lang['start_answered']="Messages r�pondus";
$lang['start_unopen']="Messages non ouverts";



###################################################
##################### Setuser #####################
###################################################

$lang['setuser_headline']="Gestion des abonn�s";
$lang['setuser_lockeduser']="Montrer les abonn�s v�rouill�s";
$lang['setuser_firstletter']="Premi�re lettre";
$lang['setuser_all']="Tous";
$lang['setuser_filter']="Filtre";
$lang['setuser_number']="Nombre";
$lang['setuser_ok']="OK";
$lang['setuser_searchemail']="Rechercher un courriel";
$lang['setuser_searchemailok']="Recherche";
$lang['setuser_searchdate']="Recherche d'apr�s une date";
$lang['setuser_searchdateok']="Recherche";
$lang['setuser_suretodelemails']="Etes-vous s�r de vouloir effacer toutesles adresses courriels? Cette action ne peut �tre annul�e!";
$lang['setuser_hemailadress']="Courriels";
$lang['setuser_hname']="Nom";
$lang['setuser_hgroup']="Groupe";
$lang['setuser_hregdate']="Date d'abonnement";
$lang['setuser_hdelete']="Effacer";
$lang['setuser_noresults']="Pas de r�sultats";
$lang['setuser_edit']="Editer";
$lang['setuser_delete']="Effacer";
$lang['setuser_all']="Tous";
$lang['setuser_suredelselemail']="Ets-vous s�r de vouloir effacer l'adresse courriel s�lectionn�e?";
$lang['setuser_groupmanage']="Gestion des groupes";
$lang['setuser_hidden']="Invisible";
$lang['setuser_default']="D�fault";
$lang['setuser_add']="Ajouter";
$lang['setuser_sure']="Ets-vous s�r?";
$lang['setuser_delgroup']="Effacer";
$lang['setuser_default_entry_group']="Put user in this group by default";	//still english
$lang['setuser_editgroup']="Editer";
$lang['setuser_empty']="Vide";
$lang['setuser_userheadline']="Ajouter un abonn�e manuellement";
$lang['success_new_user']="Nouvel abonn� ajout�";
$lang['notice_new_user']				= "The e-mail address already exists in the database!";	//still english



###################################################
################### Ex- Import ####################
###################################################

$lang['exim_error']						= "L'export est impossible. Veuillez parametrer le sous-r�pertoire \"Settings\" en CHMOD 777.";
$lang['exim_addradded']					= "Courriels ajout�s � la liste";
$lang['exim_filerror']					= "Erreur fichier";
$lang['exim_up_bladded']				= "Courriels ajout�s � la \"Blacklist\"";
$lang['exim_up_bladded_single']			= "Courriel ajout� � la \"Blacklist\"";
$lang['exim_up_bladded_single_error']	= "Address already exists";						//still english
$lang['exim_up_removed']				= "Courriel retir� de la base de donn�es";
$lang['exim_headline']					= "Export/Import pour NLetter";
$lang['exim_addsqlemails']				= "Ajouter des adresses de courrier �lectronique � la base de donn�es � partir d'un fichier SQL";
$lang['exim_exportsqlemails']			= "Exporter des adresses de courriers �letronique dans un fichier SQL";
$lang['exim_export_allemails']			= "Exporter tous les courriels, avec groupes et d�finitions de groupes";
$lang['exim_export_agroup']				= "Exporter seulement les courriels de ce groupe";
$lang['exim_exportsqlemails_truncate']	= "Avec la commande 'Vider la table'";
$lang['exim_eximforeign']				= "Export/Import � partir d'un fichier externe (exemple: type txt, d�limit� par ;)";
$lang['exim_addemailsfromtext']			= "Ajouter des courriels � la base de donn�es � partir d'une fichier texte";
$lang['exim_exportmailsintext']			= "Exporter des courriels dans un fichier texte";
$lang['exim_attention']					= "Attention: ne pourra pas �tre utiliser avec NLetter";
$lang['exim_blacklist']					= "Blacklist";
$lang['exim_showlist']					= "Montrer la liste";
$lang['exim_addtobl']					= "Ajouter des courriels � la \"Blacklist\" � partir d'un fichier texte";
$lang['exim_addsinglemailtobl']			= "Ajouter des courriels manuellement � la \"Blacklist\"";
$lang['exim_removeadress']				= "Effacer des courriels de la base de donn�es";
$lang['exim_adressesfromtext']			= "Courriels � partir d'un fichier texte";
$lang['exim_delete']					= "Effacer";
$lang['exim_add']						= "Ajouter";
$lang['exim_group']						= "Groupe";
$lang['exim_startexport']				= "D�marrer l'export Courriel/Groupe";
$lang['exim_startexport_emails']		= "D�marrer l'export des courriels";
$lang['exim_nogroups']					= "Pas de groupe disponible";
$lang['exim_allowdouble']				= "allow duplicate addresses to be inserted into the database";	//still english



###################################################
#################### Settings #####################
###################################################


$lang['settings_no']="Non";
$lang['settings_yes']="Oui";

$lang['settings_oldpw_notcorrect']="L'ancien mot de passe n'est pas correct!";
$lang['settings_notfilledout']="Veuillez renseigner tous les champs!";
$lang['settings_pwmatch']="Les mots de passe fournis ne correspondent pas!";
$lang['settings_pwchange1']="Changer le mot de passe de";
$lang['settings_pwchange2']="�";
$lang['settings_pwchange3']="";
$lang['settings_edited']="Editer";

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

$lang['settings_nl_headline']="Newsletter";
$lang['settings_nl_layout']="Disposition";
$lang['settings_nl_width']="Largeur de la table";
$lang['settings_nl_tfwidth']="Largeur du champ texte";
$lang['settings_nl_bgcolor']="Couleur de fond";
$lang['settings_nl_background']="Image de fond";
$lang['settings_nl_fontcolor']="Couleur des caract�res";
$lang['settings_nl_fontsize']="Taille des caract�res";
$lang['settings_nl_fonttype']="Famille de caract�res";
$lang['settings_nl_default']="Options par d�faut";
$lang['settings_nl_charset']="D�finir le \"Charset\"";
$lang['settings_nl_addresser']="D�finir l'exp�diteur";
$lang['settings_nl_email']="D�finir le courriel de l'exp�diteur";
$lang['settings_nl_subject']="D�finir le sujet";
$lang['settings_nl_sig']="D�finir la signature";
$lang['settings_nl_default_unsubscribe']="Texte pour le lien de d�sinscription";
$lang['settings_nl_default_subscribe']="Texte de souscription";
$lang['settings_nl_default_welcome']="Texte de bienvenue";
$lang['settings_nl_default_alternatetext']="Show text if user can't display HTML E-Mails";	//still english
$lang['settings_nl_settings']="Param�tres";
$lang['settings_nl_mailsending']="Envoyer les courriels";
$lang['settings_nl_interval']="Interval";
$lang['settings_nl_oldway']="Deactivate send method \"live\"";	//still english
$lang['settings_nl_sec']="Millisecondes";
$lang['settings_nl_user_intv']="Utilisateur / Interval";
$lang['settings_nl_general']="En g�n�ral";
$lang['settings_nl_nlform']="Formulaire de d�sinscription";
$lang['settings_nl_nlprofile']="Activer le profil des mod�les";
$lang['settings_nl_nlform_html']="HTML";
$lang['settings_nl_nlform_flash']="Flash";
$lang['settings_nl_useractivation']="Activation utilisateur";
$lang['settings_nl_instand']="Instance";
$lang['settings_nl_viaemail']="Courriel";
$lang['settings_nl_mailencoding']="Encodage du courriel";
$lang['settings_nl_text']="Texte";
$lang['settings_nl_html']="HTML";
$lang['settings_nl_wysiwyg']="Editeur WYSIWYG";
$lang['settings_nl_image_upload']="T�l�charger une image";
$lang['settings_nl_attachment_upload']="Envoyer une pi�ce jointe";
$lang['settings_nl_attach_viewcount']="Activate View-Counts";					//still english
$lang['settings_nl_unsubscribeinmail']="D�sinscription par un lien<br>dans le courriel";
$lang['settings_nl_welcome']="Courriel de bienvenue";
$lang['settings_nl_mailtoadmin']="Envoyer un courriel � l'administrateur si<br>un utilisateur s'abonne ou se d�sabonne";
$lang['settings_nl_popup_msgs']="Popup des messages<br>en sortie";
$lang['settings_nl_usergroup']="L'utilisateur peut choisir le/les groupe";
$lang['settings_nl_usergroup_radio']="Interdire la s�lection multiple?";
$lang['settings_nl_userselect']="Type";				//still english
$lang['settings_nl_titleinput']="Lorsque l'utilisateur s'abonne<br>entrer le titre";
$lang['settings_nl_forenameinput']="Lorsque l'utilisateur s'abonne<br>entrer le pr�nom";
$lang['settings_nl_surnameinput']="Lorsque l'utilisateur s'abonne<br>entrer le nom";
$lang['settings_nl_plugin_activate']="Activ�<br>NEWSolved Pro. Plugin";
$lang['settings_nl_language']="Langue";
$lang['settings_nl_plugin_prefix']="NEWSolved pr�fixe";
$lang['settings_nl_mailaddress']="Courriel";
$lang['settings_nl_scriptpath']="Chemin d'acc�s au script";
$lang['settings_nl_sendtype']="Type d'envoi";
$lang['settings_nl_sendtype_type']="Type";
$lang['settings_nl_sendtype_type1']="PHP Mail";
$lang['settings_nl_sendtype_type2']="Relais SMTP";
$lang['settings_nl_sendtype_exe']="Extension rapide";
$lang['settings_nl_sendtype_relay']="Serveur SMTP";
$lang['settings_nl_sendtype_port']="Port";
$lang['settings_nl_sendtype_user']="Nom d'utilisateur";
$lang['settings_nl_sendtype_pw']="Mot de passe";
$lang['settings_nl_ajax']	= "Ajax newsletter form";					//still english
$lang['settings_nl_captcha']= "Captcha-code for registration";			//still english

$lang['settings_cf_headline']="Formulaire de contact";
$lang['settings_cf_layout']="Disposition";
$lang['settings_cf_width']="Largeur";
$lang['settings_cf_height']="Hauteur";
$lang['settings_cf_bgcolor']="Couleur de fond";
$lang['settings_cf_background']="Image de fond";
$lang['settings_cf_fontcolor']="Couleur des caract�res";
$lang['settings_cf_fontcolorerror']="Erreur sur la couleur des caract�res";
$lang['settings_cf_fontsize']="Dimension des caract�res";
$lang['settings_cf_fonttype']="Famille de caract�res";
$lang['settings_cf_settings']="Param�tres";
$lang['settings_cf_sig']="Signature";
$lang['settings_cf_title']="Titre";
$lang['settings_cf_showname']="Montrer \"Pr�nom\"";
$lang['settings_cf_showsurname']="Montrer \"Nom\"";
$lang['settings_cf_showcity']="Montrer \"Ville\"";
$lang['settings_cf_showsubject']="Montrer \"Sujet\"";
$lang['settings_cf_showtel']="Montrer \"Num�ro de t�l�phone\"";
$lang['settings_cf_sendmail']="Envoyer un courriel lors d'un nouvel abonnement";
$lang['settings_cf_captcha']="Activate Captcha Code";	//still english

$lang['settings_ot_headline']="Divers";
$lang['settings_ot_userdata']="Donn�es utilisateur";
$lang['settings_ot_username']="Nom d'utilisateur";
$lang['settings_ot_mailaddress']="Adresse courriel";
$lang['settings_ot_oldpw']="Ancien mot de passe";
$lang['settings_ot_newpw']="Nouveau mot de passe";
$lang['settings_ot_rnewpw']="R�p�ter le nouveau<br>mot de passe";

$lang['settings_savesettings']="Sauvegarder les param�tres";


#####


$lang['settings_nltext_headline']					= "D�finitions des textes de la Newsletter";
$lang['settings_nltext_placeholdertoplacerholder']	= "Remplecement des textes de substitution";
$lang['settings_nltext_getsreplacedwith']			= "� remplacer par";
$lang['settings_nltext_placeholdertoexpr']			= "Remplacement des textes de substitution par des expressions";
$lang['settings_nltext_ifplaceholder']				= "Si le texte de substitution";
$lang['settings_nltext_ifmale']						= "Male [Masculin] , remplacer par";
$lang['settings_nltext_iffemale']					= "Female [F�minin], remplacer par";
$lang['settings_nltext_and']						= "et";
$lang['settings_nltext_empty']						= "Vide";
$lang['settings_nltext_alttitle']					= "If there's no surname <u>or</u> forename given, change title to";	//still english

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

$lang['sendform_markassent']="Marquer la newsletter comme \"envoy�e\"";
$lang['sendform_markasnotsent']="Marquer la newsletter comme \"non envoy�e\"";
$lang['sendform_checkaddresser']="V�rifier l'exp�diteur";
$lang['sendform_checksubject']="V�rifier le sujet";
$lang['sendform_nonewsfound']="Pas de newsletter trouv�es";
$lang['sendform_norecipient']="Pas de destinataires";
$lang['sendform_sendnewsletter']="Newsletter envoy�e";
$lang['sendform_group']="Groupe";

$lang['sendform_addresser']="Exp�diteur";
$lang['sendform_subject']="Sujet";
$lang['sendform_message']="Message";
$lang['sendform_resizer_smaller']="Compresser les champs texte";
$lang['sendform_resizer_bigger']="Augmenter les champs texte";

$lang['sendform_emailencoding']="Encodage du courrier";
$lang['settings_sendmethod']="Send-Type";
$lang['settings_sendphp']="PHP Mail";
$lang['settings_sendsmtp']="Relais SMTP";
$lang['sendform_break']="Interrompre";
$lang['sendform_bold']="Gras";
$lang['sendform_italic']="Italique";
$lang['sendform_underline']="Soulign�";
$lang['sendform_cross']="Crois�";
$lang['sendform_textcolor']="couleur des caract�res";
$lang['sendform_textsize']="Taille des caract�res";
$lang['sendform_textfamily']="Famille de la police";
$lang['sendform_insertimg']="Inserer une image";
$lang['sendform_insertlink']="Inserer un lien";
$lang['sendform_insertemaillink']="Inserer un lien courriel";
$lang['sendform_center']="Centrer";
$lang['sendform_right']="Aligner � droite";
$lang['sendform_list']="Liste";
$lang['sendform_table']="Table";
$lang['sendform_tableimg']="Table / Image";
$lang['sendform_missingemail']="D�finissez une adresse de courrier �lectronique par d�faut dans les param�tres de \"d�finitions des textes\" de la newsletter";
$lang['sendform_button_sendnewsletter']="Envoyer la newsletter";
$lang['sendform_button_sendnewsletter_q']	= "Click OK to send the newsletter";	//still english
$lang['sendform_button_simulate']="Simuler l'envoi";
$lang['sendform_simulate_msg']="Simule une proc�dure r�el d'envoi!";
$lang['sendform_button_testmail']="Envoi test";
$lang['sendform_testmail_msg']="Envoie un courriel test � votre adresse!";
$lang['sendform_button_saveemail']="Sauvegarde de la newsletter comme mod�le sous le nom";
$lang['sendform_button_saveemail_button']="Sauver";
$lang['sendform_button_saveemail_error']="Veuillez entrer un nom de mod�le";
$lang['sendform_button_saveemail_success']="Mod�le ajout�";
$lang['sendform_button_saveemail_overwrite']="Mod�le actuel �cras� par le nouveau";
$lang['sendform_button_preview']="Pr�visualiser";
$lang['sendform_check2addresser']="V�rifier l'exp�diteur";
$lang['sendform_check2subject']="V�rifier le sujet";
$lang['sendform_check2msg']="V�rifier le message";
$lang['sendform_newsletterinfo']="Newsletter info";
$lang['sendform_lastnlettersend']="Derni�re newsletter envoy�e";
$lang['sendform_days']="jours auparavant.";
$lang['sendform_hours']="heures aupravant.";
$lang['sendform_minutes']="minutes auparavant.";
$lang['sendform_nosent_sofar']="Encore aucun newsletter envoy�e";
$lang['sendform_sendingat']="Procedure d'envoi de";
$lang['sendform_failed']="�chec";
$lang['sendform_resumeclick']="Cliquez ici pour continuer";
$lang['sendform_resume']="Continuer";
$lang['sendform_whilesending']="Ne pr�t� pas attention � ce message pendant que la proc�dure d'envoi est en cours d'ex�cution.";
$lang['sendform_newsletterarchive']="Archive des newsletters";
$lang['sendform_lastnewsletter']="10 derni�res";
$lang['sendform_templates']="Mod�les sauvegard�s";
$lang['sendform_templates_deleted']="Mod�les effac�s";
$lang['sendform_prev']="Pr�c�dent";
$lang['sendform_next']="Suivant";
$lang['sendform_sure']="Etes-vous s�r?";
$lang['sendform_delete']="Effacer";
$lang['sendform_nothing']="Actuellement vide!";
$lang['sendform_newsolvedpro_plugin']="NEWSolved Professional Plugin";
$lang['sendform_ingeneral']="En g�n�ral";
$lang['sendform_latest1']="Envoyer la plus r�cente";
$lang['sendform_latest2']="news";
$lang['sendform_date1']="Envoyer la newsletter cr��e le";
$lang['sendform_date2']="";


$lang['sendform_button_save']="Sauver";
$lang['sendform_button_ok']="OK";

$lang['sendform_template']="Mod�les";
$lang['sendform_template_insert']="Par cette action, les textes seront �cras�s. Etes-vous s�r?";
$lang['sendform_template_no']="Aucun mod�le trouv�";
$lang['sendform_template_title_img']="Inserer un mod�le";
$lang['sendform_template_title_lnk']="Visualiser les mod�les";

$lang['sendform_attachment']="T�l�charger une pi�ce jointe";
$lang['sendform_attachment_upload_ok']="UT�l�charger des pi�ces jointes";
$lang['sendform_attachment_file']="Fichier";
$lang['sendform_attachment_success1']="Les fichiers suivants ont �t� t�l�charg�s avec succ�s:";
$lang['sendform_attachment_success2']="";
$lang['sendform_attachment_error1']="Erreur lors du t�l�chargement des fichiers suivants:";
$lang['sendform_attachment_head']="Pi�ces jointes";

$lang['sendform_image']="T�l�charger des images";
$lang['sendform_image_upload_ok']="T�l�charger une image";
$lang['sendform_image_chmodcheck']="CHMOD pour le sous-r�pertoire ./upload doit �tre '777'";

$lang['sendform_image_upload_error1']="Votre fichier est plus grand";
$lang['sendform_image_upload_error2']="";
$lang['sendform_image_upload_error3']="Seuls les formats suivants sont autoris�s";
$lang['sendform_image_upload_error4_1']="Un r�pertoire doit avoir �t� cr��";
$lang['sendform_image_upload_error4_2']="A d�finir dans les param�tres de t�l�chargement";
$lang['sendform_image_upload_exists']="Ce fichier existe d�j�";
$lang['sendform_image_upload_error5']="Le fichier doit-il �tre �cras�?";
$lang['sendform_image_upload_error5_1']="Oui";
$lang['sendform_image_upload_error5_2']="Non";
$lang['sendform_image_upload_upbutton']="T�l�charger le fichier";
$lang['sendform_image_upload_filename']="Nom du fichier";
$lang['sendform_image_upload_filesize']="Taille du fichier";

$lang['sendform_sm']="Sauvegarder comme mod�le";


###################################################
##################### Sendin ######################
###################################################

$lang['sendin_contact']="Envoy� aux contacts";
$lang['sendin_back']="Retour";
$lang['sendin_date']="Date";
$lang['sendin_title']="Titre";
$lang['sendin_name']="Pr�nom";
$lang['sendin_surename']="Nom";
$lang['sendin_city']="Ville";
$lang['sendin_telephone']="T�l�phone";
$lang['sendin_date']="Date";
$lang['sendin_email']="Courriel";
$lang['sendin_emailtosend']="R�cepteur courriel";
$lang['sendin_subject']="Sujet";
$lang['sendin_message']="Message";
$lang['sendin_forward']="Acheminer courriel";
$lang['sendin_button_send']="Envoyer";
$lang['sendin_button_forward']="Acheminer";
$lang['sendin_nosubject']="Pas de sujet";
$lang['sendin_sure']="Etes-vous s�r?";
$lang['sendin_originalmsg']="Original message";
$lang['sendin_forwarderror']="Type in a recipient e-mail";
$lang['sendin_forwardsuccess']="Successfully sent!";



###################################################
#################### Sendmail #####################
###################################################

$lang['sendmails_sentwithnletter']="Cette Newsletter a �t� envoy�e avec NLetter de www.usolved.net. Nous ne sommes pas responsables de son contenu.";
$lang['sendmails_sendmsg1']="La Newsletter a �t� envoy�e �";
$lang['sendmails_sendmsg2']="Destinataires";
$lang['sendmails_sendmsg3']="Encore";
$lang['sendmails_sendmsg4']="sont pendants";
$lang['sendmails_sendmsg5']="Veuillez patienter";
$lang['sendmails_sendmsg6']="secondes...";
$lang['sendmails_sendmsg7']="Etape";
$lang['sendmails_success1']="Newsletter envoy� avec succ�s �";
$lang['sendmails_success2']="destinataires";
$lang['sendmails_finished']="Termin�";
$lang['sendmails_simfinished']="Simulation termin�e";
$lang['sendmails_error']="La Newsletter ne peut �tre envoy�e. Aucune souscription enregistr�e.";
$lang['sendmails_own1']="La Newsletter a �t� envoy�e avec succ�s � votre propre adresse de courriel";
$lang['sendmails_own2']="";
$lang['sendmails_own_error']="Aucun courriel choisi dans les param�tres";



######################################################################################################
######################################################################################################
######################################################################################################



###################################################
################## Sendin Ouput ###################
###################################################


$lang['osendin_check_email']="Veuilez entrer une adresse de courriel!";
$lang['osendin_check_emailcorrect']="Veuillez v�rifier la coh�rence de votre adresse de courriel!";
$lang['osendin_check_name']="Veuillez entrez un nom!";
$lang['osendin_check_captcha']="Please repeat the catpcha code correctly!";	//still english
$lang['osendin_check_surname']="Veuillez entrez un pr�nom!";
$lang['osendin_check_city']="Veuillez entrer la ville!";
$lang['osendin_check_subject']="Veuillez entrer un sujet!";
$lang['osendin_check_msg']="Veuillez entrer un message!";
$lang['osendin_check_telephone']="Veuillez entrer un num�ro de t�l�phone!";
$lang['osendin_success']="Envoi ok!";
$lang['osendin_email_new']="Nouveau message";
$lang['osendin_email_name']="Nom";
$lang['osendin_email_address']="Courriel";
$lang['osendin_email_msg']="Message";
$lang['osendin_email_info']="Acc�der � ce message par la console d'administration de NLetter.";

$lang['osendin_contactform']="Formulaire de contact";
$lang['osendin_title']="Titre";
$lang['osendin_title_male']="Monsieur";
$lang['osendin_title_female']="Madame";
$lang['osendin_name']="Nom";
$lang['osendin_surname']="Pr�nom";
$lang['osendin_city']="Ville";
$lang['osendin_telephone']="T�l�phone";
$lang['osendin_email']="Courriel";
$lang['osendin_subject']="Sujet";
$lang['osendin_msg']="Message";
$lang['osendin_captcha']="Captcha";	//still english
$lang['osendin_button_send']="Envoyer";


###################################################
################ Newsletter Ouput #################
###################################################

$lang['onl_newunsubscribe']="Nouvelle d�sinscription";
$lang['onl_unsubscribed']="D�sinscrit!";
$lang['onl_emailunlocked']="Adresse courriel activ�e";
$lang['onl_newsubscriber']="Nouvelle souscription";
$lang['onl_subscribed_mail']="Abonn� � la Newsletter";
$lang['onl_wrongid']="Mauvaise ID ou le courriel est d�j� d�v�rouill�. V�rifier le lien!";
$lang['onl_checkemail']="Veuillez v�rifier l'adresse de courriel!";
$lang['onl_checkgroup']="Veuillez s�lectionner au moins un groupe!";
$lang['onl_checkcaptcha']="Wrong captcha code!";	//still english
$lang['onl_checkgroup_edit']="Veuillez s�lectionner au moins un groupe!";
$lang['onl_success']="Abonnement actif";
$lang['onl_success_edit']="Votre profil a �t� �dit� avec succ�s!";
$lang['onl_newsletterunlock']="Activer la Newsletter";
$lang['onl_mailavtivation']="L'adresse de courriel sera activ�e apr�s avoir cliqu� sur le lien plac� dans le courrier envoy� � votre adresse �lectronique!";
$lang['onl_error']="D�j� abonn� ou interdit par l'administrateur!";
$lang['onl_error_edit'] = "Courriel interdit!";
$lang['onl_nomail']="Adresse courriel introuvable!";
$lang['onl_formemail']="Courriel";
$lang['onl_form_title']="Titre";
$lang['onl_form_mr']="M.";
$lang['onl_form_mrs']="Mme";
$lang['onl_form_forename']="Pr�nom";
$lang['onl_form_surname']="Nom";
$lang['onl_group']="S�lectionner un groupe";
$lang['onl_subscribe']="S'abonner";
$lang['onl_unsubscrib']="Se d�sabonner";
$lang['onl_ok']="S'inscrire";
$lang['onl_suretounsubscribe']			= "Are you sure to unsubscribe your e-mail address?";	//still english
$lang['onl_suretounsubscribe_yes']		= "Yes";												//still english


###################################################
############### User Profile Ouput ################
###################################################

$lang['profile_edit_headline']	= "Editer le profil";
$lang['profile_edit']			= "Editer";



###################################################
################### Error Codes ###################
###################################################

$lang['relaymail_fatal1']	= "Aucune connexion ne peut �tre �tablie avec le relais SMTP";
$lang['relaymail_fatal2']	= "R�ponse inattendue du serveur - le num�ro de port est-il correct?";
$lang['relaymail_fatal3']	= "Le relais SMTP ne supporte pas l'ESMTP";
$lang['relaymail_fatal4']	= "Nom d'utilisateur ou mot de passe incorrect";
$lang['relaymail_fatal5']	= "Echec AUTH LOGIN, peut-�tre a-t'il �t� d�sactiv� c�t� serveur.";
$lang['relaymail_fatal6']	= "Nom d'utilisateur incorrect";
$lang['relaymail_fatal7']	= "Mot de passe incorrect";
$lang['relaymail_fatal8']	= "Le relais SMTP requiert une authentification qui n'est pas support�e par NLetter";


###################################################
#################### Mailjobs #####################
###################################################

$lang['dispatchjob_successadded']	= "Mailjob ajout�";
$lang['dispatchjob_successinfo']	= "Vous pouvez fermer votre navigateur pendant que l'envoi des newsletters.";

$lang['dispatchjob_id']				= "ID";
$lang['dispatchjob_begin']			= "D�but du Job";
$lang['dispatchjob_email']			= "Courriels envoy�s";
$lang['dispatchjob_progress']		= "Progression";
$lang['dispatchjob_elapsedtime']	= "Temps �coul�";
$lang['dispatchjob_remainingtime']	= "Temps restant";

?>
<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


###################################################
#################### Tooltips #####################
###################################################


$lang['tooltip_1']="Entrez votre base de données ici. Ce nom est fourni par votre ISP(Internet Service Provider).<br>Le \"host name\" est la plupart du temps \"localhost\", ainsi, si vous n'êtes pas sûr, utilisez ce nom par défaut.<br>Pour une utilisation avec SQLite, entrez le nom de fichier de votre base dans le champ Host.";

$lang['tooltip_2']="Si vous désirez installer l'application plusieurs fois et afin d'éviter une réécriture complète de la base de données, changer le préfixe.";

$lang['tooltip_3']="Choisissez un nom d'utilisateur, un mot de passe et entrez votre e-mail.";

$lang['tooltip_4']="Editable dans la console d'administration.";

$lang['tooltip_5']="Corrigez le chemin ici si celui proposé n'est pas correct.";

$lang['tooltip_6']="Ceci est la manière de paramètrer l'URL en tant que Cronjob:<br>
http://user:passwort@".$file_root."/newsletter_cron.php<br><br>
Utilisez le nom d'utilisateur et le mot de passe de l'application.";

$lang['tooltip_7']="Pour introduire les salutations directement dans le courriel,<br>utilisez la chaîne de substitution {FORENAME}";

$lang['tooltip_8']="Utilisé pour le lien dans le courriel d'activation";

$lang['tooltip_9']="Le courriel sera envoyé à l'adresse électronique parametré sous \"Newsletter Settings\"";

$lang['tooltip_10']="Entrez le préfixe de votre base de données NEWSolved Professional";

$lang['tooltip_11']="Ce courriel est une adresse test pour l'envoi, repsectivement la réception, la souscription et les formulaires de notification.";

$lang['tooltip_12']="Entrez une adresse de type<b>mail.votredomaine.net</b>, le port est en général <b>25</b>";

$lang['tooltip_13']="
<b>PHP Mail:</b>
<br>Les courriels seront envoyés avec l'application interne PHP Mailer.";
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

$lang['tooltip_14']="Interval d'envoi pour une application tournant sous Linux ou Windows avec PHP Version 5.0.<br> Cet valeur permet la décharge CPU.";

$lang['tooltip_15']="Vous pouvez importer des modèles si HTML est activé. Ceux-ce doivent être avec une extension <u>*.html</u> et téléchargé dans <u>html_templates</u>.";

$lang['tooltip_16']="Si \"Flash-Form\" a été activé, placez ce paramètre sur \"non\".";

$lang['tooltip_17']="Aucun choix de groupe actif si vous avez choisi <b>Flash</b> comme formulaire.";

$lang['tooltip_18']="Ceci active la méthode d'envoi à partir de la version 1.7 pour les serveurs et navigateurs ne pouvant gérer la méthode actuelle.<br>Le navigateur doit resté ouvert tant que tous les courriels n'ont pas été envoyés.";

$lang['tooltip_18_1'] = "Notice: Function \"live\" can be used!"; //Still english

$lang['tooltip_19']="Ceci est disponible seulement si les courriels HTML ont été activés.";

$lang['tooltip_20']="Seulement visible si vous avez activez l'encodage HTML.";

$lang['tooltip_21']="Vous devez activer le \"profil des modèles\"<br>si vous désirez utiliser la chaîne de substitution PROFILE_LINK} dans vos courriels.<br><br>
Note:<br>Attention: les profils ne sont pas protégés. Chacun peut donc utiliser l'identification utilisateur pour visualiser le profil!";

$lang['tooltip_22']="Pour placer le nom de l'abonné automatiquement dans le courriel<br>utilisez la chaîne de substitution {SURNAME}";

$lang['tooltip_23']="Pour placer le titre de l'abonné automatiquement dans le courriel<br>utilisez la chaîne de substitution {TITLE}";

$lang['tooltip_24']="Si vous sélectionnez \"oui\", Les boutons radios sur le formulaire de la lettre d'information seront cachés.<br>Placez le texte de substitution {UNSUBSCRIBE_LINK} dans vos courriels pour permettre aux utilisateurs de se désabonner.";

$lang['tooltip_25']="Envoyer des fichiers joints peut surcharger sérieusement le serveur et provoquer des erreurs de fonctionnement machine.";

$lang['tooltip_26']="If you have activated HTML e-mails and the new send method, a 1x1 pixel image will be inserted into e-mails which counts the views of the newsletter.<br><br>Please inform your subscribers that the newsletter sends informations to your server while opening the newsletter. Otherwise disable this option.";		//still english

$lang['tooltip_27']="The Ajax-Form uses JavaScript to perform user inputs. There's no need for a page refresh after the submit.";	//still english

###################################################
################## Installation ###################
###################################################


$lang['inst_s2_headline']="Base de données - Configuration: étape 2";
$lang['inst_s2_error']="Erreur";
$lang['inst_s2_host']="Host";
$lang['inst_s2_dbtype']="Type de base de données";
$lang['inst_s2_dbname']="Nom de la base de données";
$lang['inst_s2_user']="Nom d'utilisateur";
$lang['inst_s2_password']="Mot de passe";
$lang['inst_s2_prefix']="Préfixe de la base de données";
$lang['inst_s2_back']="Précédent";
$lang['inst_s2_cont']="Suivant";

$lang['inst_s3_headline']="Base de données - Configuration: étape 3";
$lang['inst_s3_error']="Erreur";
$lang['inst_s3_user']="Nom d'utilsateur";
$lang['inst_s3_email']="Courriel";
$lang['inst_s3_password']="Mot de passe";
$lang['inst_s3_rpassword']="Vérification mot de passe";
$lang['inst_s3_scriptpath']="Chemin d'accès au script";
$lang['inst_s3_usecockies']="Utiliser les Cookies";
$lang['inst_s3_usesessions']="Utiliser les Sessions";
$lang['inst_s3_permanentlogin']="Login permanant";
$lang['inst_s3_limitedtime']="Temps limité";
$lang['inst_s3_back']="Précédent";
$lang['inst_s3_install']="Installer";

$lang['inst_s4_headline']="Base de données - Configuration: étape 4";
$lang['inst_s4_success']="L'installation de NLetter s'est terminée avec succès";
$lang['inst_s4_output1']="Pour accéder NLetter utilisateur, cliquez le lien ci-dessous";
$lang['inst_s4_output2']="NLetter";
$lang['inst_s4_admin1']="Pour accéder à la console d'administration, cliquez ici";
$lang['inst_s4_admin2']="Console d'administration";

$lang['inst_error_headline']="Erreur";
$lang['inst_error_host']="Veuillez entrer le nom du \"Host\" (hostname)";
$lang['inst_error_dbname']="Veuillez entrer le nom de la base de données";
$lang['inst_error_dbuser']="Veuillez entrer le nom d'utilisateur pour la base de données";
$lang['inst_error_dbpw']="Veuillez entrer le mot de passe pour la base de données";
$lang['inst_error_dbno']="Base de données inatteignable";
$lang['inst_error_dbset']="Veuillez contrôler les paramètres de la base de données";
$lang['inst_error_user']="Veuillez contrôler le nom d'utilisateur";
$lang['inst_error_pw']="Veuillez contrôler le mot de passe";
$lang['inst_error_pwr']="Veuillez répéter votre mot de passe";
$lang['inst_error_pwsame']="Les mots de passes entrés ne correspondent pas";
$lang['inst_error_mail']="Veuillez entrer une adresse de courrier électronique";
$lang['inst_error_mailcheck']="Veuillez vérifier l'exactitude de votre adresse de courrier électronique";
$lang['inst_error_prefix1']="Attention: Theres already an installation with this prefix!";			//still english
$lang['inst_error_prefix2']="When you continue, the existing installation will be overwritten.";	//still english


###################################################
###################### Login ######################
###################################################


$lang['login_user']="Nom d'utilisateur";
$lang['login_pw']="Mot de passe";
$lang['login_login']="Login";
$lang['login_forgotpw']="Mot de passe oublié?";
$lang['login_error1']="Mauvais login";
$lang['login_error2']="Retour";

$lang['login_back']="Retour";
$lang['login_username']="Nom d'utilisateur";
$lang['login_email']="Courriel";
$lang['login_requestpw']="Mot de passe requis";

$lang['login_check_user']="Veuillez contrôler le nom d'utilisateur";
$lang['login_check_email1']="Veuillez contrôler votre adresse courriel";
$lang['login_check_email2']="Veuillez vérifier l'exactitude de votre adresse de courrier électronique";
$lang['login_subject']="Nouveau mot de passe";
$lang['login_mail1']="Bonjour";
$lang['login_mail2']="Vous avez demandé un nouveau mot de passe. Vos nouvelles données de connexion sont:";
$lang['login_mail3']="Nom d'utilisateur";
$lang['login_mail4']="Mot de passe";
$lang['login_mailsent1']="Courrier envoyé à";
$lang['login_mailsent2']="";
$lang['login_wrongdata']="Données incorrectes";



###################################################
###################### Admin ######################
###################################################


$lang['admin_lang_button']="OK";
$lang['admin_logout']="Déconnexion";
$lang['admin_deinstall']="Désinstaller";
$lang['admin_deinstall_info']="En éxecutant cette action, le système de Newsletter sera inutilisable et la base de données complète sera effacée. Etes-vous certain de vouloir effacer NLetter?";
$lang['admin_to_cookies']="Changer le type de connexion en \"Cookies\"";
$lang['admin_to_sessions']="Changer le type de connexion en \"Sessions\"";
$lang['admin_to_change']="";
$lang['admin_output_newsletter']="Formulaire d'abonnement à la Newsletter...";
$lang['admin_output_contactform']="Formulaire de contact...";

$lang['admin_group_email']="Courriel";
$lang['admin_group_unlock']="Dévérouiller un utilisateur manuellement";
$lang['admin_group_unlock_button']="Dévérouiller";
$lang['admin_group_unlock_success']="L'utilisateur a été dévérouillé";
$lang['admin_group_forename']="Prénom";
$lang['admin_group_surname']="Nom";
$lang['admin_group_groupname']="Nom de groupe";
$lang['admin_group_rel']="Connexe";
$lang['admin_group_none']="Aucun groupe disponible";
$lang['admin_group_edit']="Editer";

$lang['admin_bl_blocked']="Vérouiller des courriels";
$lang['admin_bl_sure']="Etes-vous sûr?";
$lang['admin_bl_del']="Effacer";
$lang['admin_bl_alldel']="Effacer tous les courriels";
$lang['admin_bl_sofar']="Actuellement vide";

$lang['admin_archive_addr']="Expéditeur";
$lang['admin_archive_subject']="Sujet";
$lang['admin_archive_date']="Date";
$lang['admin_archive_msg']="Message";
$lang['admin_archive_group']="Groupe";
$lang['admin_archive_views']="Views";			//still english
$lang['admin_archive_t1']="A été envoyé à";
$lang['admin_archive_t2']="destinataires du groupe $aus_groupname->groupname";

$lang['admin_menu_headline']="Configuration générale";
$lang['admin_menu_newsletter']="Newsletter";
$lang['admin_menu_newslettertext']="Définitions des textes";
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
$lang['start_sentnewsletter']="Newsletters envoyées";
$lang['start_receivers']="Déstinataires";
$lang['start_contactform']="Formulaire de contact";
$lang['start_allmsg']="Tous les messages";
$lang['start_answered']="Messages répondus";
$lang['start_unopen']="Messages non ouverts";



###################################################
##################### Setuser #####################
###################################################

$lang['setuser_headline']="Gestion des abonnés";
$lang['setuser_lockeduser']="Montrer les abonnés vérouillés";
$lang['setuser_firstletter']="Première lettre";
$lang['setuser_all']="Tous";
$lang['setuser_filter']="Filtre";
$lang['setuser_number']="Nombre";
$lang['setuser_ok']="OK";
$lang['setuser_searchemail']="Rechercher un courriel";
$lang['setuser_searchemailok']="Recherche";
$lang['setuser_searchdate']="Recherche d'après une date";
$lang['setuser_searchdateok']="Recherche";
$lang['setuser_suretodelemails']="Etes-vous sûr de vouloir effacer toutesles adresses courriels? Cette action ne peut être annulée!";
$lang['setuser_hemailadress']="Courriels";
$lang['setuser_hname']="Nom";
$lang['setuser_hgroup']="Groupe";
$lang['setuser_hregdate']="Date d'abonnement";
$lang['setuser_hdelete']="Effacer";
$lang['setuser_noresults']="Pas de résultats";
$lang['setuser_edit']="Editer";
$lang['setuser_delete']="Effacer";
$lang['setuser_all']="Tous";
$lang['setuser_suredelselemail']="Ets-vous sûr de vouloir effacer l'adresse courriel sélectionnée?";
$lang['setuser_groupmanage']="Gestion des groupes";
$lang['setuser_hidden']="Invisible";
$lang['setuser_default']="Défault";
$lang['setuser_add']="Ajouter";
$lang['setuser_sure']="Ets-vous sûr?";
$lang['setuser_delgroup']="Effacer";
$lang['setuser_default_entry_group']="Put user in this group by default";	//still english
$lang['setuser_editgroup']="Editer";
$lang['setuser_empty']="Vide";
$lang['setuser_userheadline']="Ajouter un abonnée manuellement";
$lang['success_new_user']="Nouvel abonné ajouté";
$lang['notice_new_user']				= "The e-mail address already exists in the database!";	//still english



###################################################
################### Ex- Import ####################
###################################################

$lang['exim_error']						= "L'export est impossible. Veuillez parametrer le sous-répertoire \"Settings\" en CHMOD 777.";
$lang['exim_addradded']					= "Courriels ajoutés à la liste";
$lang['exim_filerror']					= "Erreur fichier";
$lang['exim_up_bladded']				= "Courriels ajoutés à la \"Blacklist\"";
$lang['exim_up_bladded_single']			= "Courriel ajouté à la \"Blacklist\"";
$lang['exim_up_bladded_single_error']	= "Address already exists";						//still english
$lang['exim_up_removed']				= "Courriel retiré de la base de données";
$lang['exim_headline']					= "Export/Import pour NLetter";
$lang['exim_addsqlemails']				= "Ajouter des adresses de courrier électronique à la base de données à partir d'un fichier SQL";
$lang['exim_exportsqlemails']			= "Exporter des adresses de courriers életronique dans un fichier SQL";
$lang['exim_export_allemails']			= "Exporter tous les courriels, avec groupes et définitions de groupes";
$lang['exim_export_agroup']				= "Exporter seulement les courriels de ce groupe";
$lang['exim_exportsqlemails_truncate']	= "Avec la commande 'Vider la table'";
$lang['exim_eximforeign']				= "Export/Import à partir d'un fichier externe (exemple: type txt, délimité par ;)";
$lang['exim_addemailsfromtext']			= "Ajouter des courriels à la base de données à partir d'une fichier texte";
$lang['exim_exportmailsintext']			= "Exporter des courriels dans un fichier texte";
$lang['exim_attention']					= "Attention: ne pourra pas être utiliser avec NLetter";
$lang['exim_blacklist']					= "Blacklist";
$lang['exim_showlist']					= "Montrer la liste";
$lang['exim_addtobl']					= "Ajouter des courriels à la \"Blacklist\" à partir d'un fichier texte";
$lang['exim_addsinglemailtobl']			= "Ajouter des courriels manuellement à la \"Blacklist\"";
$lang['exim_removeadress']				= "Effacer des courriels de la base de données";
$lang['exim_adressesfromtext']			= "Courriels à partir d'un fichier texte";
$lang['exim_delete']					= "Effacer";
$lang['exim_add']						= "Ajouter";
$lang['exim_group']						= "Groupe";
$lang['exim_startexport']				= "Démarrer l'export Courriel/Groupe";
$lang['exim_startexport_emails']		= "Démarrer l'export des courriels";
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
$lang['settings_pwchange2']="à";
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
$lang['settings_nl_fontcolor']="Couleur des caractères";
$lang['settings_nl_fontsize']="Taille des caractères";
$lang['settings_nl_fonttype']="Famille de caractères";
$lang['settings_nl_default']="Options par défaut";
$lang['settings_nl_charset']="Définir le \"Charset\"";
$lang['settings_nl_addresser']="Définir l'expéditeur";
$lang['settings_nl_email']="Définir le courriel de l'expéditeur";
$lang['settings_nl_subject']="Définir le sujet";
$lang['settings_nl_sig']="Définir la signature";
$lang['settings_nl_default_unsubscribe']="Texte pour le lien de désinscription";
$lang['settings_nl_default_subscribe']="Texte de souscription";
$lang['settings_nl_default_welcome']="Texte de bienvenue";
$lang['settings_nl_default_alternatetext']="Show text if user can't display HTML E-Mails";	//still english
$lang['settings_nl_settings']="Paramètres";
$lang['settings_nl_mailsending']="Envoyer les courriels";
$lang['settings_nl_interval']="Interval";
$lang['settings_nl_oldway']="Deactivate send method \"live\"";	//still english
$lang['settings_nl_sec']="Millisecondes";
$lang['settings_nl_user_intv']="Utilisateur / Interval";
$lang['settings_nl_general']="En général";
$lang['settings_nl_nlform']="Formulaire de désinscription";
$lang['settings_nl_nlprofile']="Activer le profil des modèles";
$lang['settings_nl_nlform_html']="HTML";
$lang['settings_nl_nlform_flash']="Flash";
$lang['settings_nl_useractivation']="Activation utilisateur";
$lang['settings_nl_instand']="Instance";
$lang['settings_nl_viaemail']="Courriel";
$lang['settings_nl_mailencoding']="Encodage du courriel";
$lang['settings_nl_text']="Texte";
$lang['settings_nl_html']="HTML";
$lang['settings_nl_wysiwyg']="Editeur WYSIWYG";
$lang['settings_nl_image_upload']="Télécharger une image";
$lang['settings_nl_attachment_upload']="Envoyer une pièce jointe";
$lang['settings_nl_attach_viewcount']="Activate View-Counts";					//still english
$lang['settings_nl_unsubscribeinmail']="Désinscription par un lien<br>dans le courriel";
$lang['settings_nl_welcome']="Courriel de bienvenue";
$lang['settings_nl_mailtoadmin']="Envoyer un courriel à l'administrateur si<br>un utilisateur s'abonne ou se désabonne";
$lang['settings_nl_popup_msgs']="Popup des messages<br>en sortie";
$lang['settings_nl_usergroup']="L'utilisateur peut choisir le/les groupe";
$lang['settings_nl_usergroup_radio']="Interdire la sélection multiple?";
$lang['settings_nl_userselect']="Type";				//still english
$lang['settings_nl_titleinput']="Lorsque l'utilisateur s'abonne<br>entrer le titre";
$lang['settings_nl_forenameinput']="Lorsque l'utilisateur s'abonne<br>entrer le prénom";
$lang['settings_nl_surnameinput']="Lorsque l'utilisateur s'abonne<br>entrer le nom";
$lang['settings_nl_plugin_activate']="Activé<br>NEWSolved Pro. Plugin";
$lang['settings_nl_language']="Langue";
$lang['settings_nl_plugin_prefix']="NEWSolved préfixe";
$lang['settings_nl_mailaddress']="Courriel";
$lang['settings_nl_scriptpath']="Chemin d'accès au script";
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
$lang['settings_cf_fontcolor']="Couleur des caractères";
$lang['settings_cf_fontcolorerror']="Erreur sur la couleur des caractères";
$lang['settings_cf_fontsize']="Dimension des caractères";
$lang['settings_cf_fonttype']="Famille de caractères";
$lang['settings_cf_settings']="Paramètres";
$lang['settings_cf_sig']="Signature";
$lang['settings_cf_title']="Titre";
$lang['settings_cf_showname']="Montrer \"Prénom\"";
$lang['settings_cf_showsurname']="Montrer \"Nom\"";
$lang['settings_cf_showcity']="Montrer \"Ville\"";
$lang['settings_cf_showsubject']="Montrer \"Sujet\"";
$lang['settings_cf_showtel']="Montrer \"Numàro de téléphone\"";
$lang['settings_cf_sendmail']="Envoyer un courriel lors d'un nouvel abonnement";
$lang['settings_cf_captcha']="Activate Captcha Code";	//still english

$lang['settings_ot_headline']="Divers";
$lang['settings_ot_userdata']="Données utilisateur";
$lang['settings_ot_username']="Nom d'utilisateur";
$lang['settings_ot_mailaddress']="Adresse courriel";
$lang['settings_ot_oldpw']="Ancien mot de passe";
$lang['settings_ot_newpw']="Nouveau mot de passe";
$lang['settings_ot_rnewpw']="Répéter le nouveau<br>mot de passe";

$lang['settings_savesettings']="Sauvegarder les paramètres";


#####


$lang['settings_nltext_headline']					= "Définitions des textes de la Newsletter";
$lang['settings_nltext_placeholdertoplacerholder']	= "Remplecement des textes de substitution";
$lang['settings_nltext_getsreplacedwith']			= "à remplacer par";
$lang['settings_nltext_placeholdertoexpr']			= "Remplacement des textes de substitution par des expressions";
$lang['settings_nltext_ifplaceholder']				= "Si le texte de substitution";
$lang['settings_nltext_ifmale']						= "Male [Masculin] , remplacer par";
$lang['settings_nltext_iffemale']					= "Female [Féminin], remplacer par";
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

$lang['sendform_markassent']="Marquer la newsletter comme \"envoyée\"";
$lang['sendform_markasnotsent']="Marquer la newsletter comme \"non envoyée\"";
$lang['sendform_checkaddresser']="Vérifier l'expéditeur";
$lang['sendform_checksubject']="Vérifier le sujet";
$lang['sendform_nonewsfound']="Pas de newsletter trouvées";
$lang['sendform_norecipient']="Pas de destinataires";
$lang['sendform_sendnewsletter']="Newsletter envoyée";
$lang['sendform_group']="Groupe";

$lang['sendform_addresser']="Expéditeur";
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
$lang['sendform_underline']="Souligné";
$lang['sendform_cross']="Croisé";
$lang['sendform_textcolor']="couleur des caractères";
$lang['sendform_textsize']="Taille des caractères";
$lang['sendform_textfamily']="Famille de la police";
$lang['sendform_insertimg']="Inserer une image";
$lang['sendform_insertlink']="Inserer un lien";
$lang['sendform_insertemaillink']="Inserer un lien courriel";
$lang['sendform_center']="Centrer";
$lang['sendform_right']="Aligner à droite";
$lang['sendform_list']="Liste";
$lang['sendform_table']="Table";
$lang['sendform_tableimg']="Table / Image";
$lang['sendform_missingemail']="Définissez une adresse de courrier électronique par défaut dans les paramètres de \"définitions des textes\" de la newsletter";
$lang['sendform_button_sendnewsletter']="Envoyer la newsletter";
$lang['sendform_button_sendnewsletter_q']	= "Click OK to send the newsletter";	//still english
$lang['sendform_button_simulate']="Simuler l'envoi";
$lang['sendform_simulate_msg']="Simule une procédure réel d'envoi!";
$lang['sendform_button_testmail']="Envoi test";
$lang['sendform_testmail_msg']="Envoie un courriel test à votre adresse!";
$lang['sendform_button_saveemail']="Sauvegarde de la newsletter comme modèle sous le nom";
$lang['sendform_button_saveemail_button']="Sauver";
$lang['sendform_button_saveemail_error']="Veuillez entrer un nom de modèle";
$lang['sendform_button_saveemail_success']="Modèle ajouté";
$lang['sendform_button_saveemail_overwrite']="Modèle actuel écrasé par le nouveau";
$lang['sendform_button_preview']="Prévisualiser";
$lang['sendform_check2addresser']="Vérifier l'expéditeur";
$lang['sendform_check2subject']="Vérifier le sujet";
$lang['sendform_check2msg']="Vérifier le message";
$lang['sendform_newsletterinfo']="Newsletter info";
$lang['sendform_lastnlettersend']="Dernière newsletter envoyée";
$lang['sendform_days']="jours auparavant.";
$lang['sendform_hours']="heures aupravant.";
$lang['sendform_minutes']="minutes auparavant.";
$lang['sendform_nosent_sofar']="Encore aucun newsletter envoyée";
$lang['sendform_sendingat']="Procedure d'envoi de";
$lang['sendform_failed']="échec";
$lang['sendform_resumeclick']="Cliquez ici pour continuer";
$lang['sendform_resume']="Continuer";
$lang['sendform_whilesending']="Ne prêté pas attention à ce message pendant que la procédure d'envoi est en cours d'exécution.";
$lang['sendform_newsletterarchive']="Archive des newsletters";
$lang['sendform_lastnewsletter']="10 dernières";
$lang['sendform_templates']="Modèles sauvegardés";
$lang['sendform_templates_deleted']="Modèles effacés";
$lang['sendform_prev']="Précédent";
$lang['sendform_next']="Suivant";
$lang['sendform_sure']="Etes-vous sûr?";
$lang['sendform_delete']="Effacer";
$lang['sendform_nothing']="Actuellement vide!";
$lang['sendform_newsolvedpro_plugin']="NEWSolved Professional Plugin";
$lang['sendform_ingeneral']="En général";
$lang['sendform_latest1']="Envoyer la plus récente";
$lang['sendform_latest2']="news";
$lang['sendform_date1']="Envoyer la newsletter créée le";
$lang['sendform_date2']="";


$lang['sendform_button_save']="Sauver";
$lang['sendform_button_ok']="OK";

$lang['sendform_template']="Modèles";
$lang['sendform_template_insert']="Par cette action, les textes seront écrasés. Etes-vous sûr?";
$lang['sendform_template_no']="Aucun modèle trouvé";
$lang['sendform_template_title_img']="Inserer un modèle";
$lang['sendform_template_title_lnk']="Visualiser les modèles";

$lang['sendform_attachment']="Télécharger une pièce jointe";
$lang['sendform_attachment_upload_ok']="UTélécharger des pièces jointes";
$lang['sendform_attachment_file']="Fichier";
$lang['sendform_attachment_success1']="Les fichiers suivants ont été téléchargés avec succès:";
$lang['sendform_attachment_success2']="";
$lang['sendform_attachment_error1']="Erreur lors du téléchargement des fichiers suivants:";
$lang['sendform_attachment_head']="Pièces jointes";

$lang['sendform_image']="Télécharger des images";
$lang['sendform_image_upload_ok']="Télécharger une image";
$lang['sendform_image_chmodcheck']="CHMOD pour le sous-répertoire ./upload doit être '777'";

$lang['sendform_image_upload_error1']="Votre fichier est plus grand";
$lang['sendform_image_upload_error2']="";
$lang['sendform_image_upload_error3']="Seuls les formats suivants sont autorisés";
$lang['sendform_image_upload_error4_1']="Un répertoire doit avoir été créé";
$lang['sendform_image_upload_error4_2']="A définir dans les paramètres de téléchargement";
$lang['sendform_image_upload_exists']="Ce fichier existe déjà";
$lang['sendform_image_upload_error5']="Le fichier doit-il être écrasé?";
$lang['sendform_image_upload_error5_1']="Oui";
$lang['sendform_image_upload_error5_2']="Non";
$lang['sendform_image_upload_upbutton']="Télécharger le fichier";
$lang['sendform_image_upload_filename']="Nom du fichier";
$lang['sendform_image_upload_filesize']="Taille du fichier";

$lang['sendform_sm']="Sauvegarder comme modèle";


###################################################
##################### Sendin ######################
###################################################

$lang['sendin_contact']="Envoyé aux contacts";
$lang['sendin_back']="Retour";
$lang['sendin_date']="Date";
$lang['sendin_title']="Titre";
$lang['sendin_name']="Prénom";
$lang['sendin_surename']="Nom";
$lang['sendin_city']="Ville";
$lang['sendin_telephone']="Téléphone";
$lang['sendin_date']="Date";
$lang['sendin_email']="Courriel";
$lang['sendin_emailtosend']="Récepteur courriel";
$lang['sendin_subject']="Sujet";
$lang['sendin_message']="Message";
$lang['sendin_forward']="Acheminer courriel";
$lang['sendin_button_send']="Envoyer";
$lang['sendin_button_forward']="Acheminer";
$lang['sendin_nosubject']="Pas de sujet";
$lang['sendin_sure']="Etes-vous sûr?";
$lang['sendin_originalmsg']="Original message";
$lang['sendin_forwarderror']="Type in a recipient e-mail";
$lang['sendin_forwardsuccess']="Successfully sent!";



###################################################
#################### Sendmail #####################
###################################################

$lang['sendmails_sentwithnletter']="Cette Newsletter a été envoyée avec NLetter de www.usolved.net. Nous ne sommes pas responsables de son contenu.";
$lang['sendmails_sendmsg1']="La Newsletter a été envoyée à";
$lang['sendmails_sendmsg2']="Destinataires";
$lang['sendmails_sendmsg3']="Encore";
$lang['sendmails_sendmsg4']="sont pendants";
$lang['sendmails_sendmsg5']="Veuillez patienter";
$lang['sendmails_sendmsg6']="secondes...";
$lang['sendmails_sendmsg7']="Etape";
$lang['sendmails_success1']="Newsletter envoyé avec succès à";
$lang['sendmails_success2']="destinataires";
$lang['sendmails_finished']="Terminé";
$lang['sendmails_simfinished']="Simulation terminée";
$lang['sendmails_error']="La Newsletter ne peut être envoyée. Aucune souscription enregistrée.";
$lang['sendmails_own1']="La Newsletter a été envoyée avec succès à votre propre adresse de courriel";
$lang['sendmails_own2']="";
$lang['sendmails_own_error']="Aucun courriel choisi dans les paramètres";



######################################################################################################
######################################################################################################
######################################################################################################



###################################################
################## Sendin Ouput ###################
###################################################


$lang['osendin_check_email']="Veuilez entrer une adresse de courriel!";
$lang['osendin_check_emailcorrect']="Veuillez vérifier la cohérence de votre adresse de courriel!";
$lang['osendin_check_name']="Veuillez entrez un nom!";
$lang['osendin_check_captcha']="Please repeat the catpcha code correctly!";	//still english
$lang['osendin_check_surname']="Veuillez entrez un prénom!";
$lang['osendin_check_city']="Veuillez entrer la ville!";
$lang['osendin_check_subject']="Veuillez entrer un sujet!";
$lang['osendin_check_msg']="Veuillez entrer un message!";
$lang['osendin_check_telephone']="Veuillez entrer un numéro de téléphone!";
$lang['osendin_success']="Envoi ok!";
$lang['osendin_email_new']="Nouveau message";
$lang['osendin_email_name']="Nom";
$lang['osendin_email_address']="Courriel";
$lang['osendin_email_msg']="Message";
$lang['osendin_email_info']="Accéder à ce message par la console d'administration de NLetter.";

$lang['osendin_contactform']="Formulaire de contact";
$lang['osendin_title']="Titre";
$lang['osendin_title_male']="Monsieur";
$lang['osendin_title_female']="Madame";
$lang['osendin_name']="Nom";
$lang['osendin_surname']="Prénom";
$lang['osendin_city']="Ville";
$lang['osendin_telephone']="Téléphone";
$lang['osendin_email']="Courriel";
$lang['osendin_subject']="Sujet";
$lang['osendin_msg']="Message";
$lang['osendin_captcha']="Captcha";	//still english
$lang['osendin_button_send']="Envoyer";


###################################################
################ Newsletter Ouput #################
###################################################

$lang['onl_newunsubscribe']="Nouvelle désinscription";
$lang['onl_unsubscribed']="Désinscrit!";
$lang['onl_emailunlocked']="Adresse courriel activée";
$lang['onl_newsubscriber']="Nouvelle souscription";
$lang['onl_subscribed_mail']="Abonné à la Newsletter";
$lang['onl_wrongid']="Mauvaise ID ou le courriel est déjà dévérouillé. Vérifier le lien!";
$lang['onl_checkemail']="Veuillez vérifier l'adresse de courriel!";
$lang['onl_checkgroup']="Veuillez sélectionner au moins un groupe!";
$lang['onl_checkcaptcha']="Wrong captcha code!";	//still english
$lang['onl_checkgroup_edit']="Veuillez sélectionner au moins un groupe!";
$lang['onl_success']="Abonnement actif";
$lang['onl_success_edit']="Votre profil a été édité avec succès!";
$lang['onl_newsletterunlock']="Activer la Newsletter";
$lang['onl_mailavtivation']="L'adresse de courriel sera activée après avoir cliqué sur le lien placé dans le courrier envoyé à votre adresse électronique!";
$lang['onl_error']="Déjà abonné ou interdit par l'administrateur!";
$lang['onl_error_edit'] = "Courriel interdit!";
$lang['onl_nomail']="Adresse courriel introuvable!";
$lang['onl_formemail']="Courriel";
$lang['onl_form_title']="Titre";
$lang['onl_form_mr']="M.";
$lang['onl_form_mrs']="Mme";
$lang['onl_form_forename']="Prénom";
$lang['onl_form_surname']="Nom";
$lang['onl_group']="Sélectionner un groupe";
$lang['onl_subscribe']="S'abonner";
$lang['onl_unsubscrib']="Se désabonner";
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

$lang['relaymail_fatal1']	= "Aucune connexion ne peut être établie avec le relais SMTP";
$lang['relaymail_fatal2']	= "Réponse inattendue du serveur - le numéro de port est-il correct?";
$lang['relaymail_fatal3']	= "Le relais SMTP ne supporte pas l'ESMTP";
$lang['relaymail_fatal4']	= "Nom d'utilisateur ou mot de passe incorrect";
$lang['relaymail_fatal5']	= "Echec AUTH LOGIN, peut-être a-t'il été désactivé côté serveur.";
$lang['relaymail_fatal6']	= "Nom d'utilisateur incorrect";
$lang['relaymail_fatal7']	= "Mot de passe incorrect";
$lang['relaymail_fatal8']	= "Le relais SMTP requiert une authentification qui n'est pas supportée par NLetter";


###################################################
#################### Mailjobs #####################
###################################################

$lang['dispatchjob_successadded']	= "Mailjob ajouté";
$lang['dispatchjob_successinfo']	= "Vous pouvez fermer votre navigateur pendant que l'envoi des newsletters.";

$lang['dispatchjob_id']				= "ID";
$lang['dispatchjob_begin']			= "Début du Job";
$lang['dispatchjob_email']			= "Courriels envoyés";
$lang['dispatchjob_progress']		= "Progression";
$lang['dispatchjob_elapsedtime']	= "Temps écoulé";
$lang['dispatchjob_remainingtime']	= "Temps restant";

?>
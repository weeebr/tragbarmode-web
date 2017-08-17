<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'krea_tiv');

/** Nome utente del database MySQL */
define('DB_USER', 'webKrea');

/** Password del database MySQL */
define('DB_PASSWORD', 't1RFMwhP33%');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K}_/*edn%T2g-:pjGHXE2mctsp$)^NN~1|~b3<f|1XpmI+XV`}<g-IQ_Kb`y+muR');
define('SECURE_AUTH_KEY',  ' J3a$zr{r++%r8lTU(|cOjG%X.-Yi-<*]ib6eZjoT! ZtVu,/}sfzfW2?,8;^|+j');
define('LOGGED_IN_KEY',    'IYl+k^#y#hblYzoM/!!B,5H^WHbG1}<. mIybD 4(Zp}rDv>,lTLve.-Qa$Ry4<(');
define('NONCE_KEY',        'cy-.)=|~| O+W-N2L<Uq]UFbh5[-46p47$.#V<|jz-m!ykW+,}h]XfD9$W@}*~N~');
define('AUTH_SALT',        'h;*a6h;wQ>A_[L[=bA`aUMEN|dD:-zaHT*cT!g^HqeNZ0@?x><-+I|Q`oB(K#L2#');
define('SECURE_AUTH_SALT', '<+6IOWze1p:;vT~5;4*-{&K]*ou)*=07N, `:CGSBGkicvKB`F]2[|yptk34aA9r');
define('LOGGED_IN_SALT',   'm(PFo_[YgK-.|odkR6M+[vg>x0%WEXdW7FSp ~]<zkvEMZ0R:W;0vrb^gP:re4`v');
define('NONCE_SALT',       '?A7cwn!=x><o=4)|b/(|--lXT:IBVEWxsrr~]QQ.}&%(dwY6#q[[_UGwnpBd&6~E');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');

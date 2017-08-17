<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_tragbar_rheinfelden');

/** MySQL database username */
define('DB_USER', 'tragbarrhf');

/** MySQL database password */
define('DB_PASSWORD', 'tragbarRhf_4310');

/** MySQL hostname */
define('DB_HOST', 'login-116.hoststar.ch');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FTP_HOST', 'ftp.login-116.hoststar.ch');
define('FTP_USER', 'web45');
define('FTP_PASS', 'Le4aLyze');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c+J$+nv=![-jOPh-cR)u?G>264n4h><,C2At!WR$qY!J1ulWBu6,Y4[B{+`enN,:');
define('SECURE_AUTH_KEY',  'z_)Qt$+}s8m+J|VUZ{Yi))wU-lW>&4$[sh3_~q_g+A#xjB]gN$an*+U|vQ:Q$JKw');
define('LOGGED_IN_KEY',    'z33@ErY#1:DqmwJgZNNSH;Ms5GtM,h3_+p3V@^XlD~X=DJ+/6F/Kd8^C-2:Jy4Ta');
define('NONCE_KEY',        '*:hB.>c34#zpg^Gef$Qlrsht5nV7<=Ipy#5t|rbh8w~z)TsTO:XN(<9=&Knv$&mu');
define('AUTH_SALT',        's7kQ|G(>W@[sU.49Ybv%0Z.)+UFXA7*%jIc2GG/-cB-RT0`ob6u8t.+Z2|66--B4');
define('SECURE_AUTH_SALT', 'OGWhDPIaFyAR)W%po~YsBWv^{z>bOK3|66C0z!m3$Q^Axtk,:@!;,qur 0SH#e_}');
define('LOGGED_IN_SALT',   'recT1ue,Fzi(/}~ 8acp@Td=l2%j$,-c9+Y-^<KE|4&6(=9[5|X.1LI|U.Z`XZd+');
define('NONCE_SALT',       'qjOJv].}ZM`B%o<OGmP?;lLzY~4Yk}Lt!Mh?2Q W_lhkq03?0a{>p[iY4dVmQ}x1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/** 
 * The base configurations of bbPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys and bbPress Language. You can get the MySQL settings from your
 * web host.
 *
 * This file is used by the installer during installation.
 *
 * @package bbPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for bbPress */
define( 'BBDB_NAME', 'ufais' );

/** MySQL database username */
define( 'BBDB_USER', 'root' );

/** MySQL database password */
define( 'BBDB_PASSWORD', '' );

/** MySQL hostname */
define( 'BBDB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'BBDB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'BBDB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/bbpress/ WordPress.org secret-key service}
 *
 * @since 1.0
 */
define( 'BB_AUTH_KEY', '}+)sbxEsC*N7|B:-LeA#]+Zjj5S3|J8Z@f&b_Wx*|_{_g3d7Xp`f{j]/>Jczz^:4' );
define( 'BB_SECURE_AUTH_KEY', 'W,N+w-%~E,A /:%D8YxZA%7lsW9C)qJw2BcDpii.-1|o^!_Pmxa{pH|-.D#h4 Q|' );
define( 'BB_LOGGED_IN_KEY', '5RtL+O-|=!$KY~W3@V5x>XT7XkL6v#!%i8Np(u<FnYJc<FFe9]*8xhz7$IVz&rx+' );
define( 'BB_NONCE_KEY', '`|xzlzK8G5E+BY.91NY-?Y7`q|.Z+%{6O8p+Tx<ulDO0AvuV|:1h;T6=XoGTcstF' );
/**#@-*/

/**
 * bbPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$bb_table_prefix = 'wp_bb_';

/**
 * bbPress Localized Language, defaults to English.
 *
 * Change this to localize bbPress. A corresponding MO file for the chosen
 * language must be installed to a directory called "my-languages" in the root
 * directory of bbPress. For example, install de.mo to "my-languages" and set
 * BB_LANG to 'de' to enable German language support.
 */
define( 'BB_LANG', 'en_US' );
$bb->custom_user_table = 'wp_users';
$bb->custom_user_meta_table = 'wp_usermeta';

$bb->uri = 'http://localhost/ufais/wp-content/plugins/buddypress//bp-forums/bbpress/';
$bb->name = 'UF | AIS Forums';

define('BB_AUTH_SALT', ',aSy &K#n{1{D9+2)Qv3J:Fs,5@KCjz|?zP]kqW%5*I(7Yn`WH-SwhT{OvZL<rj!');
define('BB_LOGGED_IN_SALT', 'J*,>;osBh/fCgzW|[/[< /-:EH5W< #++V(v]Po`M>Q5}=j{K{so;.Y h  ?[:tg');
define('BB_SECURE_AUTH_SALT', 'JW>tms}d1odb,0-Q)&%me>vsG4D%/<Vg`}+~k-z]`-h4jx2.I?O-m08Pl~CNqCPf');

define('WP_AUTH_COOKIE_VERSION', 2);

?>
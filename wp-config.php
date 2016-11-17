<?php
/**
 * Baskonfiguration f�r WordPress.
 *
 * Denna fil inneh�ller f�ljande konfigurationer: Inst�llningar f�r MySQL,
 * Tabellprefix, S�kerhetsnycklar, WordPress-spr�k, och ABSPATH.
 * Mer information p� {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. MySQL-uppgifter f�r du fr�n ditt webbhotell.
 *
 * Denna fil anv�nds av wp-config.php-genereringsskript under installationen.
 * Du beh�ver inte anv�nda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i v�rdena.
 *
 * @package WordPress
 */

define("WP_HOME","http://".$_SERVER['HTTP_HOST']);
define("WP_SITEURL","http://".$_SERVER['HTTP_HOST']);

// ** MySQL-inst�llningar - MySQL-uppgifter f�r du fr�n ditt webbhotell ** //
if(strpos($_SERVER['HTTP_HOST'],".dev") !== false or strpos($_SERVER['HTTP_HOST'],"192.168") !== false or strpos($_SERVER['HTTP_HOST'],"localhost") !== false) {
    /** Namnet p� databasen du vill anv�nda f�r WordPress */
    define('DB_NAME', 'landraddningen_se');

    /** MySQL-databasens anv�ndarnamn */
    define('DB_USER', 'landraddningen');

    /** MySQL-databasens l�senord */
    define('DB_PASSWORD', '');

    /** MySQL-server */
    define('DB_HOST', 'localhost');

    /**
     * F�r utvecklare: WordPress fels�kningsl�ge.
     *
     * �ndra detta till true f�r att aktivera meddelanden under utveckling.
     * Det �r rekommderat att man som till�ggsskapare och temaskapare anv�nder WP_DEBUG
     * i sin utvecklingsmilj�.
     */
    define('WP_DEBUG', TRUE);
}
else {
    /** Namnet p� databasen du vill anv�nda f�r WordPress */
    define('DB_NAME', 'landraddningen_se');

    /** MySQL-databasens anv�ndarnamn */
    define('DB_USER', 'root@l94355');

    /** MySQL-databasens l�senord */
    define('DB_PASSWORD', '');

    /** MySQL-server */
    define('DB_HOST', 'mysql462.loopia.se');

    /**
     * F�r utvecklare: WordPress fels�kningsl�ge.
     *
     * �ndra detta till true f�r att aktivera meddelanden under utveckling.
     * Det �r rekommderat att man som till�ggsskapare och temaskapare anv�nder WP_DEBUG
     * i sin utvecklingsmilj�.
     */
    define('WP_DEBUG', FALSE);
}

/** Teckenkodning f�r tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp f�r databasen. �ndra inte om du �r os�ker. */
define('DB_COLLATE', 'utf8_swedish_ci');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * �ndra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan n�r som helst �ndra dessa nycklar f�r att g�ra aktiva cookies obrukbara, vilket tvingar alla anv�ndare att logga in p� nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5QijB+RLsU]sQ.YHB-LQi1@.-80p(5W0_ccB]8$ZCX&4CnVbfIj$wj>P-,ckxXIY');
define('SECURE_AUTH_KEY',  '#d|v68:+W3|5|=8(dhFg$rWi 8F[FK{]6}}pUP|q]}qCUZg!BAw-eis$mI{rgwI9');
define('LOGGED_IN_KEY',    '=<v|WJ$^g)1bpO25@r$6ekO<u^Msx@NNp+cEm3+;[l6<J(k9[118BQ:x761CEedP');
define('NONCE_KEY',        '1;WyG*:TZW|:2uJ#(O*3-C,R={-Ll01lc`{+2`KkJE%Jy;Zd6nEiS}< t 0l{O0j');
define('AUTH_SALT',        'j~7OtsCUsG+Rhxmo U?|d2+&K||mIX$-vgu]#+A?L.CI;-2i.?I6,Uh*pt+f7yTI');
define('SECURE_AUTH_SALT', 'v*U?3[p|#;X~V ymA{,fkW9Z(gLg]d<zzfLMi{^9%t%*>mdT=[1|tuWM|jk`+|Xd');
define('LOGGED_IN_SALT',   'pT1+=>vvQQ( :0UCP/Si|47+kN,G/-LVjh_I]q$Uf&|SL9wx[_JtZ}8$@VjkMOFU');
define('NONCE_SALT',       '!@+Pb/&k59Zb:op*JB;4m!ZA8SXO$_W1g3u819Sd-O}4U?axg_CaAPNJ|/a-?AX:');

/**#@-*/

/**
 * Tabellprefix f�r WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokst�ver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-spr�k, f�rinst�llt f�r svenska.
 *
 * Du kan �ndra detta f�r att �ndra spr�k f�r WordPress.  En motsvarande .mo-fil
 * f�r det valda spr�ket m�ste finnas i wp-content/languages. Exempel, l�gg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' f�r att f� sidan
 * p� svenska.
 */
define('WPLANG', 'sv_SE');

/** Det var allt, sluta redigera h�r! Blogga p�. */

/** Absoluta s�kv�g till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-v�rden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil innehåller följande konfigurationer: Inställningar för MySQL,
 * Tabellprefix, Säkerhetsnycklar, WordPress-språk, och ABSPATH.
 * Mer information på {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. MySQL-uppgifter för du från ditt webbhotell.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * @package WordPress
 */

define("WP_HOME","http://".$_SERVER['HTTP_HOST']);
define("WP_SITEURL","http://".$_SERVER['HTTP_HOST']);

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
if(strpos($_SERVER['HTTP_HOST'],".dev") !== false or strpos($_SERVER['HTTP_HOST'],"192.168") !== false or strpos($_SERVER['HTTP_HOST'],"localhost") !== false) {
    /** Namnet på databasen du vill använda för WordPress */
    define('DB_NAME', 'landraddningen_se');

    /** MySQL-databasens användarnamn */
    define('DB_USER', 'landraddningen');

    /** MySQL-databasens lösenord */
    define('DB_PASSWORD', '');

    /** MySQL-server */
    define('DB_HOST', 'localhost');

    /**
     * För utvecklare: WordPress felsökningsläge.
     *
     * Ändra detta till true för att aktivera meddelanden under utveckling.
     * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG
     * i sin utvecklingsmiljö.
     */
    define('WP_DEBUG', TRUE);
}
else {
    /** Namnet på databasen du vill använda för WordPress */
    define('DB_NAME', 'landraddningen_se');

    /** MySQL-databasens användarnamn */
    define('DB_USER', 'root@l94355');

    /** MySQL-databasens lösenord */
    define('DB_PASSWORD', '');

    /** MySQL-server */
    define('DB_HOST', 'mysql462.loopia.se');

    /**
     * För utvecklare: WordPress felsökningsläge.
     *
     * Ändra detta till true för att aktivera meddelanden under utveckling.
     * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG
     * i sin utvecklingsmiljö.
     */
    define('WP_DEBUG', FALSE);
}

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', 'utf8_swedish_ci');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
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
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-språk, förinställt för svenska.
 *
 * Du kan ändra detta för att ändra språk för WordPress.  En motsvarande .mo-fil
 * för det valda språket måste finnas i wp-content/languages. Exempel, lägg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' för att få sidan
 * på svenska.
 */
define('WPLANG', 'sv_SE');

/** Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');

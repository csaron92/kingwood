<?php
/** 
 * A WordPress fő konfigurációs állománya
 *
 * Ebben a fájlban a következő beállításokat lehet megtenni: MySQL beállítások
 * tábla előtagok, titkos kulcsok, a WordPress nyelve, és ABSPATH.
 * További információ a fájl lehetséges opcióiról angolul itt található:
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} 
 *  A MySQL beállításokat a szolgáltatónktól kell kérni.
 *
 * Ebből a fájlból készül el a telepítési folyamat közben a wp-config.php
 * állomány. Nem kötelező a webes telepítés használata, elegendő átnevezni 
 * "wp-config.php" névre, és kitölteni az értékeket.
 *
 * @package WordPress
 */

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define('DB_NAME', 'wp_user');

/** MySQL felhasználónév */
define('DB_USER', 'wp_user');


/** MySQL jelszó. */
define('DB_PASSWORD', 'wp_pass');

/** MySQL  kiszolgáló neve */
define('DB_HOST', 'localhost');

/** Az adatbázis karakter kódolása */
define('DB_CHARSET', 'utf8');

/** Az adatbázis egybevetése */
define('DB_COLLATE', '');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszóleges mondatra.
 * Generálhatunk is ilyen kulcsokat a {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org titkos kulcs szolgáltatásával}
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról. 
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'P:AtNviP[u=]mx58~t6Y]!-~5h*w=(Wy4<IHYJlN,I]7m(%@Xh?AzalW]?23MeiU');
define('SECURE_AUTH_KEY', 'Q}Nw$sq-;%[^H|.fzDu C9<O}>w]j|R3C)2Nw<R&{xiu-TG_Qw7_z*8V:f5aq{Zk');
define('LOGGED_IN_KEY', 'n8q7-3o[`Xhz`ZQdA!PkR EnGKanZRXdzOfjsc!F;My)aDG/&Ak>do:W$`4HFVyF');
define('NONCE_KEY', 'u-1 %d(t>j`#WlMoWR^P1#!$y6rvfM{QU!lf7T}&SLj}%Z^eXPs{F%id|e|z$3$,');
define('AUTH_SALT',        'NwvD^)e2Q.h`lB|$.3uTyX^>f|h(]? ^L^!g6y6,=nX;/#zTF^;E[>^C5l_oeOH%');
define('SECURE_AUTH_SALT', '4&RVaV*^M4jgD+^EK&Go4N{Kiq<h}!T7M:s}Iur_Yc 8*|V~LSBG[}oKGR@1Nbm4');
define('LOGGED_IN_SALT',   'Yz$nAu(oIT^Q}CrVtH?y|,~L,i[bE|+zl`P^b;STliS58F<tTmXfOG%&8p3wwgx3');
define('NONCE_SALT',       'itt&UzBQ^qm64`B1)BLI[{j/b!w=Un/[(a mdQ>Sou7m 9`EpQrVNk.uiaF_6Kh7');

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix  = 'wp_';

/**
 * WordPress nyelve. Ahhoz, hogy magyarul működjön az oldal, ennek az értéknek
 * 'hu_HU'-nak kell lennie. Üresen hagyva az oldal angolul fog megjelenni.
 *
 * A beállított nyelv .mo fájljának telepítve kell lennie a wp-content/languages
 * könyvtárba, ahogyan ez a magyar telepítőben alapértelmezetten benne is van.
 *  
 * Például: be kell másolni a hu_HU.mo fájlokat a wp-content/languages könyvtárba, 
 * és be kell állítani a WPLANG konstanst 'hu_HU'-ra, 
 * hogy a magyar nyelvi támogatást bekapcsolásra kerüljön.
 */

define ('WPLANG', 'hu_HU');

/**
 * Fejlesztőknek: WordPress hibakereső mód.
 *
 * Engedélyezzük ezt a megjegyzések megjelenítéséhez a fejlesztés során. 
 * Erősen ajánlott, hogy a bővítmény- és sablonfejlesztők használják a WP_DEBUG
 * konstansot.
 */
define('WP_DEBUG', false);

/* Ennyi volt, kellemes blogolást! */

/** A WordPress könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Betöltjük a WordPress változókat és szükséges fájlokat. */
require_once(ABSPATH . 'wp-settings.php');

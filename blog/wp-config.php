<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'ecosystem');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'aalarcon');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'fd!.sdfHfg');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '|Qi!)Y=o0^uL.G<Fz;k[K!+_o^6XOI*a7{A?*+eB3R?k4x;OVS4>AHGwDNN:5kf '); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', ')GHja?J5VPl#/a0HZ8-+oc*l}L:/:g+l!kAj&+oeAdIw6Dli:L(n8wI*06pLtB>`'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'Q<$1{+J>MZS69^ZThdI]`i[;d)6Fh%8#axC|,9dY)g6nsy<+Hu[J^~ v%c(#W`5|'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '-QvOxd6s3?=/.r8:TJ<Z&aad=w%1|&RL=<V)9Ekny7xR.}?u}$u1uwFFyva<d+J&'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'b/+kz0)Qps]uNhZn}(%|!C &xTK}3n^MI0dWB2fQ}i=ou-N~CI]#}1ye)D-1SeM&'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'R2y& y^+yRW]mWQ&*?#b5UKZ@^.U=U^4$}y!;r,Iu#F]0>by2p?KLd[0PO?[Oe3{'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'gdto(DaA#-;;Xe#-i>]He^_fE8t~B4 E@o-KZ}(a4<St>R<.s@5Kb0~-#Jt,T`Tl'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'oV2NHW-XHJ<oSyJU4m6*EFD7[dpa0~ij;RxBqBw`ogzcV}px;uBrShywo3Bi:WGD'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wp_run4fun');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'wp_run4fun');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'wp_run4fun');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CZv]OT@C5Gab63mGwd:&:;C&Gs){ee7-Px[w^;/dJmNOt^>f]d7+.NXL@qFk:jLX');
define('SECURE_AUTH_KEY',  'Mq-SP8P17+8Qa5cB/NLtmj^6lYxiM~0n8SyMYWh3w.6O=kp:ydJN6c&U7VsT-9E!');
define('LOGGED_IN_KEY',    '+UO,w6fcu4hT>ID_lQ-]O}-LKVO48h_7r-4`4|.ZlfU6L()D!2AB[f>N!i=TI=*3');
define('NONCE_KEY',        '!/IVJLBuUnilEwTRT*-+-f2rtXh2Ky`V?QX&yjabxZIv|G$1uwL-U+z+w*h>iR-O');
define('AUTH_SALT',        '?!d0U&q>|NU0|eW~}(z}7kNP/`U#g~${nywH{3p|hHMuqoy1$q|M$ng9NcwjnK ^');
define('SECURE_AUTH_SALT', ' p`t_-|v`OQ*T=;0volm`ec!vntn|0!YBA) E4r+9]|H:k]b! -Mi~Z`)OfHt/+O');
define('LOGGED_IN_SALT',   'i+5WRlPqyv|tPzf<hdqzZKc=~:BYx9pNPQ}JWpsh?r0B~|=yTBu=#Lr(90Md}p7j');
define('NONCE_SALT',       '+.rr4E!K1.2DKSwFF%mV+A}7> OO&gdZV9vB/PPW4)}f-SoviGRb~19pb~/qc6~S');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
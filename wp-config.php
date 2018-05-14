<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'revue__bancal_fr_content');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'CC8099_rbancal');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'bancal75');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'hostingmysql290.amen.fr');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '00BCXk|D@c2sQb8o%j KL#m dKR^qOK0`xO3PM1]f@@dbG,ZRkrGE>XSl6:q9Rbt');
define('SECURE_AUTH_KEY',  'kQ%[+H6(HBDOl-{f!iP*5f$@nrodQK;:gq2zz]GQi+ CLENXcxDwanf~qrK,P6=t');
define('LOGGED_IN_KEY',    'b]RK2,tZ|~ISV!+C!~p@6,A.(V+Z9t`x4s|&ZjztMc>+Hp{D8U)oTIachjO)Pzr1');
define('NONCE_KEY',        '@{Vn$m#I5JEJF6TIGCwNB/]Z!P~jGip8L&={o@eH7$z/}<`p[z=3k:Hi<xqm)=K6');
define('AUTH_SALT',        'kydh60dMBxk-KV_2gKK5V$ZpImT/&B?C,*VOgP{3=9~4gtN 3@8Bf:z(H5~P3_cl');
define('SECURE_AUTH_SALT', 'I8qa]84Pl.R$>cZ[Vp!k)A{L}MHP{D,UTY:nVI =wEiTK!5B3mG&8nPjAVrar01w');
define('LOGGED_IN_SALT',   'X8USGy#83^5m8#7LFfJ`R5+&3V|CQ6{F!+J2a^d}x#vtkp&xE0~_{>G4zNb>L6xa');
define('NONCE_SALT',       '>xm(howur,Z(0#W>ovk-F+fn<^&PRXz@fuHGM]e!V6s^Q_]}r@k|E9Z<FvB;,A[5');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
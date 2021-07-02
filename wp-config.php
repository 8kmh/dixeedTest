<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'dixeedTest' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'b0+{]S65}s}CXM6eO>5t-hZ^~RMGOu}3=IFF(9;B]N,l(29tJ5pDr[*C#uH|L)^v' );
define( 'SECURE_AUTH_KEY',  'wf!^3f&!J}5ve#{65rBX<`RUR2EX|rU4pXtsAo@K2*>dt!N(:Y3>>PdMHc`?1@q9' );
define( 'LOGGED_IN_KEY',    'b|PZ%|WvnK9];aNnB!Z+(AtPPIA_eto1Ba)E7[:H]AxvSP]Cw96uB1D>S;fF< +#' );
define( 'NONCE_KEY',        'avr1Iq{m*TXjBeZuzdzXlU~>;aZcj|8Ig>d>^T3qF]:ty+Om2K29q_q]?^TSsaeB' );
define( 'AUTH_SALT',        '5T)r.i,j|Bor8Tb+JRmlxp155TmO.@g#XB~U0Be>*yoZEA71ww%%[`[kU:i(/!$/' );
define( 'SECURE_AUTH_SALT', '>#Dv]lxu8krJ6D=jtt_y<?F2,#8dA0sZX ulexAzsHct(G.]{W0k0,r_:qn1&;79' );
define( 'LOGGED_IN_SALT',   'S<R6.|4(g,L CYw?$3x^wL9--[rC]=5?HY+`dRt6SK})~&Gjl3:4i*jkfJX19sKv' );
define( 'NONCE_SALT',       ',hvY^Y!S)Aa{/mdsWBtAw7,aHa$2hk2;@gxQWUzXAj$!rC XwnLaIxjcXlY$f/We' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

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
define( 'DB_NAME', 'portfolio' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '?xPY~:k_.x#Jx$s6vU#>#{v&WVKj8+!CX&~<g{HCUlF]A7wh1V-W(gVj*=qyA+j~' );
define( 'SECURE_AUTH_KEY',  '<^3}@[E=%#A=cyC]_[$5-@F;ENBO)h)o`7 RVkP6,U+2}sRX;O;K*A{PMMf6Q027' );
define( 'LOGGED_IN_KEY',    'pbd??MK<A2Pb!y]|1x%tvL^,0z, k@5Lu<y32|n? #mk.Y4rwwts+-ah4c8s#%Va' );
define( 'NONCE_KEY',        'qLC%6_!Vl7qe?0N0`./W&JWTj`2j>::88UBja*P7H}/L2}^ZS{z>@1<15P/DCusH' );
define( 'AUTH_SALT',        '<`6.mB}Mo%=X3cixjSMm=C^MpkNGpPlvL. 4hwY?i7gT.<xA+Krk^a_-p*Od$c!?' );
define( 'SECURE_AUTH_SALT', '>M+wUjsX[ucp%+ui;/&&sk7dQIBC4FcyZ8ZVFu#{H*b@O}#SkS,(d!:V%.*3k[j5' );
define( 'LOGGED_IN_SALT',   '8&<+Ybt?,C4G W{A_&fmQel$G5Ce/F`aEVh7326[pm+;(2!y!&}@nocl/=@7&qab' );
define( 'NONCE_SALT',       'vK%|L>8+=qRzA0xeeF,JsrqJst4GT7%)qeW9JX5?<ur|8]d`|P(M+^_ckJ.*fXT_' );
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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

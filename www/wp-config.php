<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'solar_site' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[;on*[S!o6D4/?MDa9{5N08)Y6-I<b,r7PL;=X(bMJZm<iOw>rQ;?U*G&tgf]o-3' );
define( 'SECURE_AUTH_KEY',  'G1WY:BuxX|kK.$E.27#@#.`1f_gq(Kl.nZUy)%2X*f?ra)H,4eL,Hdo7[`J2:qS+' );
define( 'LOGGED_IN_KEY',    ']iJBDp=JqJ`qTk~QM~$~(LnINnF$U!F.NV<5nL>{ADC:0KOXirV:<Tf+*~x.N=u`' );
define( 'NONCE_KEY',        '5NG|ifPU1H;qkF|HrLnsr?h4$ aXUiYh9Yl8}(Q;k,yPZ@G=`iB(K$p?|*;}2|]E' );
define( 'AUTH_SALT',        'k$Bzo0>,{oaS#pq-OK8E(5X{<.p,v(0c(}O1;6O(Bb#$Ns0!U}iA8#3 {`~N-_a2' );
define( 'SECURE_AUTH_SALT', 'nAnJrUm5).>>#CdF*I2Db-QuOX@sbVDLw>x%7Te$$Lx3rLk[?~?zP|7DxhwD>n{G' );
define( 'LOGGED_IN_SALT',   '/fedD0B96puO3Sp;Tb{=ZKQsZz90Fsh?_][S|-nR!Un! a121/<GeKb@nOe{-p(2' );
define( 'NONCE_SALT',       ',gjMA)2(&x rYj%U/XU/|y(=y,Yq4va>MX7+P2V%JB91P_lqq!nPdG,4LX/,K1rI' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'volga');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'volga');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'W9rL<UeXxdwaIcLL5:;+uf46;auadrL6m)`~r=^9rPye,_hpV0vgyu;WYlS=I1^^');
define('SECURE_AUTH_KEY',  'FU99J}w#Z>IgWu,2v|d|Ganr byQ/1T#hf1]|p^F*u2kw$/8<Ri3CBN`=X Xns k');
define('LOGGED_IN_KEY',    '8C4^L]bGHs6[=45us; YqBF93K9KaPd&m[yJC`NV`K;yL;C;X<!cKZ(pUgO=@}ri');
define('NONCE_KEY',        'clG-xc6a+ h&WSe/.&50!}}9Wh%6TVA`/D(i0,jrqD8TGzJolvz:#f>VU/F67[L(');
define('AUTH_SALT',        'oF8;5,*uD:LSx(z<xQTuc11*ECK4dP9k9W;JO003u$}A5F@((b: ]k_6h1mbi95u');
define('SECURE_AUTH_SALT', 'May*XQ)pk|9BvN)-%BGTr7/xY4^x!16L>L-0;9jO/}](J.KiGO_=K0PBC^=%zx7P');
define('LOGGED_IN_SALT',   'p;V6h#V8tWT+E#N}jjShphMcJT9mp{?c[JKgObJ9e*qBeOpJ%Tm{2!.B~Y>^}+w0');
define('NONCE_SALT',       'Z_fwZ0bO}K3fN>.ZXzXTcCklsT7/J[$NK_([*U.SY1l?@-}/  Jvro$<K=8W:?pP');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'volga_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

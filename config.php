<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://www.dxsmartgames.com.br/');
define('DIR', '/var/www/html/views/');
define('UPLOAD', '/var/www/html/upload/');
define('UPLOADSERVER', 'http://www.dxsmartgames.com.br/upload');
define('LIBS', '/var/www/html/libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'rpg2');
define('DB_USER', 'dx');
define('DB_PASS', 'dx');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
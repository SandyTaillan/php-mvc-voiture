<!--config.php-->
<?php
// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'voiture2');

// App root - chemin des dossiers jusqu'à app
// dans ce cas là, cela donnera :
// /mnt/f20694f0-5c3b-4de3-95f0-387776ff884b/projets-en-developpement/projets-web/htdocs/php-mvc-voiture2/app
define('APPROOT', dirname(dirname(__FILE__)));
// URL root
define('URLROOT', "http://localhost/php-mvc-voiture2");
// Site name
define('SITENAME', 'Voiture2');
// App Version
define('APPVERSION', '1.0.0');

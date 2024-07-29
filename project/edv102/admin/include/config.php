<?php

// config.php
// Autoload
require_once __DIR__ . '/../src/helpers/autoload.php';
define("AUTOLOAD", __DIR__ . "/../src/helpers/autoload.php");



// Pfade zu HTML
define("HTML_PATH", __DIR__ . "/../src/templates/");
// Header
define("GLOBAL_HEADER_HTML", HTML_PATH . "globalHeaderHtml.php");
// Navbar
define("GLOBAL_NAVBAR_HTML", HTML_PATH . "globalNavbarHtml.php");
// Footer
define("GLOBAL_FOOTER_HTML", HTML_PATH . "globalFooterHtml.php");


// CSS
define("CSS_PATH", 'css/');
define("GLOBAL_CSS", CSS_PATH . 'global.css');
define("GLOBAL_MOBILE_CSS", CSS_PATH . 'global_mobile.css');


// Includes
define("DB_CONNECTION", __DIR__ ."/../include/DBConection.inc.php");

// Funktions Pfade
define('HELPER_PATH', __DIR__ . '/../src/helpers/');
require_once HELPER_PATH . "titleFunktion.php";
require_once HELPER_PATH . "loadStyles.php";


// Funktionsdatei Einbinden




?>